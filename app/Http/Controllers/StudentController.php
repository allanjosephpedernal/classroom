<?php

namespace App\Http\Controllers;

use App\Models\Student;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        try
        {
            // extract all
            extract($request->all());

            // store student
            $student = new Student;
            $student->first_name = $first_name;
            $student->last_name = $last_name;
            $student->email = $email;
            $student->phone = $phone;
            $student->save();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Student is successfully added!',
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
            // get student
            $student = Student::findOrFail($id);

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Loaded result successfully!',
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        try
        {
            // extract all
            extract($request->all());

            // update student
            $student = Student::findOrFail($id);
            $student->first_name = $first_name;
            $student->last_name = $last_name;
            $student->email = $email;
            $student->phone = $phone;
            $student->save();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Student is successfully updated!',
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
            // find and delete student
            Student::findOrFail($id)->delete();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Student is successfully deleted!',
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
