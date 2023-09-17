<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonitoredLocation extends Model
{
    protected $fillable = [
        'Location_Name',
        'Latitude',
        'Longitude',
        'Hight',
        'Installation_Time'
    ];
    protected $primaryKey = "Monitored_Location_ID";

    public function sensors(){
        return $this->hasMany('App\Sensors');
    }

}
