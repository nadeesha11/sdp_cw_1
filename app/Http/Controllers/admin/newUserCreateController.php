<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;

class newUserCreateController extends Controller
{
    public function dashboard(){
    
    $complains = DB::table('complain')->where('ASSIGN_NAME',null)->get();
    $data = DB::table('users')->whereIn('dep_id', [101, 102])->get();

      return view('admin.admin_dashboard',compact('data','complains'));
    }
    
    public function create(Request $request)
    {
        try {
            DB::table('users')->insert([
                'user_name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'dep_id' => $request->department,
            ]);
    
                   return redirect()->back()->with('success', 'record created.');
        } catch (\Exception $e) {
                   return $e->getMessage();
                   return redirect()->back()->with('error', 'something went wrong.');
        }
    }


}
