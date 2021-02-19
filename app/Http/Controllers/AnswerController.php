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
        $questionId = $request->route('questionId');
        $id = $request->route('id');
        $typeId = DB::table('questions')->where('id', $questionId)->first()->type_id;
    
        $arrayAnswers = [];

        if($typeId === 2)
        {
            $lastAnswerId = DB::table('user_answers')->latest()->first()->answer_id; 
            $answerUser = DB::table('answers')->where('id', $lastAnswerId)->first()->answer;
            $lastUserAnswerId = DB::table('user_answers')->latest()->first()->id;
            $lastSecondUserAnswerId = $lastUserAnswerId + 1;
            $secondAnswerId = DB::table('user_answers')->where('id', $lastSecondUserAnswerId)->first()->answer_id; 
            $secondAnswerUser = DB::table('answers')->where('id', $secondAnswerId)->first()->answer;
            array_push($arrayAnswers, $answerUser, $secondAnswerUser);
            //dd($arrayAnswers);
        } elseif($typeId === 1){
            
            $lastAnswerLabel = DB::table('user_answers')->latest()->first()->label;
            array_push($arrayAnswers, $lastAnswerLabel);
            //dd($arrayAnswers);
        }  else {
            $lastAnswerId = DB::table('user_answers')->latest()->first()->answer_id; 
            $answerUser = DB::table('answers')->where('id', $lastAnswerId)->first()->answer;
            array_push($arrayAnswers, $answerUser);
            //dd($arrayAnswers);
        }

            //libellé de la question posée :
            $question = DB::table('questions')->where('id', $questionId)->first()->label;

            //tableau des réponses correctes :
            $answersCorrects = DB::table('answers')->where([
                ['question_id', '=', $questionId],
                ['is_valid', '=', '1'],
                ])->get();
                
            return view('answer', [
                'question' => $question,
                'answersCorrects' => $answersCorrects,
                'arrayAnswers' => $arrayAnswers,
                'id' => $id,
            ]);
    } 
    
    
}
