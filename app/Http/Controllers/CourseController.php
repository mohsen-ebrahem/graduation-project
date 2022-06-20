<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all()->take(6);
        return $courses;
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
        if(!(Auth::check() && Auth::user()->hasRole(['admin', 'teacher']))){
            return response(['message'=>'You need to log in as teacher or admin'],Response::HTTP_NOT_FOUND);
        }
            
        Course::create(['name'=>$request->name,'url'=>$request->url,'description'=>$request->description,'level'=>$request->level,
        'teacher_id'=>$request->teacher_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course=Course::findOrFail($id);
        return $course;
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
        /*$course=Course::findOrFail($id);
        $course->update($request->all());*/
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
            
        $lessons=Lesson::all()->where('course_id','=',$id);

        foreach($lessons as $lesson)$lesson->delete();

        $course=Course::findOrFail($id);
        $course->delete();
    }
}
