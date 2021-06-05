@extends('layouts.app')

@section('content')

<h3>Create Album</h3>

<div>
    {!! Form::open(['action' => 'App\Http\Controllers\PhotosController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <br><br>{{Form::text('title','',['placeholder'=>'Photo Title'])}}
        <br><br>{{Form::textarea('description','',['placeholder'=>'Description'])}}}
        {{Form::hidden('album_id', $album_id)}}
            <br><br>{{Form::file('photo')}}
               <br><br> {{Form::submit('Submit')}}
    {!! Form::close() !!} 
</div>
    
@endsection