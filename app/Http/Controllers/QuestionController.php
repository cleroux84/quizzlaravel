<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use App\Repositories\QuestionRepository;
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
