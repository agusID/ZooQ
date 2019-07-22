<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Question;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new Question;
        $arr = [
            [
                'question' => 'What is this bird called ?',
                'description' => '-',
                'answer_1'  => 'Bayan',
                'answer_2'  => 'Burung Tiker dan Tikusan',
                'answer_3'  => 'Mambruk',
                'answer_4'  => 'Nuri Merah Kepala Hitam',
                'image'  => '1.png',
                'correct_answer'  => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'What is this bird called ?',
                'description' => '-',
                'answer_1'  => 'Bayan',
                'answer_2'  => 'Burung Tiker dan Tikusan',
                'answer_3'  => 'Mambruk',
                'answer_4'  => 'Nuri Merah Kepala Hitam',
                'image'  => '2.png',
                'correct_answer'  => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'What is this bird called ?',
                'description' => '-',
                'answer_1'  => 'Bayan',
                'answer_2'  => 'Burung Tiker dan Tikusan',
                'answer_3'  => 'Mambruk',
                'answer_4'  => 'Nuri Merah Kepala Hitam',
                'image'  => '3.png',
                'correct_answer'  => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'What is this bird called ?',
                'description' => '-',
                'answer_1'  => 'Bayan',
                'answer_2'  => 'Burung Tiker dan Tikusan',
                'answer_3'  => 'Mambruk',
                'answer_4'  => 'Rangkong dan Julang',
                'image'  => '4.png',
                'correct_answer'  => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            
            [
                'question' => 'The spread of Eagle birds from India to',
                'description' => '-',
                'answer_1'  => 'Kepulauan Seribu',
                'answer_2'  => 'Kepulauan Hindia',
                'answer_3'  => 'Kepulauan Salomon',
                'answer_4'  => 'Kepulauan Jawa',
                'image'  => '5.png',
                'correct_answer'  => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],   
            [
                'question' => 'What kind of animal from this fossil picture ?',
                'description' => '-',
                'answer_1'  => 'Anoa',
                'answer_2'  => 'Tapir',
                'answer_3'  => 'Badak Sumatra',
                'answer_4'  => 'Harimau Sumatra',
                'image'  => '6.png',
                'correct_answer'  => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],   
            [
                'question' => 'What kind of animal from this fossil picture ?',
                'description' => '-',
                'answer_1'  => 'Anoa',
                'answer_2'  => 'Tapir',
                'answer_3'  => 'Badak Sumatra',
                'answer_4'  => 'Harimau Sumatra',
                'image'  => '7.png',
                'correct_answer'  => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],  
            [
                'question' => 'What kind of animal from this fossil picture ?',
                'description' => '-',
                'answer_1'  => 'Anoa',
                'answer_2'  => 'Tapir',
                'answer_3'  => 'Badak Sumatra',
                'answer_4'  => 'Harimau Sumatra',
                'image'  => '8.png',
                'correct_answer'  => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],   
            [
                'question' => 'What is the name of animal number 6',
                'description' => '-',
                'answer_1'  => 'Lutung',
                'answer_2'  => 'Kera',
                'answer_3'  => 'Monyet Sulawesi',
                'answer_4'  => 'Owa',
                'image'  => '9.png',
                'correct_answer'  => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],   
            [
                'question' => 'What is the name of animal number 7 ?',
                'description' => '-',
                'answer_1'  => 'Lutung',
                'answer_2'  => 'Kera',
                'answer_3'  => 'Monyet Sulawesi',
                'answer_4'  => 'Owa',
                'image'  => '10.png',
                'correct_answer'  => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],     
        ];
        $question->insert($arr);
    }
}
