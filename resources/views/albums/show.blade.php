@extends('layouts.app')
@section('content')
    <h1>{{$album->name}}</h1>
     <a href="/" class="button secondary">Go BAck</a>  
     <a href="/photos/create/{{$album->id}}" class="button">Upload photos to album</a> 
     
 @if (count($album->photos)>0)
 <?php
     $colcount=count($album->photos);
     $i=1;
?>
  <div id="albums">
      <div class="row text-center end">
        @foreach ($album->photos as $photo)
         @if ($i==$colcount)
          <div class="columns medium-4">
              <a href="/photos/{{$photo->id}}">
              <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->name}}" class="thumbnail">
              </a>
              <h4>{{$photo->title}}</h4>
              </div>
         @else
         <div class="columns medium-4">
            <a href="/photos/{{$photo->id}}">
            <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->name}}" class="thumbnail">
            </a>
            <h4>{{$photo->title}}</h4>
         @endif
         @if ($i%3==0)
        </div></div><div class="row text-center end">
        @else
        </div>
         @endif
        <?php $i++ ?> 
    @endforeach
         </div>
  </div>
 @else
    <p>No Albums to Display</p> 
 @endif
@endsection
