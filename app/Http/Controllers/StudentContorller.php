<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Call the Student model
use App\Models\Student;
class StudentContorller extends Controller
{
    //
    function index() {
        // Fetching the data from the table students
       $data = Student:: get();
    //    return $data;
    // Call the student-list view instead of the data itself
    return view('student-list', compact('data'));
    }

    // Adding a new student
    public function addStudent() {
        return view('add-student');
    }
    // Posting the data into the database
    public function saveStudent(Request $request) {
        // Form validation comes first
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);
        // To die and dump testing for the available field
        // dd($request->all());
        // Handling the data
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;

        // The assigning it to the foreach loop variable as per the add-student
        $student = new Student();
        $student->name = $name;
        $student->email = $email;
        $student->phone = $phone;
        $student->address = $address;
        $student->save();

        return redirect()->back()->with('success', 'Student added successfully');
   
    }
    // The edit function
    public function editStudent($id) {
        $data = Student::where('id', '=', $id)->first();
        return view('edit-student', compact('data'));
    }
    // To save the updates
    public function updateStudent(Request $request) {
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);
        // Handling the data
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;

        // Update query
        Student::where('id', '=', '$id')->update([
            'name' => $name,
            'email'=> $email,
            'phone' => $phone,
            'address' => $address
        ]);
        // The success message
        return redirect()->back()->with('success', 'Student details successfully updated');
    }
}
