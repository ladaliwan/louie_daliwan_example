@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Access Levels 
                <a style="float: right" href="/access-levels/create" class="btn btn-primary">Add</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($accessLevels as $accesslevel)
                        <tr>
                            <td>{{$accesslevel->description}}
                            <td>
                                <a href="/access-levels/{{$accesslevel->id}}/edit" class="btn btn-primary btn-sm mr-2">Edit</a>
                            </td>
                            <td>
                                @if($accesslevel->description != 'SuperUser')
                                    <form method="POST" action="/access-levels/{{$accesslevel->id}}">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {!! $accessLevels->links() !!}
            </div>
        </div>
    </div>

@endsection