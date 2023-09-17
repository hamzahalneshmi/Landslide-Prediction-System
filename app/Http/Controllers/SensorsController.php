<?php

namespace App\Http\Controllers;

use App\Sensors;
use App\MonitoredLocation;
use Illuminate\Http\Request;
use Alert;

class SensorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->can('Show Sensors')){
        $sensors = Sensors::paginate(5);
        $Mlocations = MonitoredLocation::all();
        return view('Admin-lte.Sensors.sensors_index',compact('sensors','Mlocations'));
    }
    return view('errors.401');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth()->user()->can('Add Sensor')){
        $Mlocations = MonitoredLocation::all();

        return view('Admin-lte.Sensors.create')->with('Mlocations', $Mlocations);
    }
    return view('errors.401');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth()->user()->can('Add Sensor')){
        $request->validate([
            'Sensor_Name'=>'required',
            'Monitored_Location_ID'=>'required',
            'Latitude'=>'required',
            'Longitude'=>'required',
            'Installation_Time'=>'required'
        ]);

        $sensors = new Sensors([
            'Sensor_Name' => $request->get('Sensor_Name'),
            'Monitored_Location_ID' => $request->get('Monitored_Location_ID'),
            'Latitude' => $request->get('Latitude'),
            'Longitude' => $request->get('Longitude'),
            'Installation_Time' => $request->get('Installation_Time')
            ]);
            Alert::success('Success', 'Sensor saved!');

        $sensors->save();
        return redirect('/admin/sensors');
    }
    return view('errors.401');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function show(Sensors $sensors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensors $sensors,$id)
    {
        if(Auth()->user()->can('Edit Sensor')){
        $sensor = Sensors::find($id);
        $Mlocations = MonitoredLocation::all();
        return view('Admin-lte.Sensors.edit_sensors', compact('sensor','Mlocations'));
    }
    return view('errors.401');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth()->user()->can('Edit Sensor')){
        $request->validate([
            'Sensor_Name'=>'required',
            'Monitored_Location_ID'=>'required',
            'Latitude'=>'required',
            'Longitude'=>'required',
            'Installation_Time'=>'required'
        ]);

        $sensor = Sensors::find($id);
        $sensor->Sensor_Name =  $request->get('Sensor_Name');
        $sensor->Monitored_Location_ID = $request->get('Monitored_Location_ID');
        $sensor->Latitude = $request->get('Latitude');
        $sensor->Longitude = $request->get('Longitude');
        $sensor->Installation_Time = $request->get('Installation_Time');
        $sensor->save();
        Alert::success('Success', 'Snesor updated!');

        return redirect('/admin/sensors');
    }
    return view('errors.401');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth()->user()->can('Delete Sensor')){
        $sensor = Sensors::findOrFail($id);
        $sensor->delete();
        Alert::success('Success', 'Sensor has been deleted!');

        return redirect()->back();
    }
    return view('errors.401'); 
    }
}
