<?php

namespace App\Http\Controllers;

use App\Repositories\AnswerRepositoryInterface;
use Illuminate\Routing\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AnswerController extends Controller
{      
    private $answerRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository)
    {
        return $this->answerRepository=$answerRepository;
    }
    
    public function checkAnswer(Request $request)
    { 
       $lastAnswerId = request()->route('lastAnswerId');
       $answerUser = DB::table('answers')->where('id', $lastAnswerId)->first()->answer;
       $questionId = DB::table('answers')->where('id', $lastAnswerId)->first()->question_id;
       $question = DB::table('questions')->where('id', $questionId)->first()->label;    

       $QuestionAnswer = DB::table('answers')->where('question_id', '=', $questionId)->get();
      
       //dd($QuestionAnswer);

       $test =  $this->answerRepository->all();
       //dd($test);
       return view('answer', [
           'answerUser' => $answerUser,
           'question' => $question,

       ]);
    } 
    
    
}
