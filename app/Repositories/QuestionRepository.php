<?php

namespace App\Repositories;

use App\Models\Question;
use Illuminate\Support\Collection;

class QuestionRepository implements QuestionRepositoryInterface
{
   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return Question::all();    
   }

   public function questionRandom(): Collection
   {
        $questionRandom = collect(Question::with('answers')->get()->random(1));
        return $questionRandom;
   }

}