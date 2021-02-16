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
            return view('quizz', [
                'question' => $question,
            ]);
        }
        
       /*  dd($question['label']); 
         /* $path = storage_path() . "/json/questions.json"; 
        $json = json_decode(file_get_contents($path), true); 
        var_dump($json);  */

        /* $numberRandom = rand(1, 3);
        $question = Question::find($numberRandom);
        $questionRandom = $question->label; 
        $questionType = $question->type_id;
        $type = Type::find($questionType)->name;
        $questionId = $question->question_id;
        
        $answerProposals = Answer::find($questionId);
        $arrayAnswerProposals = explode(";",$answerProposals->proposals);
        
        $correctAnswer = $answerProposals->answer; */
    
    } 
    
    
}
