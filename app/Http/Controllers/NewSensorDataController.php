<?php

namespace App\Http\Controllers;

use App\NewSensorData;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sensors;
use App\SensedItem;
use App\MonitoredLocation;
use Alert;
class NewSensorDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->can('Read Data')){
        $records = NewSensorData::orderBy('Time', 'desc')->paginate(50);
        $sensors = Sensors::all();
        $senseditems = SensedItem::all();
        toast('All data have been loaded seccessfully','info');
        return view('Admin-lte.data.records', compact('records', 'sensors', 'senseditems'));
    }
    return view('errors.401');
    }




    public function backup()
    {
        $data = NewSensorData::get(); 
        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($data, ['Recored_ID', 'Sensor_ID', 'Sensor_Type_ID', 'Data', 'Time', 'Note', 'created_at', 'updated_at'])->download('data.csv');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth()->user()->can('Read Data')){
            $sensors = Sensors::all();
            $senseditems = SensedItem::all();
            if(!empty($request->Sensor) || !empty($request->senseditem)){
            if(!empty($request->Sensor))
            {
                $records = NewSensorData::where('Sensor_ID',$request->Sensor)->paginate(50);
            }
            if(!empty($request->senseditem))
            {
                $records = NewSensorData::where('Sensor_Type_ID',$request->senseditem)->paginate(50);
            }

            toast('Data is filtered','info');
            return view('Admin-lte.data.records', compact('records','sensors','senseditems'));
        }
        toast('Sorry, something went wrong!','error');
        $records = NewSensorData::paginate(50);
            return view('Admin-lte.data.records', compact('sensors','senseditems','records'));
        }
        return view('errors.401');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewSensorData  $newSensorData
     * @return \Illuminate\Http\Response
     */
    public function show(NewSensorData $newSensorData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewSensorData  $newSensorData
     * @return \Illuminate\Http\Response
     */
    public function edit(NewSensorData $newSensorData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewSensorData  $newSensorData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewSensorData $newSensorData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewSensorData  $newSensorData
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewSensorData $newSensorData)
    {
        //
    }
}
