<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepositoryInterface;
use Illuminate\Routing\Controller;

class QuestionController extends Controller
{      
    private $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        return $this->QuestionRepository=$questionRepository;
    }
    
    public function questionRandom()
    { 
        $questions = $this->QuestionRepository->questionRandom();
        foreach($questions as $question) {
            //dd($question['answers']);
            return view('quizz', [
                'question' => $question,
            ]);
        }
    } 
    
    
}
