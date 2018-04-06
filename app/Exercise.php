<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Img ;

class Exercise extends Model
{
   
    
    /* N-to-M*/
    
    public function programs() {
        return $this->belongsToMany('App\Program', 'exercise_program', 'id_exercise', 'id_program');
    }

    /* one-to-M*/

    public function img() {
        return $this->belongsTo('App\Img', "id_img");
    }
}
