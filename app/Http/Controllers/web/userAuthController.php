<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; 

class userAuthController extends Controller
{
    public function index()
    {
    return view('web.login');
    }
    
    public function register(){
    return view('web.register');
    }
    
    //  public function dashboard(){
    // return view('web.register');
    // }
    
    public function loginCheck(Request $request){
    $credentials = $request->only('email','password');

    if(Auth::attempt($credentials)) {
    $userData= DB::table('users')->where('email',$request->email)->first(); // get user data
    Session::put('userPanelLogin', $userData);
    
    return redirect()->route('web.test');
    
    }
    else{

    // If authentication fails, redirect back with a general error message
    return redirect()->back()->with('error', 'Invalid credentials.');
    }
    }
    
     public function register_create(Request $request)
    {
    try {
        $request->validate([
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $result = DB::table('users')->insert([
            'user_name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'dep_id' => 2, 
            ]);
            
        if($result){
          return redirect()->back()->with('success', 'User Registerd Succcess.');
        }
        else{
          return redirect()->back()->with('error', 'Something Went Wrong.'); 
        }    
    
    
        } catch (ValidationException $e) {
            // Validation failed, redirect back with errors and old input
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
    
    
}
