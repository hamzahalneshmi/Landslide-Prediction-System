<?php

namespace App\Http\Controllers;

use App\MonitoredLocation;
use Illuminate\Http\Request;
use DB;
use Alert;

class MonitoredLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->can('Show Monitored locations')){
        $locations = MonitoredLocation::paginate(5);
  
        return view('Admin-lte.Sensors.index',compact('locations'));
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
        if(Auth()->user()->can('Add Monitored Location')){
        return view('Admin-lte.Sensors.create');
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
        if(Auth()->user()->can('Add Monitored Location')){
        $request->validate([
            'Location_Name'=>'required',
            'Latitude'=>'required',
            'Longitude'=>'required',
            'Hight'=>'required',
            'Installation_Time'=>'required'
        ]);

        $locations = new MonitoredLocation([
            'Location_Name' => $request->get('Location_Name'),
            'Latitude' => $request->get('Latitude'),
            'Longitude' => $request->get('Longitude'),
            'Hight' => $request->get('Hight'),
            'Installation_Time' => $request->get('Installation_Time')
            ]);
        $locations->save();
        Alert::success('Success', 'Location saved!');

        return redirect('/admin/MonitoredLocations');
        }
        return view('errors.401');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MonitoredLocation  $monitoredLocation
     * @return \Illuminate\Http\Response
     */
    public function show(MonitoredLocation $monitoredLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MonitoredLocation  $monitoredLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(MonitoredLocation $monitoredLocation, $id)
    {
        if(Auth()->user()->can('Edit Monitored Location')){
        $location = MonitoredLocation::find($id);
        return view('Admin-lte.Sensors.edit', compact('location'));
        }
        return view('errors.401');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MonitoredLocation  $monitoredLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth()->user()->can('Edit Monitored Location')){
        $request->validate([
            'Location_Name'=>'required',
            'Latitude'=>'required',
            'Longitude'=>'required',
            'Hight'=>'required',
            'Installation_Time'=>'required'
        ]);

        $location = MonitoredLocation::find($id);
        $location->Location_Name =  $request->get('Location_Name');
        $location->Latitude = $request->get('Latitude');
        $location->Longitude = $request->get('Longitude');
        $location->Hight = $request->get('Hight');
        $location->Installation_Time = $request->get('Installation_Time');
        $location->save();
        Alert::success('Success', 'Location updated!');
        return redirect('/admin/MonitoredLocations');
    }
    return view('errors.401');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MonitoredLocation  $monitoredLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth()->user()->can('Delete Monitored Location')){
        $location = MonitoredLocation::findOrFail($id);
        $location->delete();
        Alert::success('Success', 'Location has been deleted!');
        return redirect()->back(); 
    }
    return view('errors.401');
    }
}
