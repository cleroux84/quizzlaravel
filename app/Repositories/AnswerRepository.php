<?php

namespace App\Repositories;

use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Repositories\AnswerRepositoryInterface;


class AnswerRepository implements AnswerRepositoryInterface
{
   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return Answer::all();    
   }

   public function getQuestion($questionId)
   {
    $question = DB::table('questions')->where('id', $questionId)->first()->label;
    return $question;
   }

   public function getTypeId($questionId)
   {
    $typeId = DB::table('questions')->where('id', $questionId)->first()->type_id;
    return $typeId;
   }

   public function getCorrectAnswers($questionId)
   {
    $answersCorrects = DB::table('answers')->where([
        ['question_id', '=', $questionId],
        ['is_valid', '=', '1'],
        ])->get();
    return $answersCorrects;
   }

   public function getAnswerArray($typeId)
   {
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
            return $arrayAnswers;
        } 
        elseif ($typeId === 1)
        {
            $lastAnswerLabel = DB::table('user_answers')->latest()->first()->label;
            array_push($arrayAnswers, $lastAnswerLabel);
            return $arrayAnswers;
        }    
        else
        {
            $lastAnswerId = DB::table('user_answers')->latest()->first()->answer_id; 
            $answerUser = DB::table('answers')->where('id', $lastAnswerId)->first()->answer;
            array_push($arrayAnswers, $answerUser);
            return $arrayAnswers;
        }

   }


}