<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Models\Question;
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


}