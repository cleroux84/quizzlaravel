<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return User::all();    
   }

   public function create($input)
   {
        return User::create($input)->save();
   }

}