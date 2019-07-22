<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EmployeePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ms_user_position')->delete();
        $arr = [
            [
                'position_id'   => 1,
                'position_name' => 'Administrator',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'position_id'   => 2,
                'position_name' => 'User',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            
        ];
        DB::table('ms_user_position')->insert($arr);
    }
}
