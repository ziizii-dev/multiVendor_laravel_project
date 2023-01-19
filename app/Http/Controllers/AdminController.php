<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    //Admin profile
    public function adminProfile(){

     $data = User::where('id',Auth::user()->id)->first();
       return view('admin.adminProfile',compact('data'));
    }
    //Edit Profile
    public function editProfile(){

     $data = User::where('id',Auth::user()->id)->first();
       return view('admin.adminEditProfile',compact('data'));
    }
    // $user = User::select('password')->where('id',Auth::user()->id)->first();
    // public function logout(Request $request){
    //    $data = Auth::logout();
    //    return redirect()->route('/login');
    // }
}
// return redirect()->route('admin#details')->with(['updateSuccess'=>'Admin account updated']);
