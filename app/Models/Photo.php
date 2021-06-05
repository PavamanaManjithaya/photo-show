<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=array('album_id','description','photo','title','size');
    public function album(){
        return $this->belongsTo('App\Models\Album');
    }
}
