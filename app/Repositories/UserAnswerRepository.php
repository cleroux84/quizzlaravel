<?php
namespace App\Repositories;

use App\Models\UserAnswer;
use App\Repositories\UserAnswerRepositoryInterface;

class UserAnswerRepository implements UserAnswerRepositoryInterface

{

   public function registerAnswer($anwerInput) 
   {
        return UserAnswer::create($anwerInput)->save();
   }
   
}