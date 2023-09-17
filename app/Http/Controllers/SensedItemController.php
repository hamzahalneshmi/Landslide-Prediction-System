<?php

namespace App\Http\Controllers;

use App\SensedItem;
use App\Sensors;
use Illuminate\Http\Request;
use Alert;
class SensedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->can('Show Sensed Items')){
        $sneseditems = SensedItem::paginate(5);
        $sensors = Sensors::all();
        return view('Admin-lte.Sensors.sensor_type_index',compact('sneseditems','sensors'));
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
        if(Auth()->user()->can('Add Sensed Item')){
        $sensors = sensors::all();

        return view('Admin-lte.Sensors.create')->with('sensors', $sensors);
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
        if(Auth()->user()->can('Add Sensed Item')){
        $request->validate([
            'Sensor_ID'=>'required',
            'Sensor_Type_Name'=>'required',
            'Max_Value'=>'required',
            'Min_Value'=>'required',
            'Value_Measurement_Unit'=>'required',
            'Warning_Value'=>'required'
        ]);

        $senseditem = new SensedItem([
            'Sensor_ID' => $request->get('Sensor_ID'),
            'Sensor_Type_Name' => $request->get('Sensor_Type_Name'),
            'Max_Value' => $request->get('Max_Value'),
            'Min_Value' => $request->get('Min_Value'),
            'Value_Measurement_Unit' => $request->get('Value_Measurement_Unit'),
            'Warning_Value' => $request->get('Warning_Value')
            ]);
        $senseditem->save();
        Alert::success('Success', 'Sened Item saved!');

        return redirect('/admin/senseditem');
    }
    return view('errors.401');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SensedItem  $sensedItem
     * @return \Illuminate\Http\Response
     */
    public function show(SensedItem $sensedItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SensedItem  $sensedItem
     * @return \Illuminate\Http\Response
     */
    public function edit(SensedItem $sensedItem, $id)
    {
        if(Auth()->user()->can('Edit Sensed Item')){
        $sneseditem = SensedItem::find($id);
        $sensors = Sensors::all();
        return view('Admin-lte.Sensors.edit_sensed_item', compact('sneseditem','sensors'));
    }
    return view('errors.401');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SensedItem  $sensedItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth()->user()->can('Edit Sensed Item')){
        $request->validate([
            'Sensor_ID'=>'required',
            'Sensor_Type_Name'=>'required',
            'Max_Value'=>'required',
            'Min_Value'=>'required',
            'Value_Measurement_Unit'=>'required',
            'Warning_Value'=>'required'
        ]);

        $senseditem = SensedItem::find($id);
        $senseditem->Sensor_Type_Name =  $request->get('Sensor_Type_Name');
        $senseditem->Sensor_ID = $request->get('Sensor_ID');
        $senseditem->Max_Value = $request->get('Max_Value');
        $senseditem->Min_Value = $request->get('Min_Value');
        $senseditem->Value_Measurement_Unit = $request->get('Value_Measurement_Unit');
        $senseditem->Warning_Value = $request->get('Warning_Value');
        $senseditem->save();
        Alert::success('Success', 'Sensed Item updated!');

        return redirect('/admin/senseditem');
    }
    return view('errors.401');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SensedItem  $sensedItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth()->user()->can('Delete Sensed Item')){
        $senseditem = SensedItem::findOrFail($id);
        $senseditem->delete();
        Alert::success('Success', 'Sensed Item deleted!');

        return redirect()->back();
    }
    return view('errors.401');
    }
}
