<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mobileApiController extends Controller
{
    public function test(){
        
         $test = DB::table('department')->get();
    
         return response()->json($test);
        
    }
}
