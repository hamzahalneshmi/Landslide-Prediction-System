<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensedItem extends Model
{
    protected $fillable = [
        'Sensor_ID',
        'Sensor_Type_Name',
        'Max_Value',
        'Min_Value',
        'Value_Measurement_Unit',
        'Warning_Value'
    ];
    protected $primaryKey = "Sensor_Type_ID";
    public function sensor(){
        return $this->belongsTo('App\Sensors', 'Sensor_ID');
    }

    
    
}