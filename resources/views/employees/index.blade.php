@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Employees
                @if(auth()->user()->accessLevel != null)
                    @if(auth()->user()->accessLevel->description == 'SuperUser')
                    <a style="float: right" href="/employees/create" class="btn btn-primary btn-sm">Add</a>
                    <a style="float: right" href="/access-levels" class="btn btn-default btn-sm">Access Levels</a>
                    @endif
                @endif
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>BirthDate</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Job Title</th>
                            <th>Access Level</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->birth_date}}</td>
                            <td>{{$employee->age}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->job_title}}</td>
                            <td>
                                @if($employee->accessLevel)
                                    {{$employee->accesslevel->description}}
                                @endif
                            </td>
                            @if(auth()->user()->accessLevel != null)
                                @if(auth()->user()->accessLevel->description == 'SuperUser')
                                <td>
                                    <a href="/employees/{{$employee->id}}/edit" class="btn btn-primary btn-sm mr-2">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="/employees/{{$employee->id}}">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                @endif
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {!! $employees->links() !!}
            </div>
        </div>
    </div>

@endsection