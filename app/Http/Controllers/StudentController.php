<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    

    // public function savestudent(){


    // }

    public function getallstudent(){
        // $student = Student::all();

        $student = Student::paginate(2);
        // print_r($student);
        // var_dump($student);
        // dd($student);
        // return view("students.getallstudent",["allstudents"=> $student]);
        return view("students.getallstudent",compact("student"));
       
    }

    public function savestudent (){
        return view("students.savestudent");
    }

    
    public function savestudenttothedb(Request $request){ 

        //add validations
        $request->validate([
            "name"=> "required",
            "phone"=> "required|unique:students,phone",
            "email"=> "required|email",
        ] ,[
            "name.required"=> "Student name field is required",
            "email.required"=> "please enter emaill",
            "email.email"=> "please enter valid email",
        ]);


        $student = new Student();

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->save();

        return redirect("getallstudent")->with(['msg'=>'new student has been add']);
        

    }

    public function editstudent($id){
        $student = Student::find($id);
        return view("students.editstudent",compact("student"));

    }

    public function editstudentsavedb(Request $request, $id){

        $request->validate([
            "name"=> "required",
            "phone"=> "required|unique:students,phone," . $id,
            "email"=> "required|email",
        ] ,[
            "name.required"=> "Student name field is required",
            "email.required"=> "please enter emaill",
            "email.email"=> "please enter valid email",
        ]);

        $student = Student::find($id);

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->save();

        return redirect("getallstudent");
    }

    public function deletestudent($id){
        Student::find($id)->delete();

        return redirect("getallstudent")->with(["msg"=> "Student deleted sucessfully"]);

     }

     public function view($id){
        $student = Student::find($id);
        return view("students.view",compact("student"));
     }
}
