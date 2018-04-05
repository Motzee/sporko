<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Img ;

class Exercise extends Model
{
    protected $img ;
    
    public function setImg(Img $img) {
        $this->img = $img ;
    }
    
    public function getImg() {
        return $this->img ;
    }
}
