<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    //
    public function aboutPage(){
        $aboutpage = About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutpage'));
    }
    //updat about slide
    public function updateAbout(Request $request){
        // dd ($request->toArray());
        // $da = $this->aboutSlideValidationCheck($request);

            $data = About::where('id',$request->id)->first();
            // dd($data->toArray());

            $data ->title = $request->title;
            $data ->short_title = $request->short_title;
            $data ->short_description = $request->short_description;
            $data ->long_description = $request->long_description;
            $data ->about_image = $request->about_image;

            if($request->file('about_image')){
                $file = $request->file('about_image');
                $fileName = uniqid(). $request->file('about_image')->getClientOriginalName();
                // dd ($fileName);
                $file->move(public_path('upload/home_about'),$fileName);
                $data['about_image']=$fileName;
            }
            $data->save();

            // dd($data->toArray());

            $notification = array(
                'message'=>"About Slide Updated Successfully",
                'alert-type'=>'success'
            );
            // dd($notification);
            return redirect()->back()->with($notification);

    }

        private function aboutSlideValidationCheck($request){
            Validator::make($request->all(),[
                'title'=>'required',
                'short_title'=>'required',
                'short_description'=>'required',
                'long_description'=>'required',
                'about_image' => 'mimes:jpeg,jpg,png,webp,gif'
            ])->Validate();
         }

}
