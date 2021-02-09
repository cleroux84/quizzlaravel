<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
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
        foreach( $json as $type){
            Type::create(
                array(
                'name'=> $type['type'],
               )
            )->save();
        }
    }
}
