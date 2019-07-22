<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('admin');
        $user->role_id = 1;
        $user->user_id = 1;
        $user->last_login = Carbon::now();
        $user->save();

        $user = new User();
        $user->email = 'dwiagus105@gmail.com';
        $user->password = bcrypt('pastibisa');
        $user->role_id = 2;
        $user->user_id = 2;
        $user->last_login = Carbon::now();
        $user->save();

        $user = new User();
        $user->email = 'leonkur.me@gmail.com';
        $user->password = bcrypt('leonardo');
        $user->role_id = 2;
        $user->user_id = 3;
        $user->last_login = Carbon::now();
        $user->save();

        $user = new User();
        $user->email = 'stephaniewilhelmina13@gmail.com';
        $user->password = bcrypt('stephanie');
        $user->role_id = 2;
        $user->user_id = 4;
        $user->last_login = Carbon::now();
        $user->save();

        $user = new User();
        $user->email = 'krisjuliyanto@gmail.com';
        $user->password = bcrypt('kris');
        $user->role_id = 2;
        $user->user_id = 5;
        $user->last_login = Carbon::now();
        $user->save();
    }
}
