<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public  function dropzoneUi()
    {
        return view('dropzone-file-upload');
    }
    public  function dropzoneFileUpload(Request $request)
    {
        if ($request->hasFile('file')) {
            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:jpeg,jpg,png',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            } else {
                try {
                    $bannerImage = '-image-' . time() . '.' . $request->file('file')->guessExtension();
                    $path = '/drop';
                    $request->file('file')->storeAs($path, $bannerImage, 'public');
                } catch (Exception $e) {
                    return back()->with('error', 'Could not upload your file');
                }
            }
        }
        $data = new Image();
        $data['image_name'] = $bannerImage;
        $data->save();
        return response()->json(['success' => $bannerImage]);
    }
}
