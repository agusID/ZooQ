<?php

use Illuminate\Database\Seeder;
use App\Slideshow;
use Carbon\Carbon;

class SlideshowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slideshow = new Slideshow();
        $arr = [
            [
                'title'         => 'Bogor Zoology Museum',
                'description'   => 'Bogor Zoology Museum is a museum located to the next of the main entrance of the Bogor Botanical Garden in the city of Bogor, Indonesia.The museum and its laboratory was founded on 1894 by government of Dutch East Indies during the colonial era. It contain one of the largest collection of preserved fauna specimen in Southeast Asia.',
                'image'         => '1.png',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'title'         => 'Bogor Zoology Museum',
                'description'   => 'Bogor Zoological Museum has space of 1500 meter square and contain one of the most extensive fauna collection in Asia. There is 24 rooms in the museum and  the museum collection include fossilised and preserved animals',
                'image'         => '2.png',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'title'         => 'Main Hall',
                'description'   => 'There is also a skeleton of Balaenoptera musculus (blue whale), which is the biggest of its kind in Indonesia.',
                'image'         => '3.png',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ];

        $slideshow->insert($arr);
    }
}
