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
            
            return view('page.exercice', [
                "exercice" => $exo
            ]);
        } else {
            /*
            Très mauvaise perf :
            $exos = Exercise::all();
            */

            /*
            Deux requêtes :
            $exos = Exercise::with('img')->get();
            */

            /*
            Une seule (mais vérifier dans quel sens on fait cette requête ? Puis bon, tous les champs sont des attributs, sans organisation. Puis à cause des * on a des doublons) :
            */
            $exos = DB::table('imgs')
                ->join('exercises', 'imgs.id', '=', 'exercises.id_img')
                ->select('exercises.name AS nameexo', 'imgs.name AS nameimg', 'exercises.id AS idexo', 'exercises.*', 'imgs.*')
                ->get() ;

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
