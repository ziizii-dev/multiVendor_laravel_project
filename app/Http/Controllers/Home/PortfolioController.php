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
        $portfolio = Portfolio::latest()->get();
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

       //Valodation of portfolio
       private function portfolioValidationCheck($request){
        Validator::make($request->all(),[
            'portfolio_name'=>'required',
            'portfolio_title'=>'required',
            'portfolio_title'=>'required',
            // 'image' => 'mimes:jpeg,jpg,png,webp,gif'
        ],[
            "portfolio_name.required"=>"Portfolio Name is required",
            "portfolio_title.required"=>"Portfolio Title is required"

        ])->Validate();
     }

}
