<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = '/images/';

    protected $fillable = [
        'file'
    ];

    //naming convention and automatically includes full path when using class
    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }

}
