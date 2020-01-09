<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClassRequest;
use App\Classes;
use App\Employee;



class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('classes.index');
    }

    public function list(Request $request)
    {
        if ($request->q) {
            $data = DB::table('student_classes')->select(
                'id', 
                DB::raw('concat(grade," ",local," ",major) as grade')
            )->where('grade', 'like', '%'.$request->q.'%')
            ->get();
        } else {
            $data = DB::table('student_classes')->select(
                'id', 
                DB::raw('concat(grade," ",local," ",major) as grade')
            )->get();
        }
        return response()->json(['data' => $data]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($action, $id = null)
    {
        switch ($action) {
            case 'create':
            $studentclass = null;
            return view('classes.form', compact('studentclass', 'action', 'id'));
            break;

            case 'edit':
            $studentclass = Classes::find($id);
            return view ('classes.form', compact('studentclass'));
            default:
                # code...
            break;
        }
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(ClassRequest $request)
     {
        $studentclass = $request['classes'];
        try {
            Classes::create($student);
            return response()->json(['success' => 'success', 200]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
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
        //
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
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
    public function update(ClassRequest $request, $id)
    {
       DB::beginTransaction();
       try {
        Classes::where('id', $id)->update($request->except(['_token']));
        DB::commit();
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['message' => $e->getMessage()], 500);
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
        DB::beginTransaction();
        try {
            Classes::where('id', $id)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

}

