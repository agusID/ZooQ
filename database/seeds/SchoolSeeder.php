<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\ZooQ;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zooq = new ZooQ();
        $zooq->name = 'ZooQ';
        $zooq->address = 'Jl. Kebon Jeruk Raya No.27, Kebon Jeruk, Jakarta Barat, Daerah Khusus Ibukota Jakarta 11530.';
        $zooq->contact = '087874061070';
        $zooq->email = 'zooq.support@gmail.com';
        $zooq->about = 'ZooQ is a website with an interactive way of learning information which people sometimes is not interested at the information that is provided on the exhibit display. Sometimes people just wanted too see the attraction without reading the information.';
        $zooq->created_at = Carbon::now();
        $zooq->updated_at = Carbon::now();
        $zooq->save();

    }
}
