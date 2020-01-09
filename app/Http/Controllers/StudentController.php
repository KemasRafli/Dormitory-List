<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;

use App\Student;
use App\StudentDetail;
use App\Provinces;
use App\Districts;
use App\Regencies;
use App\Villages;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($action, $id = null)
    {
        switch ($action) {
            case 'create':
                $student = null;
                return view('student.form', compact(
                    'student', 'action', 'id'
                ));
                break;

            case 'edit':
                $student = Student::find($id);
                $studentDetail = StudentDetail::where('student_id', $id)->get();
                return view('student.form', compact(
                    'student', 'studentDetail'
                ));
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
    public function store(StudentRequest $request)
    {
        $student = $request['student'];
        $student_detail = $request['student_detail'];
        try {
            Student::create($student);
            StudentDetail::create($student_detail);

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
    public function update(StudentRequest $request, $id)
    {

        $student = $request['student'];
        $studentDetail = $request['student_detail'];

        try {
            Student::where('id', $id)->update($student);
            StudentDetail::where('student_id', $id)->update($studentDetail);

            return response()->json(['success' => 'success', 200]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 500);
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
        $data = Student::find($id);
        $data->delete();
    }

    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $data = Student::select('id', 'full_name')->where('full_name', 'LIKE', '%'.$request->q.'%')->get();
        } else {
            $data = Student::get();
        }
        return response()->json($data);
    }
}
