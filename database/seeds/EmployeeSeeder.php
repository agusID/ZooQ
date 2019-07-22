<?php

use Illuminate\Database\Seeder;
use App\ZooQUser;
use Carbon\Carbon;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ZooQUser = new ZooQUser();
        $arr = [
            [
                'position_id'       => 1,
                'name'              => 'Administrator',
                'email'             => 'admin@gmail.com',
                'gender'            => 'Male',
                'phone'             => '087874061070',
                'profile_picture'   => 'default-avatar.png',
                'address'           => 'Bogor',
                'description'       => '-',
            ],
            [
                'position_id'       => 2,
                'name'              => 'Dwi Agustianto',
                'email'             => 'dwiagus105@gmail.com',
                'gender'            => 'Male',
                'phone'             => '087874061070',
                'profile_picture'   => 'default-avatar.png',
                'address'           => 'Bogor',
                'description'       => '-',
            ],
            [
                'position_id'       => 2,
                'name'              => 'Leonardo Kurniawan',
                'email'             => 'leonkur.me@gmail.com',
                'gender'            => 'Male',
                'phone'             => '087874061070',
                'profile_picture'   => 'default-avatar.png',
                'address'           => 'Jakarta',
                'description'       => '-',
            ],
            [
                'position_id'       => 2,
                'name'              => 'Stephanie Wilhelmina',
                'email'             => 'stephaniewilhelmina13@gmail.com',
                'gender'            => 'Female',
                'phone'             => '087874061070',
                'profile_picture'   => 'stephanie_w.png',
                'address'           => 'Jakarta',
                'description'       => '-',
            ],
            [
                'position_id'       => 2,
                'name'              => 'Kris Juliyanto',
                'email'             => 'krisjuliyanto@gmail.com',
                'gender'            => 'Male',
                'phone'             => '087874061070',
                'profile_picture'   => 'kris_j.png',
                'address'           => 'Jakarta',
                'description'       => '-',
            ],

        ];


        $ZooQUser->insert($arr);
    }
}
