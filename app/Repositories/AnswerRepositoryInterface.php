<?php
namespace App\Repositories;

use Illuminate\Support\Collection;

interface AnswerRepositoryInterface
{
   public function all(): Collection;

   public function checkAnswer();
   
}