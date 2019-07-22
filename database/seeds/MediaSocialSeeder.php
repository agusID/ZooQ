<?php

use Illuminate\Database\Seeder;
use App\MediaSocial;

class MediaSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medsos = new MediaSocial();
        $arr = [
            [
                'name'   => 'Twitter',
                'link'   => '#',
                'logo'   => 'fa-twitter',
                'is_active' => true,
            ],
            [
                'name'   => 'Instagram',
                'link'   => '#',
                'logo'   => 'fa-instagram',
                'is_active' => true,
            ],
            [
                'name'   => 'Facebook',
                'link'   => '#',
                'logo'   => 'fa-facebook',
                'is_active' => true,
            ],
            [
                'name'   => 'Google+',
                'link'   => '#',
                'logo'   => 'fa-google-plus-g',
                'is_active' => true,
            ],
        ];

        $medsos->insert($arr);

    }
}
