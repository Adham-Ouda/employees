@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Employee</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ url('/add') }}">Add employee</a>
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                    <div id="imaginary_container"> 
                        <form method="get" action="/search">
                            <div class="input-group stylish-input-group">
                                <input type="text" class="form-control"  name="search" placeholder="Search (first name, last name, job)" >
                                <span class="input-group-addon">
                                <button type="submit">
                                Search
                                </button>
                                 <!-- <a href="{{url('/search')}}">Search</a>   -->
                                </span>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
                    <table class="table table-striped">
                    <thead>
                    <tr>
                     <!--<th>ID</th>-->
                     <th>First name</th>
                     <th>last name</th>
                     <th>image</th>
                     <th>Job</th>
                     <th>Status</th>


                     <th colspan="2">Action</th>
                     </tr>
                     </thead>

                    @foreach($employees as $em)

                    <tr>
                        <!--<td>  {{$em->user_id}} </td>-->
                        <td>  {{$em->first_name}} </td>
                        <td>  {{$em->last_name}} </td>
                        <td><img src="{{url('images/'.$em->image)}}" width="50" height="50"> </td>
                        <td>  {{$em->job}} </td>
                        @if ($em->status=1)
                        <td>  {{'active'}} </td>
                        @else
                        <td>  {{'not active'}} </td>
                        @endif
                        <td>
                        <a class='btn btn-danger' 
                        href="{{ url('/delete/'.$em->id) }}" > Delete </a>    
                        </td>
                        <td>
                        <a class='btn btn-primary' href="{{ url('/edit/'.$em->id)}}" > Edit </a>    
                        </td>

                    </tr>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
