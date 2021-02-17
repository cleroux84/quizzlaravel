<?php

namespace App\Http\Controllers;

use App\Repositories\AnswerRepositoryInterface;
use Illuminate\Routing\Controller;

class AnswerController extends Controller
{      
    private $answerRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository)
    {
        return $this->Answerpository=$answerRepository;
    }
    
    public function checkAnswer($answered)
    { 
       
    } 
    
    
}
