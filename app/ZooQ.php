<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZooQ extends Model
{
    protected $table = 'ms_zooq';
    protected $primaryKey = 'zooq_id';

    public function hex_colors(){
        return $this->hasOne('App\Color', 'color_id', 'primary_color');
    }
}

