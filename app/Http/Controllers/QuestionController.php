<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function testController()
    {
        $path = storage_path() . "/json/questions.json"; 
        $json = json_decode(file_get_contents($path), true); 
        var_dump($json);
    }
    

}
