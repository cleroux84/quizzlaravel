<?php
namespace App\Repositories;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
   public function all(): Collection;

   public function create($input) ;
   
}