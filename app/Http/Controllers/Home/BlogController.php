<?php

namespace App\Http\Controllers\Home;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    //
    public function allBlog(){
        $blogs = Blog::where('status',1)->latest()->get();
        //  return $blogs;
        return view('admin.blogs.blog_all',compact('blogs'));
    }//End Method
    public function addBlog(){
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blog_add',compact('categories'));
    }//End Method

    //Store Blog Category
    public function storeBlog(Request $request){
        $this->blogValidationCheck($request);

        $file = $request->file('blog_image');
        $fileName = uniqid(). $request->file('blog_image')->getClientOriginalName();
        // dd ($fileName);
        $file->move(public_path('upload/blog'),$fileName);
        // $data['portfolio_image']=$fileName;
        Blog::insert([
            "blog_category_id"=>$request->blog_category_id,
            "blog_title"=>$request->blog_title,
            "blog_tags"=>$request->blog_tags,
            "blog_description"=>$request->blog_description,
            "blog_image" => $fileName,
            'created_at'=>Carbon::now()
        ]);

    $notification = array(
        'message'=>"Blog Inserted Successfully",
        'alert-type'=>'success'
    );
    return redirect()->route("all#blog")->with($notification);
    }//End Method

     //Edit Blog
     public function editBlog($id){
               $blogs = Blog::findOrFail($id);
               $categories = BlogCategory::orderBy('blog_category','ASC')->get();
               return view('admin.blogs.blog_edit',compact('blogs','categories'));
     }//End Method

     //Update Blog
     public function updateBlog(Request $request){
        $this->blogValidationCheck($request);
            $blog_id = $request->id;
        if($request->file('blog_image')){
            $image = $request->file('blog_image');
            //  return $image;
            $name_gen = hexdec(uniqid()).''.$image->getClientOriginalName();
            // dd($name_gen);
            $image->move(public_path('upload/blog'),$name_gen);

            Blog::findOrFail($blog_id)->update([
                "blog_category_id"=>$request->blog_category_id,
                "blog_title"=>$request->blog_title,
                "blog_tags"=>$request->blog_tags,
                "blog_description"=>$request->blog_description,
                "blog_image" => $name_gen,
                'created_at'=>Carbon::now()

            ]);
            }

            $notification = array(
                'message'=>"Blog  Updated Successfully",
                'alert-type'=>'success'
            );
            // dd($notification);
            return redirect()->route("all#blog")->with($notification);
     } //End Method

     //Delete Blog
     public function deleteBlog($id){
        $blogs = Blog::findOrFail($id);
        // dd($blogs->toArray());
        $image = $blogs->blog_image;
      if(isset($blogs)){
         $blogs->status =0;
         $notification = array(
             'message'=>"Blog Image Deleted Successfully",
             'alert-type'=>'success'
         );
         if($blogs->save()){
             // MultiImage::findOrFail($id)->delete();
             return redirect()->back()->with($notification);
         }
      }
}//End Method
    //Valodation of StoreBlog
    private function blogValidationCheck($request){
        Validator::make($request->all(),[
            // 'blog_category_id'=>'required',
            'blog_title'=>'required',
            'blog_tags'=>'required',
            'blog_image' => 'mimes:jpeg,jpg,png,webp,gif'
        ])->Validate();
     }
}
