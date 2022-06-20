<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Instrument;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instruments=Instrument::all();
        return $instruments;
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
        $instrument=new Instrument($request->all());
        $instrument->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instrument=Instrument::findOrFail($id);
        return $instrument;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       /* $instrument=Instrument::findOrFail($id);
        $instrument->update($request->all());*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(!(Auth::check() && Auth::user()->hasRole(['admin']))){
            return response(['message'=>'You need to log in as admin'],Response::HTTP_NOT_FOUND);
        }

        $instrument=Instrument::findOrFail($id);
        $instrument->delete();
    }

    public function bookInstrument(Request $request){
        $userId=Auth::id();
        $instrument=Instrument::findOrFail($request->id);
        $instrument->update(['user_id'=>$userId,'state'=>0,'bookingDate'=>Carbon::now(),'expireDate'=>Carbon::now()->add(2,'day')]);
    }
}
