<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    use ApiResponser;
    public function register(Request $request)
    {
        $rules = [
            'name'     => 'required|max:255',
            'password' => 'required', Password::min(8),
            'email'    => 'required|email|unique:users',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        } else {
            $data           = new User();
            $data->name     = $request->name;
            $data->email    = $request->email;
            $data->password = Hash::make($request->password);
            $data->save();
            return $this->successResponse($this->messageResponse('signup_success'), $data);
        }
    }
}
