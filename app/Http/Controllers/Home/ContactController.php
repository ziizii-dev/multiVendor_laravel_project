<?php

namespace App\Http\Controllers\Home;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //contact page
    public function contactMe(){
        return view('frontend.contact');

    }//End Method
    public function storeMessage(Request $request){
        $this->contactValidationCheck($request);
        Contact::insert([
          "name"=>$request->name,
          "email"=>$request->email,
          "subject"=>$request->subject,
          "phone"=>$request->phone,
          "message"=>$request->message,
          "created_at"=>Carbon::now()

        ]);
        $notification = array(
            'message'=>"Message Submitted  Successfully",
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);

    }//End Method
    //Contact message admin
    public function contactMessage(){

        $contacts = Contact::where('status',1)->latest()->get();
        return view('admin.contact.allcontact',compact('contacts'));
    }//End

    //Contact delete admin
    public function deleteMessage($id){
        $contacts = Contact::findOrFail($id);
        // dd($blogs->toArray());
        $image = $contacts->blog_image;
      if(isset($contacts)){
         $contacts->status =0;
         $notification = array(
             'message'=>"Contact Message Deleted Successfully",
             'alert-type'=>'success'
         );
         if($contacts->save()){
             // MultiImage::findOrFail($id)->delete();
             return redirect()->back()->with($notification);
         }
      }
    }//End

    //Contact Validation check
    private function contactValidationCheck($request){
        Validator::make($request->all(),[
         "name"=>"required",
         "email"=>"required",
         "subject"=>"required",
         "phone"=>"required",
         "message"=>"required",

        ])->Validate();
    }
}
