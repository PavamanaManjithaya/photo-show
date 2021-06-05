<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function index(){
        $albums=Album::with('Photos')->get();
        return view('albums.index')->with('albums',$albums);
    }
    public function create($album_id){
        return view('photos.create')->with('album_id',$album_id);
    }
    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'photo'=>'image||max:1999'
        ]);
        //GET THE FILENAME WITH EXTENSION
        $filenameWithExt= $request->file('photo')->getClientOriginalName();
        //GET THE FILENAME
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        $extension=pathinfo($filenameWithExt,PATHINFO_EXTENSION);
        $filenameStore=$filename.'_'.time().'.'.$extension;
       
        //Upload
        $path=$request->file('photo')->storeAs('public/photos/'.$request->input('album_id'),$filenameStore);
        
        //create photo
        $photo=new Photo;
        $photo->album_id=$request->input('album_id');
        $photo->photo=$filenameStore;
        $photo->title=$request->input('title');
        $photo->size=$request->file('photo')->getSize();
        $photo->description=$request->input('description');
       
        
        $photo->save();
        
        return redirect('/albums/'.$request->input('album_id'))->with('success','Photo Uploaded');

    }
    public function show($id){
       $photo=Photo::find($id);
        return view('photos.show')->with('photo',$photo);


    }

    public function destroy($id){
        $photo=Photo::find($id);
        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
           $photo->delete();

           return redirect('/')->with('success','Photo Deleted');
        }
      

    } 
}

