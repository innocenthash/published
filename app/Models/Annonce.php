<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Annonce extends Model
{
    use HasFactory;
    protected $fillable = [

        'images',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function conversations(){
        return $this->hasMany('App\Models\Conversation');
    }

    // public function commandes(){

    //     return $this->belongsToMany('App\Models\User');

    // }
    public function commandes(){

        return $this->hasMany('App\Models\Commande');

    }
    // public function favoris(){
    //     return $this->hasMany('App\Models\Favoris');
    // }

    public function likes(){
        // return $this->belongsToMany(User::class, 'favoris')->withTimestamps();
        return $this->belongsToMany('App\Models\User');
    }

    public function isLiked(){
        // si l'utilisateur est connecter on recupere l'id de l'annonce qu'il a aime a l'aide de l'instance qu'on recupere l'id
        if(auth()->check()){
            $f = User::find(Auth::user()->id);

            return $f->likes->contains('id',$this->id);
        }
    }

    // on encode et on decode d'ici d'office
    protected function images(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

}
