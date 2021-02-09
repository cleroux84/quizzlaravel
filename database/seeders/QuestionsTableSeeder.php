<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
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
        foreach( $json as $question)
        {
            $type_id = DB::table('types')->where('name', '=', $question['type'])->first()->id;
           
            Question::create(
                array(
                'label'=> $question['data']['label'],
                'type_id'=>$type_id,
            )
            )->save();
    }
    }
}
