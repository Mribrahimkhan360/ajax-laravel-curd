<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Faker\Core\File;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\File;


use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['students'] = Student::all();
        return view('students.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
           'name'=> 'required',
            'email' => 'required|unique:students,email',
            'photo' => 'required|mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else{
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;

            if ($request->file('photo'))
            {
                $file = $request->file('photo');
                $extention = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extention;
                $file->move('uploads/student_img/',$fileName);
            }
            $student->photo = $fileName;
            $student->save();

            return  response()->json([
                'status' => 200,
                'message' => 'Student Successfully Created'
            ]);
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
        $data['student'] = Student::find($id);
        return view('students.edit',$data);
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
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'photo' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $student = Student::find($id);
            $student->name = $request->name;
            $student->email = $request->email;

            if($request->hasFile('photo'))
            {
                $file = $request->file('photo');
                $extention = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extention;
                $file->move('uploads/student_img/',$fileName);
            }
            $student->photo = $fileName;
            $student->save();

            return response()->json([
                'status' => 200,
                'message' => 'Student Successfully Updated'
            ]);
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
        //
    }
}
