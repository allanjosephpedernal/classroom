<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('enrollment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnrollmentRequest $request)
    {
        try
        {
            // extract all
            extract($request->all());

            // store enrollment
            $enrollment = new Enrollment;
            $enrollment->classes_id = $classes_id;
            $enrollment->student_id = $student_id;
            $enrollment->save();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Enrollment is successfully added!',
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
            // get enrollment
            $enrollment = Enrollment::findOrFail($id);

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Loaded result successfully!',
                'result'=>$enrollment
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
    public function update(UpdateEnrollmentRequest $request, $id)
    {
        try
        {
            // extract all
            extract($request->all());

            // update enrollment
            $enrollment = Enrollment::findOrFail($id);
            $enrollment->classes_id = $classes_id;
            $enrollment->student_id = $student_id;
            $enrollment->save();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Enrollment is successfully updated!',
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
            // find and delete enrollment
            Enrollment::findOrFail($id)->delete();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Enrollment is successfully deleted!',
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
