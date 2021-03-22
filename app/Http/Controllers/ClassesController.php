<?php

namespace App\Http\Controllers;

use App\Models\Classes;

use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('classes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassesRequest $request)
    {
        try
        {
            // extract all
            extract($request->all());

            // store classes
            $classes = new Classes;
            $classes->student_id = $student_id;
            $classes->teacher_id = $teacher_id;
            $classes->save();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Class is successfully added!',
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
            // get classes
            $classes = Classes::findOrFail($id);

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Loaded result successfully!',
                'result'=>$classes
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
    public function update(UpdateClassesRequest $request, $id)
    {
        try
        {
            // extract all
            extract($request->all());

            // update classes
            $classes = Classes::findOrFail($id);
            $classes->student_id = $student_id;
            $classes->teacher_id = $teacher_id;
            $classes->save();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Class is successfully updated!',
                'result'=>$classes
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
            // find and delete classes
            Classses::findOrFail($id)->delete();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Class is successfully deleted!',
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
