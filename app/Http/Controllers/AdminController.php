<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message'=>"Admin Profile Logout",
            'alert-type'=>'success'
        );

        return redirect('/login')->with($notification);
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
    //update profile
    public function updateProfile(Request $request){
        $this->accountValidationCheck($request);
        $data = User::where('id',Auth::user()->id)->first();
        $data ->name = $request->name;
        $data ->username = $request->username;
        $data ->email = $request->email;
        if($request->file('image')){
            $file = $request->file('image');
            $fileName = uniqid(). $request->file('image')->getClientOriginalName();
            // dd ($fileName);
            $file->move(public_path('upload/admin_images'),$fileName);
            $data['image']=$fileName;
        }
        $data->save();
        // dd($data->toArray());
        $notification = array(
            'message'=>"Admin Profile Updated Successfully",
            'alert-type'=>'success'
        );
        // dd($notification);
        return redirect()->route('admin#profile')->with($notification);

        // if($request->hasFile('image')){
        //     $dbImage =User::where('id',Auth::user()->id)->first();

        //     $dbImage = $dbImage->image;
        //     dd($dbImage);
        //     if($dbImage != null){
        //         Storage::delete('public/'.$dbImage);
        //     }
        //     $fileName = uniqid(). $request->file('image')->getClientOriginalName();
        //     // dd($fileName);
        //     $request->file('image')->storeAs('public', $fileName);
        //     $data['image'] = $fileName;
        //    }
        //    User::where('id',Auth::user()->id)->update($data);
        // return redirect()->route('admin#profile');
    }
    //change password
    public function changePassword(){
        return view('admin.admin_change_password');
    }
    //update password
    public function updatePassword(Request $request){
        $this->passwordValidationCheck($request);
        $hasedPassword = Auth::user()->password;
        if(Hash::check($request->password,$hasedPassword)){
           $users = User::find(Auth::id());
           $users->password = bcrypt($request->newPassword);
           $users->save();

        //    session()->flash('message','Password Updated Successfully');

        }
        $notification = array(
            'message'=>"Password Updated Successfully",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }

      //account validation check
    private function accountValidationCheck($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'username'=>'required',
            'email'=>'required',
            'image' => 'mimes:jpeg,jpg,png,webp,gif'
        ])->Validate();
     }

     private function passwordValidationCheck($request){
        Validator::make($request->all(),[
            'password'=>'required',
            'newPassword'=>'required',
            'confirmPassword'=>'required|same:newPassword',

        ])->Validate();
     }

}
// return redirect()->route('admin#details')->with(['updateSuccess'=>'Admin account updated']);
