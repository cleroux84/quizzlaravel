<?php

namespace App\Http\Controllers;


use App\Repositories\UserAnswerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserAnswerController extends Controller
{   
	private $userAnswerRepository;

    public function __construct(UserAnswerRepositoryInterface $userAnswerRepository)
    {
        return $this->UserAnswerRepository=$userAnswerRepository;
    }

    
    public function registerAnswer(Request $request)
    {
        $arrayChecked = $request->answer_id;
        foreach($arrayChecked as $answerchecked){
            $userId = $request->userHidden;
            $questionId = $request->questionHidden;
            if(intval($answerchecked) === 0){
                $input = ['user_id' => $userId, 'answer_id' => null, 'label' => $arrayChecked[0]];
                
            } else {
                $input = ['user_id' => $userId, 'answer_id' => $answerchecked];
            }
     
            $this->UserAnswerRepository->registerAnswer($input);
        }
            $id = $userId;
                    
            return redirect()->action(
                [AnswerController::class, 'checkAnswer'],
                ['id' => $id,
                'questionId' => $questionId,
                ],
            );  
    }
    
}    
    