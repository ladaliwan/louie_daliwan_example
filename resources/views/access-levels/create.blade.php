@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Add New Acess Level</div>
            <div class="card-body">
                <form method="POST" action="/access-levels">
                    @csrf
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description"  placeholder="Description" required>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection