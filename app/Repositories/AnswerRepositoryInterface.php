<?php
namespace App\Repositories;

use Illuminate\Support\Collection;

interface AnswerRepositoryInterface
{
   public function all(): Collection;

   public function getTypeId($questionId); 
   public function getQuestion($questionId);
   public function getCorrectAnswers($questionId);
   public function getAnswerArray($typeId);
}