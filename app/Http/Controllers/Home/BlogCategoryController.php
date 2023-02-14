<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Validator;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    //
    public function allBlogCategory(){
             $blogcategory = BlogCategory::where("status",1)->get();
             return view('admin.blog_category.blog_category_all',compact('blogcategory'));
    }//End Method
    public function addBlogCategory(){
        return view('admin.blog_category.blog_category_add');

    }//End Method
    //store blog category
    public function storeBlogCategory(Request $request){
        $this->blogValidationCheck($request);
        BlogCategory::insert([
            "blog_category"=>$request->blog_category,
        ]);
        $notification = array(
            'message'=>"Blog Category Insert Successfully",
            'alert-type'=>'success'
        );
        return redirect()->route("all#blogCategory")->with($notification);
    }
    // Edit Blog Category
    public function editBlogCategory($id){
             $blogcategory = BlogCategory::findOrFail($id);
            //  dd($blogcategory->toArray());
             return view ('admin.blog_category.blog_category_edit',compact('blogcategory'));
    }//End Method

    //update blog category
     public function updateBlogCategory(Request $request){
        //return $request->id;
         BlogCategory::where('id',$request->id)->update([
            "blog_category"=>$request->blog_category,
         ]);
        //dd($d);
         $notification = array(
             'message'=>"Blog Category Updated Successfully",
            'alert-type'=>'success'
         );
         return redirect()->route("all#blogCategory")->with($notification);
    }//End Method
    //Delect Category Blog
    public function deleteBlogCategory($id){
             $blogcategory = BlogCategory::find($id);
           
            if(isset($blogcategory)){
                $blogcategory->status=0;
                $notification = array(
                    'message'=>"Portfolio Image Delted Successfully",
                    'alert-type'=>'success'
                );
                if($blogcategory->save()){
                    return redirect()->back()->with($notification);
                }

            }
    }
    //Validation check
    private function blogValidationCheck($request){
        Validator::make($request->all(),[
            'blog_category'=>'required',
        ])->Validate();
    }
}
