@extends('layouts.app')

@section('content')
<div class="container">
        <form action="store" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="usr">First name:</label>
                <input type="text" name="first_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="usr">Last name:</label>
                <input type="text" name="last_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="usr">Image:</label>
                <span class="btn btn-default btn-file"><input type="file" name="image" class="form-control"></span>
            </div>
            <div class="form-group">
                <label for="usr">Job:</label>
                <textarea rows="4" cols="50"  name="job" class="form-control">
          </textarea>

            </div>
            <div class="form-group">
            <label for="usr">Status:</label>
            <input type="radio" name="status" value="0">not active
            <input type="radio" name="status" value="1">active 
            </div>

            </br>
            <input type="submit" value="add new" class="btn btn-primary"/>
        </form>
        <div>
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        @endif
        </div>
    </div>


@endsection