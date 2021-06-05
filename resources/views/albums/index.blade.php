@extends('layouts.app')

@section('content')
 @if (count($albums)>0)
 <?php
     $colcount=count($albums);
     $i=1;
?>
  <div>
      <div class="row text-center">
        @foreach ($albums as $album)
         @if ($i==$colcount)
          <div class="columns medium-4">
              <a href="/albums/{{$album->id}}">
              <img src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}" class="thumbnail">
              </a>
              <h4>{{$album->name}}</h4>
              </div>
         @else
         <div class="columns medium-4">
            <a href="/albums/{{$album->id}}">
            <img src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}" class="thumbnail">
            </a>
            <br>
            <h4>{{$album->name}}</h4>
         @endif
         @if ($i%3==0)
        </div></div>
         @endif
        <?php $i++ ?> 
    @endforeach
         </div>
  </div>
 @else
    <p>No Albums to Display</p> 
 @endif
@endsection


