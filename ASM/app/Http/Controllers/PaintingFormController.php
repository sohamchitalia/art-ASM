<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\paintingform;
use App\subcategories;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
$user=Auth::user();
use DB;
class PaintingFormController extends Controller
{
    public function uploadSubmit(Request $request)
    {   $user=Auth::user();
        $model = new paintingform;
        $model->painting_name = $request->painting_name;
        $model->painting_type = $request->painting_type;
        $model->description = $request->description;
        $model->seller_id = $user->id;
        $model->seller_name = $user->name;
        $model->sell_method = $request->sell_method;
        $model->base_price = $request->base_price;
        $model->start_date = NULL;
        $model->auction_days = NULL;
        $model->buyer_id = $user->id;
        $model->buyer_name = $user->name;
        $model->high_bid = $request->base_price;
        $model->high_bid_date = Carbon::now();
        $model->sold_flag = 0;
        
        //$tempModel->save();
        //$targetPath=dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR. $tempModel->ID;
        $filename = str_random(20) . "." . $request->file->extension();
        $request->file->storeAs('uploads', $filename);
        $model->stored_file_name = $filename;
        $model->save();
        
        $query = \DB::table("demo_cities")->where('name',$request->painting_type)->first();
        if ($query===null) {
            $query1 = \DB::table("demo_cities")->insert(
            ['state_id' => '2', 'name' => $request->painting_type]
            );
        }
        $totalname=$user->name;
        $query2 = \DB::table("demo_cities")->where('name',$totalname)->first();
        if ($query2===null) {
            $query3 = \DB::table("demo_cities")->insert(
            ['state_id' => '3', 'name' => $totalname]
            );
        }

        //dd($path); // this line when uncommented will show the generated random filename by stopping further execution abruptly
        //dump($path);  // you can use this helper as well if you don't want the processing to stop abruptly
        
        //$filename = str_random(10).$request->file->extension();
        //$targetPath = $request->file->storeAs('uploads', $tempModel->ID);
        
        return view('paintingupload');
}

    public function downloader($file_param)
    {
        return response()->download(storage_path('app/uploads/'.$file_param));
    }
    
    
    public function filter(Request $request){
        $filter=$request['hfilter1'];
        $tag=$request['hfilter2'];

        if ($filter=='Type'||$filter==2){ 
        $paintingname = DB::table('paintingform')->select('painting_name','stored_file_name','seller_id')->where('type','=','$tag')->get();
        return view('grid')->with('paintingname',$paintingname);
        }

        if ($filter=='Artist'||$filter==3){ 
        $paintingname = DB::table('paintingform')->select('painting_name','stored_file_name','seller_id')->where('seller_name','=','$tag')->get();
        return view('grid')->with('paintingname',$paintingname);
        }


    }

    public function bidupdate(Request $request)
    {
        $painting=\App\paintingform::find($request['id']);
          
            if ($painting->sell_method=="Direct Sell"){
                    $painting->buyer_id=$request->buyer_id;
                    $painting->buyer_name=$request->buyer_name;
                    $painting->sold_flag=1;
                    $painting->save();
                    $data=['message' => 'Check Dashboard For Details',
                                 'id' => $painting->id];
                    return view('paintinggrid')->with('data',$data);
            }

            if ($painting->sell_method=="Auction"){
                if ($request->bid>$painting->high_bid){
                    $painting->buyer_id=$request->buyer_id;
                    $painting->buyer_name=$request->buyer_name;
                    $painting->high_bid=$request->bid;
                    $painting->high_bid_date= Carbon::now();
                    $painting->save();
                 //   $message="Bid Successfully Placed";
                    $data=['message' => 'Bid Successfully Placed',
                                 'id' => $painting->id];
                    
                    return view('paintinggrid')->with('data',$data);
                }

                else
                {
                    $data=['message' => 'Place Higher Bid',
                                 'id' => $painting->id];
                    return view('paintinggrid')->with('data',$data);

                }
            }           
        
    }
    public function startauction(Request $request)
    {
        $painting=\App\paintingform::find($request['id']);
        $painting->start_date = Carbon::now();
        $painting->auction_days = 3;
        $painting->save();
        return redirect('/dashboard');
    }
}
