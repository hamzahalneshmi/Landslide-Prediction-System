<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Initialization extends Model
{
    //
    protected $primaryKey = "Initialization_ID";
    protected $fillable = ['Sensor_Type_ID','Sensor_ID', 'High_Risk_Top', 'High_Risk_Bottom', 'Medium_Risk_Top', 'Medium_Risk_Bottom', 'Low_Risk_Top', 'Low_Risk_Bottom'];
    
    
    public function sensed_item(){
        return $this->belongsTo('App\SensedItem', 'Sensor_Type_ID');
    }
}
