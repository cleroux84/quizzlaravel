<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{   
	private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        return $this->UserRepository=$userRepository;
    }

    public function viewForm()
    {
        return view('welcome');
    }

    
    public function create(Request $request)
    {
        $input = $request->all();	
		$create = $this->UserRepository->create($input);
        $id = DB::getPdo()->lastInsertId();
        //dd($input);
        return redirect()->action(
            [QuestionController::class, 'questionRandom'],
            ['id' => $id],
        );
    } 

    
}    
    