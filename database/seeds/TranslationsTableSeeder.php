<?php

use Illuminate\Database\Seeder;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('translations')->insert([
            [
            'translation_id' => 1,
            'word' => 'ball',            
            'translation' => 'мяч',
            'learned' => 0                         
            ],
            [            
            'translation_id' => 2,
            'word' => 'pen',            
            'translation' => 'ручка',
            'learned' => 0
            ],
            [            
            'translation_id' => 3,
            'word' => 'paper',            
            'translation' => 'бумага',
            'learned' => 0
            ],
        ]);
    }
}
