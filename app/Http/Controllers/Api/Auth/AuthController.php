<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ForgetPasswordRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Utils\SMS;
use Exception;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
    * Login App
    */
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        $user = $this->model->where('phone', $data['phone'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'data' => null,
                'status' => 401,
                'message' => 'Invalid Phone or Password',
            ], 401);
        }
        $token = $user->createToken('user Token')->plainTextToken;
        $user['token'] = $token;
        return response()->json([
            'data' => new UserResource($user),
            'status' => 200,
            'message' => 'Successfully Login',
        ]);
    }
    /**
    * Api Registration
    */
    public function register(RegisterRequest $request)
    {
        // Data Validition
        // $validator = Validator::make($request->all(), [
        //     'name'         => 'required|string|max:100',
        //     'email'        => 'email|unique:users,email|max:100',
        //     'password'     => 'required|confirmed|string|max:50|min:5',
        //     'phone'        => 'required|string|max:100',
        //     // 'link'         =>
        // ]);
        // if ($validator->fails()) {
        //     $errors = $validator->errors();
        //     return response()->json($errors);
        // }
        $data = $request->validated();
        // check if User Exist
        $is_user = Auth::attempt(['phone' => $request->phone, 'password' => $request->password]);
        if(! $is_user)
        {
            // password Has and Generate Token
            $data =  $request->all();
            $data['password'] = Hash::make($request->password);
            $data['remember_token'] = Str::random(64);
            $data['otp']  = $this->generateOtp();
             // add user to database if it doesnot exist
            // $user = User::create($data);
            // Send Sms Otp
            try{
                // $message =  'Your Otp is '.$data['otp'];
                // $sms = SMS::sendSms($data['phone'],$message);
                $user = User::create($data);
                return response()->json([
                    'status'  => 200,
                    'message' => 'SMS Sent',
                    'OTP'=>$user->otp,
                    'data'   => NULL
                ],200);
            }catch(Exception $e )
            {
                return response()->json([
                    'status'      => 500,
                    'message'     => $e->getMessage(),
                    'access_token'=> null
                 ],500);
            }
        }
        // if user Already exsit
        else{
            $user = $this->model->where('phone',$request->phone)->first();
            if($user->is_verified == false)
            {
                return response()->json([
                    'status'  => 400,
                    'message' => "Account Already exist but Not verified",
                    'data'    => $user->phone
               ],400);
            }else{
                return response()->json([
                    'status'  => 400,
                    'message' => "Account Already exsit",
                    'data'    => NULL
               ],400);
            }
        }
    }

    public function logout(Request $request)
    {
        $accessToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($accessToken);
        $token->delete();
        return response()->json([
            'data'=> NULL,
            'status'=>200,
            'message'=>'Successfully Logout'
        ], 200);
    }

    public function verify(Request $request)
    {
        $user = $this->model->where('otp',$request->otp)->first();
        if($user)
        {
            $user->update([
                'is_verified'=>true,
                'otp'=>null
            ]);
            $user['token'] = $user->createToken('user Token')->plainTextToken;
            return response()->json([
                'status'  => 200,
                'message' => 'Account Verified',
                'data'   => new UserResource($user)
            ],200);
        }else{
            return response()->json([
                'status'  => 400,
                'message' => 'Invaild OTP',
                'data'   => NULL
            ],400);
        }
    }


    public function resend(Request $request)
    {
        $otp = $this->generateOtp();
        $user = User::where('phone',$request->phone)->first();
        if($user)
        {
            $user->update([
                'otp'=>$otp,
            ]);
            try{
                // $message =  'Your Otp is'.$user->otp;
                // $sms = SMS::sendSms($user->phone,$message);
                return response()->json([
                    'status'  => 200,
                    'message' => 'SMS Sent',
                    'data'   => NULL,
                    'OTP'=>$user->otp
                ],200);
            }catch(Exception $e )
            {

                return response()->json([
                    'status'      => 500,
                    'message'     => $e->getMessage(),
                    'data'=> null
                 ],500);

            }

        }else{
            return response()->json([
                'status'  => 404,
                'message' => 'User Not Found',
                'data'   => NULL
            ],404);
        }
    }
    public function EditProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'string',
            'name'      => 'required|string',
            'phone'     => 'required|string',
            'link'      => 'string',
            'password'  => 'string',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }
        $user = auth()->user()->id;
        $Code = User::find($user);
    if ($Code) {
        $data = $request->all();
        if($data['password'])
        {
            $data['password'] =  Hash::make($request->password);
        }
        $Code->update($data);
        return response()->json([
            'status'  => 200,
            "message" => 'Profile Updated Successfully',
            'data'    => new UserResource($Code)
            // UserResource::collection($CODE)
        ]);
    }
    else{
        return response()->json([
            'ERROR'  => 404,
            "message" => 'THIS ID NOT FOUND',
            'data' => null
        ],404);
    }
    }


    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $data = $request->validated();
        $user = $this->model->find($request->id);
        $user->update([
            'password'=>Hash::make($data['password']),
        ]);
        return response()->json([
            'message'=>'Password Changed',
            'status'=>200,
            'data'=>NULL
        ]);

    }

    // public function sendOtp(Request $request)
    // {
    //     $phone  = $request->phone;
    //     $otp = $this->generateOtp();

    // }
    private function generateOtp()
    {
        $otp = rand(10000,99999);
        return $otp;
    }

}
