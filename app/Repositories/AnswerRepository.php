<?php

namespace App\Repositories;

use App\Models\Answer;
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

   public function checkAnswer()
   {
        
   }

}