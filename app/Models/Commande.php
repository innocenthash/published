<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    public function user(){

        return $this->belongsTo('App\Models\User');
        // return $this->belongsToMany(Annonce::class, 'favoris')->withTimestamps();
    }

    public function annonce(){

        return $this->belongsTo('App\Models\Annonce');
        // return $this->belongsToMany(Annonce::class, 'favoris')->withTimestamps();
    }

    public function question(){

        return $this->hasOne('App\Models\Question');

    }


}
