<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    public function annonce(){

        return $this->belongsTo('App\Models\Annonce');
        // return $this->belongsToMany(Annonce::class, 'favoris')->withTimestamps();
    }

     public function messages(){

        return $this->hasMany('App\Models\Message');
        // return $this->belongsToMany(Annonce::class, 'favoris')->withTimestamps();
    }

    public function users(){

        return $this->belongsToMany('App\Models\User');

    }

}
