<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use App\Repositories\QuestionRepository;
use Illuminate\Routing\Controller;

class QuestionController extends Controller
{      
  /*   private $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        return $this->QuestionRepository=$questionRepository;
    } */
    


    public function askQuestion(Request $request)
    { 
         /* $path = storage_path() . "/json/questions.json"; 
        $json = json_decode(file_get_contents($path), true); 
        var_dump($json);  */

        $numberRandom = rand(1, 3);
        $question = Question::find($numberRandom);
        $questionRandom = $question->label; 
        $questionType = $question->type_id;
        $type = Type::find($questionType)->name;

        $questionId = $question->id;
        $answerProposals = Answer::find($questionId);
        $arrayAnswerProposals = explode(";",$answerProposals->proposals);
        
        $correctAnswer = $answerProposals->answer;

        $path = storage_path() . "/json/questions.json"; 
        $json = json_decode(file_get_contents($path), true);
        for ($i=0; $i < count($json); $i++) 
        {
            $question_id = DB::table('questions')->where('label', '=', $json[$i]['data']['label'])->first()->id;
            if($json[$i]['type'] === "checkbox" || $json[$i]['type'] === "radio")
            {
              
                $array2 = $json[$i]['data']['answers'];
                for ($y = 0; $y < count($array2); $y++)
                {
                    if (DB::table('answers')->where('answer', '=', $array2[$y]))
                    {$isValid = 1;}
                }
               
            }
        }


        return view('quizz', [
            'questionRandom' => $questionRandom,
            'type' => $type,
            'arrayAnswerProposals' => $arrayAnswerProposals,
            'correctAnswer' =>  $correctAnswer,
        ]);
    } 
    
    
}
