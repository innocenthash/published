<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Annonce;
use App\Models\Subscription;
use Laravel\Cashier\Billable;
use App\Models\QrCodeGenerate;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'genre',
        'statut',
        'admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function qrCodes()
{
    return $this->hasMany(QrCodeGenerate::class);
}

    public function likes(){

        return $this->belongsToMany('App\Models\Annonce');
        // return $this->belongsToMany(Annonce::class, 'favoris')->withTimestamps();
    }

    public function annonces(){

           return $this->hasMany('App\Models\Annonce');

        }

    public function commandes(){

        return $this->hasMany('App\Models\Commande');

    }
    public function messages(){

        return $this->belongsToMany('App\Models\Message');
        // return $this->belongsToMany(Annonce::class, 'favoris')->withTimestamps();
    }

    // public function conversations(){
    //     return Conversation::where(function($q){
    //          return $q->where('to',$this->id)->orWhere('from',$this->id) ;
    //     });
    // }
    // public function getConversationAttribute(){
    //     return $this->conversations()->get() ;
    // }

    public function conversations(){
        return $this->belongsToMany('App\Models\Conversation');

    }

    // public function commandes(){

    //     return $this->belongsToMany('App\Models\Commande');

    // }

    // public function favoris(){
    //     return $this->hasMany('App\Models\Favoris');
    // }

    public function subscription()
    {
        return $this->hasMany(Subscription::class, 'user_id')->latest();
        // Ou utilisez la relation appropriée selon votre implémentation
    }

}
