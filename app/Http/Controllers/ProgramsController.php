<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Illuminate\Support\Facades\Auth ;
use Validator ;

use App\Program ;
use App\User ;
use App\Exercise ;
use App\Img ;

class ProgramsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //get sur /programs
    {
        $programs = Program::where('is_enabled', 1)
            ->orderBy('created_at', 'desc')
            ->get() ;
        
        return view('page.programs', [
            "programs" => $programs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //get sur /programs/create
    {
        return view('connected.programsCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //post sur /programs
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'nullable'

        ]);
                
        if ($validator->fails()) {
            return redirect('programs/create')
                ->withErrors($validator)
                ->withInput();
        }
        
        $request['id_img'] = 1 ;
        $request['id_user'] = Auth::id() ;
        $request['is_enabled'] = true ; 
        
        
        $aNewProgram = Program::create($request->all());

        $aNewProgram->save();
        
        return redirect()->route('programs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //get sur programs/{id}
    {
        $program = Program::findOrFail($id) ;
        
        if($program == null || $program->is_enabled != 1) {
            return redirect()->route('programs.index');
        } else {
            return view('page.program', [
                "aProgram" => $program
            ]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        return view('connected.programsEdit', compact(['program']));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'nullable'

        ]);
                
        if ($validator->fails()) {
            return redirect('programs/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        
        $theProgram = Program::findOrFail($id) ;

        $theProgram->name = $request['name'] ;
        $theProgram->description = $request['description'] ;

        $theProgram->save();
        
        return redirect()->route('programs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Program::destroy($id);
        
        return redirect()->route('programs.index')
            ->with('success','Program deleted successfully');
    }
}
