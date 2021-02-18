<?php

namespace App\Repositories;

use App\Models\Answer;
use Illuminate\Support\Collection;

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