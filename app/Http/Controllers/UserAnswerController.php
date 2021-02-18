<?php

namespace App\Http\Controllers;


use App\Repositories\UserAnswerRepositoryInterface;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{   
	private $userAnswerRepository;

    public function __construct(UserAnswerRepositoryInterface $userAnswerRepository)
    {
        return $this->UserAnswerRepository=$userAnswerRepository;
    }

    
    public function registerAnswer(Request $request)
    {
        $typeAnswer = $request->typeAnswerHidden;

        if ($typeAnswer === "1")
        {
            $answer = $request->textanswer;
            $request->except('_token');
            $userId = $request->userHidden;
            $data = ['user_id' => $userId, 'answer_id' => null, 'label' => $answer];
            //dd($data);
            $registerAnswer = $this->UserAnswerRepository->registerAnswer($data);
        }
        elseif ($typeAnswer === "2")
        {
            $answers = $request->checkboxanswer;
            foreach ($answers as $answer) 
            {
                $request->except('_token');
                $userId = $request->userHidden;
                $data = ['user_id' => $userId, 'answer_id' => $answer];
                $registerAnswer = $this->UserAnswerRepository->registerAnswer($data);
            }
        } 
        else 
        {
            $answers = $request->radioanswer;
            foreach ($answers as $answer) 
            {
                $request->except('_token');
                $userId = $request->userHidden;
                $data = ['user_id' => $userId, 'answer_id' => $answer];
                $registerAnswer = $this->UserAnswerRepository->registerAnswer($data);
            }
        }
    }
    
}    
    