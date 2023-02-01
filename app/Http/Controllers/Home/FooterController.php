<?php

namespace App\Http\Controllers\Home;

use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class FooterController extends Controller
{
    //footer setup
    public function footerSetup(){
        $allfooter = Footer::find(1);
            return view('admin.footer.footer_all',compact('allfooter'));
    }

    //update footer
    public function updateFooter(Request $request){

        //  return $request->id;

            $data = Footer::where('id',$request->id)->update([
                 "number"=>$request->number,
                 "short_description"=>$request->short_description,
                 "address"=>$request->address,
                 "email"=>$request->email,
                 "facebook"=>$request->facebook,
                 "twitter"=>$request->twitter,
                 "copyright"=>$request->copyright,
            ]);
            // return $data;

            $notification = array(
                'message'=>"Footer Updated Successfully",
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
    } //End Method
    //Valodation of footer
    private function footerValidationCheck($request){
        Validator::make($request->all(),[
            // 'blog_category_id'=>'required',
            'number'=>'required',
            'short_description'=>'required',
            'address'=>'required',
            'email'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'copyright'=>'required',

        ])->Validate();
     }


}
