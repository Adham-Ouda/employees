@extends('layouts.app')

@section('content')
<div class="container">
        <form action="/update/{{$employee->id}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
{{ method_field('PUT') }}
            <div class="form-group">
                <label for="usr">First name:</label>
                <input type="text" name="first_name" class="form-control" value="{{$employee->first_name}}">
            </div>
            <div class="form-group">
                <label for="usr">Last name:</label>
                <input type="text" name="last_name" class="form-control" value="{{$employee->last_name}}">
            </div>
            <div class="form-group">
                <label for="usr">Old Image:</label>
                <img src="{{url('images/'.$employee->image)}}" width="100" height="100">
            </div>
            <div class="form-group">
                <label for="usr">New Image:</label>
                <span class="btn btn-default btn-file"><input type="file" name="image" class="form-control"></span>
            </div>
            <div class="form-group">
                <label for="usr">Job:</label>
                <textarea rows="4" cols="50"  name="job" class="form-control" >{{$employee->job}}
          </textarea>

            </div>
            <div class="form-group">
            <label for="usr">Status:</label>
            @if ($employee->status=1)
                        <input type="radio" name="status" value="0">not active
            <input type="radio" name="status" value="1" checked>active 
                        @else
                        <input type="radio" name="status" value="0" checked>not active
            <input type="radio" name="status" value="1">active 
                        @endif
            
            </div>

            </br>
            <input type="submit" value="update" class="btn btn-primary"/>
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