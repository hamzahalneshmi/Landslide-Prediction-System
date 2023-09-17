<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;
use Alert;
class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->can('Show Newsletter')){

            $newsletters = Newsletter::paginate(10);
            return view('Admin-lte.newsletter.newsletter',compact('newsletters'));
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
            $request->validate([
                'Email'=>'required',
            ]);
    
            $newsletter = new Newsletter([
                'Email' => $request->get('Email'),
                ]);
            $newsletter->save();
            Alert::success('Success', 'Email saved!');
            return redirect()->back();
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth()->user()->can('Delete Newsletter')){
            $newsletter = Newsletter::findOrFail($id);
            $newsletter->delete();
            Alert::success('Success', 'Email has been deleted');

            return redirect()->back(); 
        }
        return view('errors.401');
    }
}
