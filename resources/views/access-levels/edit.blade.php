@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Access Level</div>
            <div class="card-body">
                <form method="POST" action="/access-levels/{{$accessLevel->id}}">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" value="{{$accessLevel->description}}" name="description" id="description"  placeholder="Description" required>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection