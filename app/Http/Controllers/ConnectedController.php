<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ConnectedController extends BaseController {
    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function params() {
        return view('connected.params');
    }
    
    
    public function stats() {
        return view('connected.stats');
    }
    
}