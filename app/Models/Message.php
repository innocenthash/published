<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function user(){

        return $this->belongsTo('App\Models\User');
        // return $this->belongsToMany(Annonce::class, 'favoris')->withTimestamps();
    }

    public function conversation(){

        return $this->belongsTo('App\Models\Conversation');
        // return $this->belongsToMany(Annonce::class, 'favoris')->withTimestamps();
    }
}
