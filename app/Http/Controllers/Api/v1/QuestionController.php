<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    use ApiResponser;
    //question list
    public function questionList()
    {
        $data = Question::get();
        return $this->successResponse($this->messageResponse('get_question'), $data);
    }
    //show question
    public function questionShow($id)
    {
        $data = Question::findOrFail($id);
        if (empty($data)) {
            $this->dataResponse($this->messageResponse('not_found'), $data);
        } else {
            return $this->successResponse($this->messageResponse('get_question'), $data);
        }
    }
    //submit question
    public function submitQuestion(Request $request)
    {
        $rules = [
            'question_id' => 'required',
            'answer'      => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(), 422);
        } else {
            $question = Question::where('id',$request->question_id)->update([
                'user_id' => $request->user_id,
                'answer'  => $request->answer,
            ]);
            return $this->successResponse($this->messageResponse('submit_answer'), $question);
        }
    }
}
