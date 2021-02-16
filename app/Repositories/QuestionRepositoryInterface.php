<?php
namespace App\Repositories;

use Illuminate\Support\Collection;

interface QuestionRepositoryInterface
{
   public function all(): Collection;


   public function questionRandom(): Collection;
   
}