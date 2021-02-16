<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{   
	private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        return $this->UserRepository=$userRepository;
    }

    
    public function create(Request $request)
    {
        $input = $request->all();	
		$createUser = $this->UserRepository->create($input);
        
        return view('welcome', [
            
        ]);
    } 

    
}    
    