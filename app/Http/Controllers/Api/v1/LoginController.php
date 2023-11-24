<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use ApiResponser;
    public function login(Request $request)
    {
        $validator = $this->validateEmail();
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        }
        $data = User::where('email', $request->email)->first();
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                $data['token'] = $data->createToken('MyApp')->accessToken;
                return $this->successResponse($this->messageResponse('login_success'), $data);
            } else {
                return $this->errorResponse('Invalid credentials! Please try again.', 401);
            }
        } else {
            return $this->errorResponse('Invalid credentials! Please try again.', 401);
        }
    }
    public function validateEmail()
    {
        return Validator::make(request()->all(), [
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        ]);
    }
}
