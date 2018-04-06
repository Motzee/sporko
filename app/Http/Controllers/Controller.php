<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Exercise ;
use App\Img ;
use DB ;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index() {
        return view('pages.index');
    }
    
    public function daily() {
        $exos = Exercise::all();
        $exercices = [] ;
        $exercices['beginner'] = [] ;
        $exercices['medium'] = [] ;
        $exercices['pro'] = [] ;
        
        foreach ($exos as $exo) {
            $exercices["beginner"][] = [
                "name" => $exo->name,
                "description" => $exo->description
            ] ;
        }
        
        return view('pages.daily', [
            'exercices' => $exercices
        ]);
    }
    
    public function signup() {
        return view('pages.signup');
    }
    
    public function credits() {
        return view('pages.credits');
    }
    
    public function legalinfos() {
        return view('pages.legalinfos');
    }
}
