<?php

use Illuminate\Database\Seeder;
use App\Gallery;
use Carbon\Carbon;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gallery = new Gallery();
        $arr = [
            [
                'title'         => 'Ikan and Molusca',
                'description'   => 'An animal kind that live in water.',
                'image'         => '4.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'         => 'Serak',
                'description'   => 'A bird that looks like an owl.',
                'image'         => '1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title'         => 'Map',
                'description'   => 'A helpful piece of information.',
                'image'         => '3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'         => 'Orang utan',
                'description'   => 'Monkey full of intelligence',
                'image'         => '2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'         => 'Hall',
                'description'   => 'Road to knowledge',
                'image'         => '6.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],       

            [
                'title'         => 'The largest whale in Indonesia',
                'description'   => 'Skeleton of Balaenoptera musculus (blue whale).',
                'image'         => '5.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
     
            [
                'title'         => 'Insect',
                'description'   => 'Six to eight legged animal.',
                'image'         => '7.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ];

        $gallery->insert($arr);
    }
}
