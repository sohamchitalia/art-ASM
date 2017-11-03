<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Ref;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client; 
$user=Auth::user();
class RefController extends Controller
{
    public function generate(Request $request)
    {
        $user=Auth::user();
        //$model = new Ref;
       // $model->username = $user->email;
       // $model->ref_id = str_random(20);
       // $model->save();
       // $request_data = Ref::orderBy('created_at','desc')->first();

        //$userid = Ref::where('username' , $user->email) ->get();
        $userid = DB::table('refs')->pluck('username')->toArray();
        $emailcheck = $user->email;
        
  //  if(!$userid)
    if(in_array($emailcheck, $userid))
    {
        Ref::where('username' , $emailcheck) 
        -> update(['ref_id' => str_random(20)]);
      //  $model->save();

    }
    else{
        $model = new Ref;

         $model->username = $user->email;
        $model->ref_id = str_random(20);
        $model->save();
        }

        $request_data = Ref::where('username', $user->email)->first();

       // $request_data = Ref::orderBy('updated_at','desc')->first();
       // $request_data = DB::table('refs')->where('username', $emailcheck)->get();
        return view('ref')->with('request_data', $request_data);
        
    }
    public function sms(Request $request)
    {
        // Get the PHP helper library from twilio.com/docs/php/install 
    require_once 'C:\Users\Ankit\Desktop\WT-Files\asm/vendor/autoload.php'; // Loads the library 
 
 
    $account_sid = 'AC3d3a7ac4dfe6cf9cf6203759bdf6bf46'; 
    $auth_token = 'ca266c4dd32da1d207f7bb5fda30564a'; 
    $client = new Client($account_sid, $auth_token); 
 
    $messages = $client->messages->create("$request->friendnumber", array( 
        'From' => "+14156349798",        
        'Body' => "Your Buyer Reference ID for ASM Art Gallery is $request->refid"
    ));
        return view('/dashboard1');
    }
    public function displayref()
    {
        $user=Auth::user();
        
    }
}

