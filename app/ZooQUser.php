<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZooQUser extends Model
{
    protected $table = 'ms_user';
    protected $primaryKey = 'user_id';
    protected $dates = ['created_at', 'date_of_birth'];

    public function positions() {
        return $this->hasOne('App\UserPosition', 'position_id', 'position_id');
    }
    public function religions() {
        return $this->hasOne('App\Religion', 'religion_id', 'religion_id');
    } 

    
}
