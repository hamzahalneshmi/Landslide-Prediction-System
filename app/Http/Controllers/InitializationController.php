<?php

namespace App\Http\Controllers;

use App\Initialization;
use App\SensedItem;
use App\Sensors;
use Illuminate\Http\Request;
use Alert;


class InitializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->can('Show Sensed Items')){
            $initializations = Initialization::paginate(5);
            $sneseditems = SensedItem::all();
            return view('Admin-lte/Sensors/Initialization/index', compact('initializations', 'sneseditems'));
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
        if(Auth()->user()->can('Add an Initialization')){
            $sensors = sensors::all();
            $sneseditems = SensedItem::all();
            return view('Admin-lte.Sensors.Initialization.create')->with('sneseditems', $sneseditems);
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
        if(Auth()->user()->can('Add an Initialization')){
            $request->validate([
                'Sensor_Type_ID'=>'required',
                'High_Risk_Top'=>'required',
                'High_Risk_Bottom'=>'required',
                'Medium_Risk_Top'=>'required',
                'Medium_Risk_Bottom'=>'required',
                'Low_Risk_Top'=>'required',
                'Low_Risk_Bottom'=>'required'
            ]);
    
            $initialization = new Initialization([
                'Sensor_Type_ID' => $request->get('Sensor_Type_ID'),
                'High_Risk_Top' => $request->get('High_Risk_Top'),
                'High_Risk_Bottom' => $request->get('High_Risk_Bottom'),
                'Medium_Risk_Top' => $request->get('Medium_Risk_Top'),
                'Medium_Risk_Bottom' => $request->get('Medium_Risk_Bottom'),
                'Low_Risk_Top' => $request->get('Low_Risk_Top'),
                'Low_Risk_Bottom' => $request->get('Low_Risk_Bottom')
                ]);
            $initialization->save();
            Alert::success('Success', 'Role saved!');
    
            return redirect('/admin/initialization');
        }
        return view('errors.401');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Initialization  $initialization
     * @return \Illuminate\Http\Response
     */
    public function show(Initialization $initialization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Initialization  $initialization
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth()->user()->can('Edit an Initialization')){
            $initialization = Initialization::find($id);
            $sneseditems = SensedItem::all();
            return view('Admin-lte.Sensors.Initialization.edit', compact('initialization','sneseditems'));
        }
        return view('errors.401');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Initialization  $initialization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth()->user()->can('Edit an Initialization')){
            $request->validate([
                'Sensor_Type_ID'=>'required',
                'High_Risk_Top'=>'required',
                'High_Risk_Bottom'=>'required',
                'Medium_Risk_Top'=>'required',
                'Medium_Risk_Bottom'=>'required',
                'Low_Risk_Top'=>'required',
                'Low_Risk_Bottom'=>'required'
            ]);
    
            $initialization = Initialization::find($id);
            $initialization->Sensor_Type_ID =  $request->get('Sensor_Type_ID');
            $initialization->High_Risk_Top =  $request->get('High_Risk_Top');
            $initialization->High_Risk_Bottom =  $request->get('High_Risk_Bottom');
            $initialization->Medium_Risk_Top =  $request->get('Medium_Risk_Top');
            $initialization->Medium_Risk_Bottom =  $request->get('Medium_Risk_Bottom');
            $initialization->Low_Risk_Top =  $request->get('Low_Risk_Top');
            $initialization->Low_Risk_Bottom =  $request->get('Low_Risk_Bottom');

            $initialization->save();
            Alert::success('Success', 'Role updated!');
    
            return redirect('/admin/initialization');
        }
        return view('errors.401');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Initialization  $initialization
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth()->user()->can('Delete an Initialization')){
            $initialization = Initialization::findOrFail($id);
            $initialization->delete();
            Alert::success('Success', 'Role deleted!');
    
            return redirect()->back();
        }
        return view('errors.401');
    }
}
