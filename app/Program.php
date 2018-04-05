<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'id_user', 'is_enabled', 'id_img'];
    //déterminent quels champs peuvent être reçus (voir https://laravel.com/docs/master/eloquent#mass-assignment)
    
    protected $guarded = ['_token'];
}
