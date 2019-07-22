<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('ms_color')->delete();
        $arr = [
            ['color_name' => 'Default', 'hex_color' => '#5352ed'],
            ['color_name' => 'Turquoise', 'hex_color' => '#1abc9c'],
            ['color_name' => 'Salem', 'hex_color' => '#1E824C'],
            
            ['color_name' => 'Green Sea', 'hex_color' => '#16a085'],
            ['color_name' => 'Emerald', 'hex_color' => '#2ecc71'],
            ['color_name' => 'Nephritis', 'hex_color' => '#27ae60'],
            ['color_name' => 'Peter River', 'hex_color' => '#3498db'],
            ['color_name' => 'Green Darner Tail', 'hex_color' => '#74b9ff'],
            ['color_name' => 'Electron Blue', 'hex_color' => '#0984e3'],
        
            ['color_name' => 'Belize Hole', 'hex_color' => '#2980b9'],
            ['color_name' => 'Amethyst', 'hex_color' => '#9b59b6'],
            ['color_name' => 'Wisteria', 'hex_color' => '#8e44ad'],
            ['color_name' => 'Rebeccapurple', 'hex_color' => '#663399'],
            ['color_name' => 'Wet Asphalt', 'hex_color' => '#34495e'],
            ['color_name' => 'Midnight Blue', 'hex_color' => '#2c3e50'],
            ['color_name' => 'Asbestos', 'hex_color' => '#7f8c8d'],
            ['color_name' => 'Concrete', 'hex_color' => '#95a5a6'],
            ['color_name' => 'Silver', 'hex_color' => '#bdc3c7'],
            ['color_name' => 'Clouds', 'hex_color' => '#ecf0f1'],
            ['color_name' => 'Pomegranate', 'hex_color' => '#c0392b'],
            ['color_name' => 'Alizarin', 'hex_color' => '#e74c3c'],
            ['color_name' => 'Old Brick', 'hex_color' => '#96281B'],
            ['color_name' => 'Soft Red', 'hex_color' => '#EC644B'],
            
            ['color_name' => 'Pumpkin', 'hex_color' => '#d35400'],
            ['color_name' => 'Carrot', 'hex_color' => '#e67e22'],
            ['color_name' => 'Orange', 'hex_color' => '#f39c12'],
            ['color_name' => 'Sun Flower', 'hex_color' => '#f1c40f'],
             
        ];
        DB::table('ms_color')->insert($arr); 
    }
}
