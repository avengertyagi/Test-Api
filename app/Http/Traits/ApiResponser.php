<?php

namespace App\Http\Traits;

trait ApiResponser
{
    protected function messageResponse($request)
    {
        $message['signup_success'] = 'You have been register in successfully.';
        $message['login_success'] = 'You have been logged in successfully.';
        $message['logout_success'] = 'You have been logout successfully.';
        $message['profile_success'] = 'You have been update profile in successfully.';
        $message['get_profile']   = 'Get Profile Successfully.';
        $message['get_cities']    = 'Get Cities Successfully.';
        $message['not_found']     = 'Data not found,';
        $message['get_question']   = 'Fetch list successfully.';
        $message['submit_answer']  = 'Answer update successfully.';
        return $message[$request];
    }
    protected function successResponse($message = null, $data, $code = 200)
    {
        return response()->json([
            'message' => $message,
            'status' => true,
            'statusCode' => 200,
            'data'  => $data
        ], $code);
    }
    protected function errorResponse($message = null, $code = 422)
    {
        return response()->json([
            'message' => $message,
            'status' => false,
            'statusCode' => 422,
            'data'  => null,
        ], $code);
    }
    protected function dataResponse($message = null, $code = 403)
    {
        return response()->json([
            'message' => $message,
            'status' => false,
            'statusCode' => 403,
            'data'  => null,
        ], $code);
    }
}
