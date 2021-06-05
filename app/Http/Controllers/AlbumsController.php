<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumsController extends Controller
{
    public function index(){
        $albums=Album::with('Photos')->get();
        return view('albums.index')->with('albums',$albums);
    }
    public function create(){
        return view('albums.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'cover_image'=>'image||max:1999'
        ]);
        //GET THE FILENAME WITH EXTENSION
        $filenameWithExt= $request->file('cover_image')->getClientOriginalName();
        //GET THE FILENAME
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        $extension=pathinfo($filenameWithExt,PATHINFO_EXTENSION);
        $filenameStore=$filename.'_'.time().'.'.$extension;
       
        //Upload
        $path=$request->file('cover_image')->storeAs('public/album_covers',$filenameStore);
        
        //create album
        $album=new Album;
        $album->name=$request->input('name');
        $album->description=$request->input('description');
        $album->cover_image=$filenameStore;
        $album->save();
        
        return redirect('/albums')->with('success','Album Created');

    }
    public function show($id){
        $album=Album::with('Photos')->find($id);
        return view('albums.show')->with('album',$album);


    }
}
