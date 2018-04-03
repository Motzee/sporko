<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Exercice ;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index() {
        return view('page.index');
    }
    
    public function daily() {
        $exos = Exercice::all();
        $exercices = [] ;
        
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
    
    public function programs() {
        return view('page.programs');
    }
    
    public function exercices(int $id = null) {
        if(isset($id) && $id > 0) {
            $exo = Exercice::findOrFail($id);
            
            return view('page.exercice', [
                "exercice" => $exo
            ]);
        } else {
            $exos = Exercice::all();
            
            return view('page.exercices', [
                "exercices" => $exos
            ]);
        }
    }
    
    public function login() {
        return view('page.login');
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
