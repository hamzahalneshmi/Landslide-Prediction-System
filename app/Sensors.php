<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensors extends Model
{
    protected $fillable = [
        'Sensor_Name',
        'Monitored_Location_ID',
        'Latitude',
        'Longitude',
        'Installation_Time'
    ];
    protected $primaryKey = "Sensor_ID";

    public function location(){
        return $this->belongsTo('App\MonitoredLocation', 'Monitored_Location_ID');
    }
    public function item(){
        return $this->hasMany('App\SensedItem');
    }
}
