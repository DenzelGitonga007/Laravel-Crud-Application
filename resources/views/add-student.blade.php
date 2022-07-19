@extends('layouts')
@section('content')
    <div class="container" style="margin-top:20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Add new student</h2>
                <!-- The add student success message -->
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    <!-- Call the success message from the StudentController saveStudent function -->
                    {{Session::get('success')}}
                </div>
                @endif
                <form action="{{url('save-student')}}" method="POST">
                    <!-- The cross-site request forgery -->
                    @csrf
                    <div class="col-md-6">
                        <!-- Name -->
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{old('name')}}">
                        <!-- If there's an error in the name input -->
                        @error('name')
                        <!-- Alert -->
                            <div class="alert alert-danger" role="alert">
                                <!-- Print the default error message -->
                                {{$message}}
                            </div>
                        @enderror
                        <!-- Phone -->
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" placeholder="07xx-xxx-xxx" pattern="[0-9]{10}" value="{{old('phone')}}">
                        <!-- If there's an error in the phone input -->
                        @error('phone')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        <!-- Email -->
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address" value="{{old('email')}}">
                        <!-- If there's an error in the email input -->
                        @error('email')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        <!-- Address -->
                        <label for="address">Address</label>
                        <textarea name="address" id="" cols="30" rows="10" class="form-control" placeholder="Enter your address">{{old('address')}}</textarea>
                        <!-- If there's an error in the address textarea -->
                        @error('address')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                        <br>
                        <!-- The back button, to return to the student-list -->
                        <a href="{{url('student-list')}}" class="btn btn-secondary">Back</a>
                        <!-- The submit button -->
                        <button class="btn btn-success">Submit</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection