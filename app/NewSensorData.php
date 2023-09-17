<?php

namespace App;
use App\Sensors;
use App\SensedItem;
use Illuminate\Database\Eloquent\Model;

class NewSensorData extends Model
{
    protected $fillable = [
        'Sensor_ID',
        'Sensor_Type_ID',
        'Data',
        'Time',
        'Note'
    ];
    protected $primaryKey = "Recored_ID";
    public function sensor(){
        return $this->belongsTo('App\Sensors', 'Sensor_ID');
    }
    public function type(){
        return $this->belongsTo('App\SensedItem', 'Sensor_Type_ID');
    }
}