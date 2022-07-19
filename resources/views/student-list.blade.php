<!-- Call in the layouts -->
@extends('layouts')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Students List</h2>
                <!-- To display the data -->
                <table class="table">
                    <thead>
                        <tr>
                            <!-- Adding a new student -->
                            <div style="float: right; margin-right: 100px;">
                            <a href="{{url('add-student')}}">
                            <button class="btn btn-success">Add a new student</button>
                            </a>
                            </div>
                            <!-- The actual display now -->
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <!-- A link to the crud actions -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Looping through the data, to display all -->
                        @foreach ($data as $student)
                            <!-- Display in the table rows -->
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->address}}</td>
                                <!-- The CRUD button actions -->
                                <td>
                                    <!-- A link for editing the student -->
                                    <a href="{{url('edit-student/'.$student->id)}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                   
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                         <!-- End the loop    -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- End the layouts     -->
@endsection
