<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB ;
use App\Exercise ;

class ExercisesController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            Très mauvaise perf (nombreuses requêtes) :
            $exos = Exercise::all();
            [..et une boucle après sur chaque pour piocher ailleurs]
            */

            /*
            Deux requêtes :
            $exos = Exercise::with('img')->get();
            */

            /*
            Une seule (mais vérifier dans quel sens on fait cette requête ? Puis bon, tous les champs sont des attributs, sans organisation) :
            */
        
        $exos = DB::table('imgs')
            ->join('exercises', 'imgs.id', '=', 'exercises.id_img')
            ->select('exercises.name AS nameexo', 'exercises.id AS idexo', 'exercises.description', 'imgs.path', 'imgs.name AS nameimg', 'imgs.ext', 'imgs.alt')
            ->get() ;

            return view('exercises.exercices', [
                "exercices" => $exos
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exercises.exercicesCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if(isset($id) && $id > 0) {
            $exo = Exercise::findOrFail($id);
            
            return view('exercises.exercice', [
                "exercice" => $exo
            ]);
        } else {
            return Redirect::route('exercises.index');            
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        /*Attention, pour utiliser cette notation raccourcie, il faut absolument utiliser le nom de l'entité au singulier comme nom de variable*/
        return view('exercises.exercicesEdit', compact(['exercise']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
