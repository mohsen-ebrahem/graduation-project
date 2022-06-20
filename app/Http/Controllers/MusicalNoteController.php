<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MusicalNote;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MusicalNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicalNotes=MusicalNote::all();
        return $musicalNotes;
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

        if(!(Auth::check() && Auth::user()->hasRole(['admin','teacher']))){
            return response(['message'=>'You need to log in as admin or teacher'],Response::HTTP_NOT_FOUND);
        }

        MusicalNote::create([
            'name'=>$request->name,
            'noteUrl'=>$request->noteUrl,
            'description'=>$request->description,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $musicalNote=MusicalNote::findOrFail($id);
        return $musicalNote;
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
        $musicalNote=MusicalNote::findOrFail($id);
        $musicalNote->update($request->all());
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

        $musicalNote=MusicalNote::findOrFail($id);
        $musicalNote->delete();
    }
}
