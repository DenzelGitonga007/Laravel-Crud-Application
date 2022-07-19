@extends('layouts')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- To display the data -->
                <h2>Edit student</h2>
                 <!-- The edit student success message -->
                 @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <!-- Call the success message from the StudentContorller updateStudent function -->
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="{{url('update-student')}}" method="post">
                    @csrf
                    <!-- The id input -->
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="col-md-6">
                        <!-- Name -->
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter name" value="{{$data->name}}">
                        <!-- Ifn error in the name input -->
                        @error('name')
                        <!-- Alert -->
                            <div class="alert alert-danger" role="alert">
                                <!-- Print the default error message -->
                                {{$message}}
                            </div>
                        @enderror
                        <!-- Phone -->
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" name="phone" pattern="[0-9]{10}" placeholder="07xx-xxx-xxx" value="{{$data->phone}}">
                        <!-- If there's an error in the phone input -->
                        @error('phone')
                            <div class="alert alert-danger" role="alert">
                                $message
                            </div>
                        @enderror
                        <!-- Email -->
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{$data->email}}">
                        <!-- If there's an error in the email input -->
                        @error('email')
                            <div class="alert alert-danger">
                                $message
                            </div>
                        @enderror
                        <!-- Address -->
                        <label for="address">Address</label>
                        <textarea name="address" id="" cols="30" rows="10" class="form-control">{{$data->address}}</textarea>
                        <!-- If there's an error in the textarea -->
                        @error('address')
                            <div class="alert alert-danger">
                                $message
                            </div>
                        @enderror
                        <br>
                        <!-- The back button -->
                        <a href="{{url('student-list')}}" class="btn btn-secondary">Back</a>
                        <!-- Canceling the updates -->
                        <a href="{{url('student-list')}}" class="btn btn-warning">Cancel updates</a>
                        <!-- Saving the updates -->
                        <button class="btn btn-success">Save updates</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection