<?php

namespace App\Http\Controllers;

use App\Repositories\AnswerRepositoryInterface;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AnswerController extends Controller
{      
    private $answerRepository;

    public function __construct(AnswerRepositoryInterface $answerRepository)
    {
        return $this->answerRepository=$answerRepository;
    }
    
    public function checkAnswer(Request $request)
    { 
        $questionId = $request->route('questionId');
        $id = $request->route('id');
        $typeId = $this->answerRepository->getTypeId($questionId);
        $question = $this->answerRepository->getQuestion(($questionId));
        $answersCorrects = $this->answerRepository->getCorrectAnswers($questionId);
        $arrayAnswers = $this->answerRepository->getAnswerArray($typeId);

        return view('answer', [
            'question' => $question,
            'answersCorrects' => $answersCorrects,
            'arrayAnswers' => $arrayAnswers,
            'id' => $id,
        ]);
    }     
}
