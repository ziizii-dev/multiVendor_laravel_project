<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Image;

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

    // home about
             public function homeAbout(){
                $aboutpage = About::find(1);
                    return view('frontend.about_page',compact('aboutpage'));
             } //End Method
     // Multi image page
     public function aboutMultiImage(){
            return view('admin.about_page.multimage');
     }//End Method
      // Store multi image
    //   public function storeMultiImage(Request $request){
    //             //   $this->imageValidation($request);
    //             //   $image = MultiImage::where('id',$request->id)->first();
    //             //   dd($image);
    //               $image = $request->file('multi_image');
    //               return $image;

    //               foreach($image as $multi_image){
    //                 $fileName = uniqid(). $request->file('multi_image')->getClientOriginalName();
    //                 // dd ($fileName);
    //                $save_url =  $file->move(public_path('upload/multi'),$fileName);
    //                 $data['multi_image']=$fileName;
    //                 MultiImage::insert([
    //                     'multi_image'=>$save_url,
    //                     'created_at'=>Carbon::now()
    //                 ]);
    //             }
    //             $data->save();

    //             dd($data->toArray());

    //             $notification = array(
    //                 'message'=>"Multi Image Inserted Successfully",
    //                 'alert-type'=>'success'
    //             );
    //             // dd($notification);
    //             return redirect()->back()->with($notification);



    //   }
    public function storeMultiImage(Request $request){
        $image = $request->file('multi_image');
        foreach($image as $multi_images){
            $name_gen = hexdec(uniqid()).''.$multi_images->getClientOriginalName();
        $multi_images->move(public_path('upload/multi'),$name_gen);
                // $data['multi_images']= $name_gen;
                //  dd($name_gen);
                  // $save_url = $name_gen;
        MultiImage::insert([
            'multi_image'=> $name_gen,
           'created_at'=>Carbon::now()
        ]);
            }



        $notification = array(
                      'message'=>"Multi Image Inserted Successfully",
                      'alert-type'=>'success'
                       );
                       return redirect()->back()->with($notification);
    }

    //all multi image
    public function allMultiImage(){
         $allMultiImage = MultiImage::where("status",1)->get();
        //  dd($allMultiImage->toArray());
        //  $allMultiImage->appends(request()->all());
         return view('admin.about_page.all_multiimage',compact('allMultiImage'));
    }
    //Edit image
    public function editMultiImage($id){
       $multiImage = MultiImage::findOrFail($id);
    //    dd($multiImage->toArray());
       return view('admin.about_page.edit_multi_image',compact('multiImage'));
    } //End Method
          //update multi imagee
     public function updateMultiImage(Request $request){
            //   dd($request->toArray());
                   $multi_image_id = $request->id;
                //    dd($multi_image_id);
            if($request->file('multi_image')){
                $image = $request->file('multi_image');
                //  return $image;
                $name_gen = hexdec(uniqid()).''.$image->getClientOriginalName();
                // dd($name_gen);

                $image->move(public_path('upload/multi'),$name_gen);

                MultiImage::findOrFail($multi_image_id)->update([
                           "multi_image"=> $name_gen
                ]);

            }

            $notification = array(
                'message'=>"Multi Image Updated Successfully",
                'alert-type'=>'success'
            );
            // dd($notification);
            return redirect()->route("all#multiImage")->with($notification);
          }//End Method

          //delete multi image
          public function deleteMultiImage($id){
                       $data = MultiImage::findOrFail($id);
                    //    dd($data->toArray());
                       $image = $data->multi_image;
                     if(isset($data)){
                        $data->status =0;
                        $notification = array(
                            'message'=>"Multi Image Delted Successfully",
                            'alert-type'=>'success'
                        );
                        if($data->save()){
                            // MultiImage::findOrFail($id)->delete();
                            return redirect()->back()->with($notification);
                        }
                     }

                    //    dd($image);
                    // unlink($image);
                    // MultiImage::findOrFail($id)->delete();

                    // status->0;
                    // $notification = array(
                        // 'message'=>"Multi Image Delted Successfully",
                        // 'alert-type'=>'success'
                    // );
                    // dd($notification);
                    // return redirect()->back()->with($notification);
          }//End Method
    //   private function imageValidation($request){
    //     Validator::make($request->all(),[
    //         'multi_image'=>'mimes:jpeg,jpg,png,webp,gif'
    //     ])->Validate();
    //   }
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
