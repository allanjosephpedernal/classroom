<?php

namespace App\Http\Controllers;

use App\Models\Subject;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        try
        {
            // extract all
            extract($request->all());

            // store subject
            $subject = new Subject;
            $subject->name = $name;
            $subject->description = $description;
            $subject->save();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Subject is successfully added!',
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
            // get subject
            $subject = Subject::findOrFail($id);

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Loaded result successfully!',
                'result'=>$subject
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
    public function update(UpdateSubjectTeacher $request, $id)
    {
        try
        {
            // extract all
            extract($request->all());

            // update subject
            $subject = Subject::findOrFail($id);
            $subject->name = $name;
            $subject->description = $description;
            $subject->save();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Subject is successfully updated!',
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
            // find and delete subject
            Subject::findOrFail($id)->delete();

            // return response
            return \Response::json([
                'success'=>true,
                'message'=>'Subject is successfully deleted!',
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
