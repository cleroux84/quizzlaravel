<?php

namespace App\Repositories;

use App\Models\Question;
use Illuminate\Support\Collection;

class QuestionRepository
{
   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return Question::all();    
   }

}