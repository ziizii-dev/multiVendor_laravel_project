<?php

namespace App\Http\Controllers\Home;

use App\Models\HomeSlide;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
// use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    //
    public function homeSlider(){
            $homeslide = HomeSlide::find(1);
            return view('admin.home_slide.home_slide',compact('homeslide'));
    }
    // public function updateSlider(Request $request){
        // $slide_id = $request->id;
        // if($request->file('home_slide')){
        //     $image = $request->file('home_slide');
        //     $data = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // //    Image::make($image)->resize(635,852)->save('upload/home_slide/'.$data);

        //     $save_url = 'upload/home_slide/'.$data;
        //     // dd($save_url);
        //     HomeSlide::findOrFail($slide_id)->update([
        //         'title'=>$request->title,
        //         'short_title'=>$request->short_title,
        //         'video_url'=>$request->video_url,
        //         'home_slide'=>$save_url,
        //     ]);
        //     $notification = array(
        //         'message'=>"Home Slide with Image Updated Successfully",
        //         'alert-type'=>'success'
        //     );
        //     return redirect()->back()->with($notification);

        // }else{
        //     HomeSlide::findOrFail($slide_id)->update([
        //         'title'=>$request->title,
        //         'short_title'=>$request->short_title,
        //         'video_url'=>$request->video_url,
        //         // 'home_slide'=>$save_url,
        //     ]);
        //     $notification = array(
        //         'message'=>"Home Slide without Image Updated Successfully",
        //         'alert-type'=>'success'
        //     );
        //     return redirect()->back()->with($notification);

        // }

    // }
public function updateSlider(Request $request){
    $this->homeSlideValidationCheck($request);
        $data = HomeSlide::where('id',$request->id)->first();
        // dd($data->toArray());
        $data ->title = $request->title;
        $data ->short_title = $request->short_title;
        $data ->video_url = $request->video_url;
        $data ->home_slide = $request->home_slide;
        if($request->file('home_slide')){
            $file = $request->file('home_slide');
            $fileName = uniqid(). $request->file('home_slide')->getClientOriginalName();
            // dd ($fileName);
            $file->move(public_path('upload/home_slide'),$fileName);
            $data['home_slide']=$fileName;
        }
        $data->save();
        dd($data->toArray());
        $notification = array(
            'message'=>"Admin Profile Updated Successfully",
            'alert-type'=>'success'
        );
        // dd($notification);
        return redirect()->back()->with($notification);

}

    private function homeSlideValidationCheck($request){
        Validator::make($request->all(),[
            'title'=>'required',
            'short_title'=>'required',
            'video_url'=>'required',
            'home_slide' => 'mimes:jpeg,jpg,png,webp,gif'
        ])->Validate();
     }
}
