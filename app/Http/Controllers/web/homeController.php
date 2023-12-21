<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class homeController extends Controller
{
    public function index(){
        
        return view('web.home');
    }
    
     public function test(){
        $userData = session('userPanelLogin');
         
        $data = DB::table('complain')
        ->join('workflow', 'workflow.WF_ID', '=', 'complain.STATUS_ID')
        ->where('user_id',$userData->id)
        ->select('complain.*','workflow.WF_Name AS Name')
        ->get();
        
        return view('web.test',compact('data'));
    }
    
    public function create_complain(Request $request){
        
         $request->validate([
        'complain_name' => 'required',
        'desc' => 'required',
        'Priority' => 'required',
        'department' => 'required',
       'image' => 'required'
        ]);
        
        // Handle file upload in a try-catch block
        try {
            $mainImage = time() . rand(1, 1000) . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $mainImage);

            $userData = session('userPanelLogin');

            // Check if the user is logged in
            if ($userData) {
                $result = DB::table('complain')->insert([
                    'user_id' => $userData->id,
                    'UPDATED_DATE' => Carbon::now(),
                    'CREATED_DATE' => Carbon::now(),
                    'STATUS_ID' => 501,
                    'PRIORITY_ID' => $request->Priority,
                    'REPORT_NAME' => $userData->first_name,
                    'ASSIGN_NAME' => null,
                    'COMPALIN_DESCRIP' => $request->desc,
                    'COMPALIN_NAME' => $request->complain_name,
                    'DEP_ID' => $request->department,
                    'image' => $mainImage,
                ]);

                if ($result) {
                    return redirect()->back()->with('success', 'Record Added');
                } else {
                    return redirect()->back()->with('fail', 'Something went wrong');
                }
            } else {
                return redirect()->back()->with('not_logged', 'Please login');
            }
        } catch (\Exception $e) {
       
           return $e->getMessage();
        }
         
         
    }
    
    public function Logout(){
         Auth::logout();
        Session::flush();
        return redirect()->route('web.login');
        
    }
    
}
