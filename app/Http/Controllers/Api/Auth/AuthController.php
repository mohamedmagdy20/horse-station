<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
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
    public function register(Request $request)
    {
        // Data Validition
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|max:100',
            'email'        => 'email|unique:users,email|max:100',
            'password'     => 'required|confirmed|string|max:50|min:5',
            'phone'        => 'required|string|max:100',
            'link'         => 'string'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        }
        // check if User Exist
        $is_user = Auth::attempt(['phone' => $request->phone, 'password' => $request->password]);
        if(! $is_user)
        {
            // password Has and Generate Token
            $data =  $request->all();
            $data['password'] = Hash::make($request->password);
            $data['remember_token'] = Str::random(64);
             // add user to database if it doesnot exist
            $user = User::create($data);
            return response()->json([
                'status'         => 200,
                'message'        => $request->name . ' ' .'added succesfully',
                'remember_token' => $user->remember_token
            ],200);
        }
        // if user Already exsit
        else{
            return response()->json([
                 'status'  => 404,
                 'message' => "This User Already exsit",
                 'data'    => NULL
            ],404);
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

}
