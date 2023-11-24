<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CityCollection;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use ApiResponser;
    public function getProfile(Request $request)
    {
        $id = $request->user_id;
        $rules = [
            'user_id'     => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        } else {
            $data = User::findOrFail($id);
            if (empty($data)) {
                $this->dataResponse($this->messageResponse('not_found'), $data);
            } else {
                return $this->successResponse($this->messageResponse('get_profile'), $data);
            }
        }
    }
    public function updateProfile(Request $request)
    {
        $rules = [
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email,' . Auth::id(),
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        } else {
            $data           = User::find(Auth::id());
            $data->name     = $request->name;
            $data->email    = $request->email;
            $data->update();
            return $this->successResponse($this->messageResponse('profile_success'), $data);
        }
    }
    public function cities()
    {
        return new CityCollection(City::paginate(10));
    }
    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->token()->revoke();
            return $this->successResponse($this->messageResponse('logout_success'), null);
        }
    }
}
