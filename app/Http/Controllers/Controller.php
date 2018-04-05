<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Exercise ;
use App\Img ;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index() {
        return view('page.index');
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
        
        return view('page.daily', [
            'exercices' => $exercices
        ]);
    }
    
    public function exercices(int $id = null) {
        if(isset($id) && $id > 0) {
            $exo = Exercise::findOrFail($id);
            $exo->setImg(Img::findOrFail($exo->id_img));
            
            return view('page.exercice', [
                "exercice" => $exo
            ]);
        } else {
            $exos = Exercise::all();
            foreach($exos as $anExo) {
                $anExo->setImg(Img::findOrFail($anExo->id_img));
            }
            
            return view('page.exercices', [
                "exercices" => $exos
            ]);
        }
    }
    
    public function signup() {
        return view('page.signup');
    }
    
    public function credits() {
        return view('page.credits');
    }
    
    public function legalinfos() {
        return view('page.legalinfos');
    }
}
