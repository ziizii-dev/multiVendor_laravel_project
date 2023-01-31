<?php

namespace App\Http\Controllers\Home;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    //Portfolio stup
       public function allPortfolio(){
        $portfolio = Portfolio::where("status",1)->get();
        return view('admin.portfolio.portfolio_all',compact('portfolio'));
       } //End Method
       public function addPortfolio(){
        return view('admin.portfolio.portfolio_add');
       }//End Method
       //store portfolio
       public function storePortfolio(Request $request){
           $this->portfolioValidationCheck($request);

            $file = $request->file('portfolio_image');
            $fileName = uniqid(). $request->file('portfolio_image')->getClientOriginalName();
            // dd ($fileName);
            $file->move(public_path('upload/portfolio'),$fileName);
            // $data['portfolio_image']=$fileName;
            Portfolio::insert([
                "portfolio_name"=>$request->portfolio_name,
                "portfolio_title"=>$request->portfolio_title,
                "portfolio_description"=>$request->portfolio_description,
                "portfolio_image" => $fileName,
                'created_at'=>Carbon::now()
            ]);

        $notification = array(
            'message'=>"Admin Portfolio Inserted Successfully",
            'alert-type'=>'success'
        );
        return redirect()->route("all#portfolio")->with($notification);

       }
       //Edit portfoliio
       public function  editPortfolio($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.portfolio_edit',compact('portfolio'));
       }//End

       //Updat Portfolio
       public function updatePortfolio(Request $request){
        $this->portfolioValidationCheck($request);
            $portfolio_id = $request->id;
        if($request->file('portfolio_image')){
            $image = $request->file('portfolio_image');
            //  return $image;
            $name_gen = hexdec(uniqid()).''.$image->getClientOriginalName();
            // dd($name_gen);
            $image->move(public_path('upload/portfolio'),$name_gen);

            Portfolio::findOrFail($portfolio_id)->update([
                "portfolio_name"=>$request->portfolio_name,
                "portfolio_title"=>$request->portfolio_title,
                "portfolio_description"=>$request->portfolio_description,
                "portfolio_image" => $name_gen,
                'created_at'=>Carbon::now()

            ]);
            }

            $notification = array(
                'message'=>"Portfolio  Updated Successfully",
                'alert-type'=>'success'
            );
            // dd($notification);
            return redirect()->route("all#portfolio")->with($notification);

    } //End Method

     //Delete portfolio
       public function deletePortfolio($id){
        $portfolio = Portfolio::findOrFail($id);
        // dd($portfolio->toArray());
        $image = $portfolio->portfolio_image;
      if(isset($portfolio)){
         $portfolio->status =0;
         $notification = array(
             'message'=>"Portfolio Image Deleted Successfully",
             'alert-type'=>'success'
         );
         if($portfolio->save()){
             // MultiImage::findOrFail($id)->delete();
             return redirect()->back()->with($notification);
         }
      }
}//End Method

       //Portfolio Details
       public function detailPortfolio($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details',compact('portfolio'));
       }//End Method

       //Valodation of portfolio
       private function portfolioValidationCheck($request){
        Validator::make($request->all(),[
            'portfolio_name'=>'required',
            'portfolio_title'=>'required',
            // 'portfolio_title'=>'required',
            'portfolio_image' => 'mimes:jpeg,jpg,png,webp,gif'
        ],[
            "portfolio_name.required"=>"Portfolio Name is required",
            "portfolio_title.required"=>"Portfolio Title is required"

        ])->Validate();
     }
}
