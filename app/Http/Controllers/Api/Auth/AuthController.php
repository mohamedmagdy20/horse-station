<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

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
