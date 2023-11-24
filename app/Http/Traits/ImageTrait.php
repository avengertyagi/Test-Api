<?php

namespace App\Http\Traits;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

trait ImageTrait
{
    public function uploadFile($request, $data, $name, $inputName = 'files')
    {
        try {
            $Image = 'user-' . time() . '.' . $request->file('image')->guessExtension();
            $path = '/user/profile';
            $request->file('image')->storeAs($path, $Image, 'public');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not upload your file', $e->getMessage()]);
        }
    }
}
