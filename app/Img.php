<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    /* M-to-one*/
    
    public function exercises() {
        return $this->hasMany('App\Exercise', 'id_img');
    }
}
