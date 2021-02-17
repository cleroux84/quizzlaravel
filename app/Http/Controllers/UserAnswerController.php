<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserAnswerRepositoryInterface;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;

class UserAnswerController extends Controller
{   
	private $userAnswerRepository;

    public function __construct(UserAnswerRepositoryInterface $userAnswerRepository)
    {
        return $this->UserAnswerRepository=$userAnswerRepository;
    }

    
    public function registerAnswer(Request $request)
    {
        //$input = $request->all();
        $typeAnswer = $request->typeAnswerHidden;
        
 

        $arrayChecked = $request->get('answer_id');
        
            foreach($arrayChecked as $answerchecked){
                if(intval($answerchecked) === 0){
                    $userAnswer = New UserAnswer;
                    $userAnswer->label = $arrayChecked[0];
                    $userAnswer->user_id = $request->get('user_id');
                    $userAnswer->save();
              } else {
                    $userAnswer = New UserAnswer;
                    $userAnswer->user_id = $request->get('user_id');
                    $userAnswer->answer_id = $answerchecked;
                    $userAnswer->save(); 
                    }
                }   
       
        
            /* if(strtolower($request->get('answer_id')) === "jaune"){
                dd('vrai');
            } else {
                dd('faux');
            } */
            //dd($request->get('answer_id'));
    
        
		//$this->userAnswerRepository->registerAnswer($input);
        $id = $request->get('user_id');
        return redirect()->action(
            [QuestionController::class, 'questionRandom'],
            ['id' => $id],

        );
    } 

    
}    
    