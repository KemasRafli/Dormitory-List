<?php

namespace App\Http\Controllers;

use App\Dorm;
use App\Employee;

use App\Exports\DormExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dormitory.index');
    }

    public function list(Request $request)
    {
        if ($request->q) {
            $data = Dorm::where('name', 'like', '%'.$request->q.'%')->get();
        } else {
            $data = Dorm::get();
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
                $dormitory = null;
                return view('dormitory.form', compact('dormitory', 'action', 'id'));
                break;

            case 'edit':
                $dormitory = Dorm::find($id);
                return view('dormitory.form', compact('dormitory'));
            default:
                # code...
                break;
        }
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
        $dormitory = $request->except('student');
        $dorm = Dorm::create($dormitory);

        foreach ($request->student as $key => $value) {
            $dorm->student()->attach($value);
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
        $dormitory = $request->all();
        Dorm::where('id', $id)->update($dormitory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dormitory = Dorm::find($id);
        $dormitory->delete();

        return response()->json($dormitory);
    }

    public function excel()
	{
		return Excel::download(new DormExport, 'Dormitory.xlsx');
    }
    
    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $data = Employee::select('id', 'full_name')->where('full_name', 'LIKE', '%'.$request->q.'%')->get();
        } else {
            $data = Employee::get();
        }
        return response()->json($data);
    }
}
