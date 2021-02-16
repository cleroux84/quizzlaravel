<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . "/json/questions.json"; 
        $json = json_decode(file_get_contents($path), true); 
        for ($i=0; $i < count($json); $i++) 
        {
            $question_id = DB::table('questions')->where('label', '=', $json[$i]['data']['label'])->first()->id;
            if($json[$i]['type'] === "checkbox" || $json[$i]['type'] === "radio")
            {
                $answer = ($json[$i]['data']['values']);
                    for ($y=0; $y <count($answer) ; $y++){
                        Answer::create(
                            array(
                                'answer' => $answer[$y],
                                'question_id' => $question_id,
                            )
                        )->save();
                    }
            } else {
                $answer = ($json[$i]['data']['answer']);
                Answer::create(
                    array(
                        'answer' => $answer,
                        'question_id' => $question_id,
                    )
                )->save();
            };
        }
    }
}
