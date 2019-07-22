<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ColorSeeder::class,
            RoleSeeder::class,
            SchoolSeeder::class,
            EmployeePositionSeeder::class,
            EmployeeSeeder::class,
            UserSeeder::class,
            GallerySeeder::class,
            SlideshowSeeder::class,
            MediaSocialSeeder::class,
            CourseSeeder::class,
        ]);
    }
}
