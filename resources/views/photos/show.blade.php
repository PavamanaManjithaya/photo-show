@extends('layouts.app')
@section('content')
    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>
    <a href="/albums/{{$photo->album_id}}">Back to Gallery</a>
        <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->name}}" class="thumbnail">
        <br>
        <br>
        {!! Form::open(['action' => ['App\Http\Controllers\PhotosController@destroy',$photo->id],'method'=>'POST']) !!}
        {{Form::hidden('_method','DELETE')}}
               <br><br> {{Form::submit('Delete Photo',['class'=>'button alert'])}}
    {!! Form::close() !!}
@endsection