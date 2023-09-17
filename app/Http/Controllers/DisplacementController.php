<?php

namespace App\Http\Controllers;

use App\Displacement;
use App\NewSensorData;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Sensors;
use App\SensedItem;
use App\MonitoredLocation;
use App\Initialization;
use Alert;
class DisplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->can('Show Displacement')){
            $initialization_IDs = Initialization::pluck('Sensor_Type_ID');
            $initializations = Initialization::all();
            $records = NewSensorData::whereIn('Sensor_Type_ID', $initialization_IDs)->orderBy('Time', 'desc')->paginate(50);
            $sensors = Sensors::all();
            $senseditems = SensedItem::whereIn('Sensor_Type_ID', $initialization_IDs)->paginate(50);
            toast('All data have been loaded seccessfully','info');
            return view('Admin-lte.data.displacement', compact('records', 'sensors', 'senseditems','initializations', 'initialization_IDs'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth()->user()->can('Show Displacement')){
            $sensors = Sensors::all();
            $initialization_IDs = Initialization::pluck('Sensor_Type_ID');
            $initializations = Initialization::all();
            $senseditems = SensedItem::all();
            if(!empty($request->Sensor) || !empty($request->senseditem)){
            if(!empty($request->senseditem))
            {
                $records = NewSensorData::where('Sensor_Type_ID',$request->senseditem)->paginate(50);
            }

            toast('Data is filtered','info');
            return view('Admin-lte.data.displacement', compact('records','sensors', 'senseditems','initialization_IDs','initializations'));
        }
        toast('Sorry, something went wrong!','error');
        $records = NewSensorData::paginate(50);
            return view('Admin-lte.data.displacement', compact('sensors','senseditems','records','initialization_IDs','initializations'));
        }
        return view('errors.401');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Displacement  $displacement
     * @return \Illuminate\Http\Response
     */
    public function show(Displacement $displacement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Displacement  $displacement
     * @return \Illuminate\Http\Response
     */
    public function edit(Displacement $displacement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Displacement  $displacement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Displacement $displacement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Displacement  $displacement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Displacement $displacement)
    {
        //
    }
}
