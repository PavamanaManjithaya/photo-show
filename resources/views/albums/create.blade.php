@extends('layouts.app')

@section('content')

<h3>Create Album</h3>

<div>
    {!! Form::open(['action' => 'App\Http\Controllers\AlbumsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <br><br>{{Form::text('name','',['placeholder'=>'Album Name'])}}
        <br><br>{{Form::textarea('description','',['placeholder'=>'Description'])}}
            <br><br>{{Form::file('cover_image')}}
               <br><br> {{Form::submit('Submit')}}
    {!! Form::close() !!} 
</div>
    
@endsection