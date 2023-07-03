<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'name',
        'slug',
        'stripe_plan',
        'price',
        'data',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


    // on encode et on decode d'ici d'office
    protected function data(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

}
