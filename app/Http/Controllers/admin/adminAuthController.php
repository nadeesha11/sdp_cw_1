<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session; // Import the Session facade


class adminAuthController extends Controller
{
    public function login(){
        
        return view('admin.login');
    }
    
    public function check(Request $request){
        
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)) {
        $userData= DB::table('users')->where('email',$request->email)->first(); // get user data
        Session::put('adminPanelLogin', $userData);
        
        if($userData->dep_id == 1){
            return redirect()->route('admin.dashboard');
        }
        else{
           return redirect()->route('admin.officerComplains');
        }
        
        }
        else{

        // If authentication fails, redirect back with a general error message
        return redirect()->back()->with('error', 'Invalid credentials.');

        }
    }
    
    public function assign_user(Request $request){

      $request->validate([
          "officer" => 'required'
          ]);  
          
      $data =  DB::table('users')->find($request->officer); 
      
      DB::table('complain')->where('COMPALIN_ID',$request->hidden)->update([
          'ASSIGN_NAME' => $data->user_name
          ]);
          
     return redirect()->back();          
      
    }
    
    public function officerComplains(){
        
        $data =  $adminPanelLoginData = session('adminPanelLogin');
        
        $myComplains = DB::table('complain')->where('ASSIGN_NAME',$data->user_name)
         ->join('workflow', 'complain.STATUS_ID', '=', 'workflow.WF_ID')
         ->join('priority', 'complain.PRIORITY_ID', '=', 'priority.PRO_ID')
         ->select('complain.*','workflow.*','priority.*')
        ->get();
        
        
        $workflow = DB::table('workflow')->get();

        return view('admin.officer_dashboard',compact('workflow','myComplains'));
        
        
    }
    
    public function chnageStatusOficer(Request $request){
       
           DB::table('complain')->where('COMPALIN_ID',$request->hidden)->update([
          'STATUS_ID' => $request->WF_Name,
          ]);
          
     return redirect()->back();  
        
    }
    
    public function LogOut(){
        
        Auth::logout();
        Session::flush();
        return redirect()->route('admin.login');
    }
    
    
    
    
    
}
