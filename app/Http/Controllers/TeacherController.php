<?php

namespace App\Http\Controllers;

use App\Models\Teacher;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        try
        {
            // extract all
            extract($request->all());

            // store teacher
            $teacher = new Teacher;
            $teacher->first_name = $first_name;
            $teacher->last_name = $last_name;
            $teacher->email = $email;
            $teacher->phone = $phone;
            $teacher->save();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Teacher is successfully added!',
                'result'=>[]
            ],200);
        }
        catch(\Exception $e)
        {
            return \Response::json([
                'success'=>false,
                'message'=>$e->getMessage(),
                'result'=>[]
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            // get teacher
            $teacher = Teacher::findOrFail($id);

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Loaded result successfully!',
                'result'=>$teacher
            ],200);
        }
        catch(\Exception $e)
        {
            return \Response::json([
                'success'=>false,
                'message'=>$e->getMessage(),
                'result'=>[]
            ],500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, $id)
    {
        try
        {
            // extract all
            extract($request->all());

            // update student
            $teacher = Teacher::findOrFail($id);
            $teacher->first_name = $first_name;
            $teacher->last_name = $last_name;
            $teacher->email = $email;
            $teacher->phone = $phone;
            $teacher->save();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Teacher is successfully updated!',
                'result'=>$student
            ],200);
        }
        catch(\Exception $e)
        {
            return \Response::json([
                'success'=>false,
                'message'=>$e->getMessage(),
                'result'=>[]
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            // find and delete teacher
            Teacher::findOrFail($id)->delete();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Teacher is successfully deleted!',
                'result'=>[]
            ],200);
        }
        catch(\Exception $e)
        {
            return \Response::json([
                'success'=>false,
                'message'=>$e->getMessage(),
                'result'=>[]
            ],500);
        }
    }
}
