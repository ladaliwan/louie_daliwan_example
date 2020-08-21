@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Add New Employee</div>
            <div class="card-body">
                <form method="POST" action="/employees">
                    @csrf
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="firstName"  placeholder="First Name" required>
                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="last_name" required>
                        @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" placeholder="Age" name="age" required>
                        @error('age')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jobtitle">Job Title</label>
                        <input type="text" class="form-control" id="jobtitle" placeholder="Job Title" name="job_title" required>
                        @error('job_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="accesslevel">Select Access Level</label>
                        <select class="form-control" name="accesslevel" id="accesslevel">
                            <option value=""></option>
                            @foreach($accesslevels as $accesslevel)
                                <option value="{{$accesslevel->id}}">{{$accesslevel->description}}</option>
                            @endforeach
                        </select>

                        @error('accesslevel')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="birthdate">BirthDate</label>
                        <input type="date" class="form-control" id="birthdate" placeholder="BirthDate" name="birth_date" required>

                        @error('birth_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection