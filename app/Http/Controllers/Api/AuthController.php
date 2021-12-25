<?php


namespace App\Http\Controllers\Api;


use Illuminate\Support\Facades\Auth;

class AuthController extends WxController
{
    private $guard = self::GUARD;

    public function login(){
        $credentials = request()->only(['username', 'password']);
        $paramsCount = 2;
        if (empty($credentials) || count($credentials) < $paramsCount){
            return self::apiError('参数错误');
        }
        $token = Auth::guard($this->guard)->attempt($credentials);
        if ($token){
            $user = Auth::guard($this->guard)->user()->toArray();
            $expire = date('Y-m-d H:i:s',time() +  env('JWT_TTL') * 60);
            $data = [
                'userInfo' => $user,
                'token' => env('JWT_PREFIX', 'Bearer ') . $token,
                'expireIn' => $expire
            ];

            return self::apiSuccess($data);
        }else{
            return self::apiError('登录失败');
        }

    }
}
