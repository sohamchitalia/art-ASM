<?php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
$path = storage_path();
use App\paintingform;
use Carbon\Carbon;
$paintingname = paintingform::get();
function buttonstatus($row){
    if ($row->sell_method=="Direct Sell"){
        if(!(Auth::check())||(Auth::user()->role!="buyer")||($row->sold_flag==1))
        {
            return true;
        }
        else{
            return false;
        }
    }
    else{
        $dt=new Carbon($row->start_date);
        if(!(Auth::check())||(Auth::user()->role!="buyer")||(Carbon::now()>$dt->addDays($row->auction_days))||($row->sold_flag==1))
        {
            return true;
        }
        else{
            return false;
        }
    }
}

function checksold($row){
    if($row->start_date!=NULL){
        $dt=new Carbon($row->start_date);
        if (Carbon::now()>$dt->addDays($row->auction_days)){
            $row->sold_flag=1;
            $row->save();
        }
    }
}

function textboxstatus($row){
    if ($row->sold_flag==1 || $row->start_date==NULL)
    {
        return true;
    }
    else{
        return false;
    }
}



if ((!isset($_GET["source"]) && !isset($_GET["status"]))||($_GET["source"]==""||($_GET["status"]==""))) {
    $request1_data = paintingform::get();
} 
elseif ($_GET["source"]=="painting_type") {
    $request1_data = paintingform::where('painting_type', $_GET["status"])->get();
} 
else{
    $request1_data = paintingform::where('seller_name', $_GET["status"])->get();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Paintings</title>
        <meta name="description" content="Thumbnail Grid with Expanding Preview" />
        <meta name="keywords" content="thumbnails, grid, preview, google image search, jquery, image grid, expanding, preview, portfolio" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="cssgrid/default.css" />    
        <link rel="stylesheet" type="text/css" href="cssgrid/component1.css" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="jsgrid/modernizr1.custom.js"></script>
         <script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
  <script type="text/javascript">
   (function(){
      emailjs.init("user_Pb0L4PtZNhNlyJcvK6cts");
   })();
</script>
    <script>
            function x() {
                $(".to-hide").fadeToggle();
            }        
        </script>   
    </head>
    <body style="background-color:#c4f3d9;">
        <div class="container-fluid">    
            <!-- Codrops top bar -->
            <div class="main">
                <ul id="og-grid" class="og-grid">
                    @foreach($request1_data as $row)
                    <?php checksold($row); ?>
                    <li style="padding-top:20px;margin-bottom: 40px">
                   
                        <a href="#" onclick="x()"  data-largesrc="<?php 
echo url('/download/' . $row->stored_file_name);
?>" data-title="{{$row->painting_name}}" data-description="<b>Artist:</b> {{$row->seller_name}}<br><br><b>Description:</b> {{$row->description}}<br><br><b>Type: </b>{{$row->painting_type}}<br><br><b>Price:</b> Rs.{{$row->base_price}}">
                           
                            <img src="<?php
echo url('/download/' . $row->stored_file_name);
?>" alt="img01" height="200px" width="200px" style="margin:10px;"/>

                        </a>
                        <form action="/paintings#about" method="POST" id="{{ $row->id }}">
                        {{ csrf_field() }}
                        <input class="to-hide form-control" style="width:150px; display:inline;" name="bid" type="<?php if(textboxstatus($row)) {echo "hidden";} else { echo "text";} ?>" placeholder="Current Bid: {{ $row->high_bid }}" value="">
        <input type="hidden" name="id" value="{{ $row->id }}">
        <input type="hidden" name="buyer_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="buyer_name" value="{{ Auth::user()->name }}">
         <input type="hidden" name="buyer_email" value="{{ Auth::user()->email }}">
        <button type="submit" class="to-hide btn btn-danger" name="submit" id ="{{ $row->id }}"  value="SUBMIT" onclick="swal('Submitted\n','\n',{button:false})" <?php if(buttonstatus($row)){ echo "disabled";}?>
        style="min-width:10px; height: 30px;">    
        <?php 
        if ($row->sold_flag==1){
            echo "SOLD";
        }

        if (($row->start_date==NULL && $row->sell_method=="Auction") && $row->sold_flag==0){
            echo "YET TO START";
        }

        if($row->sell_method=="Direct Sell" && $row->sold_flag==0 ){
            echo "BUY";

        }

        if ($row->sell_method=="Auction" && $row->sold_flag==0 && $row->start_date!=NULL){
            echo "BID";
        }


        
        ?>
        </button>
        </form>
        <script>
         function sendbuymail(this){
            swal("Painting Bought");
            
            emailjs.sendForm("gmail","buytemp","this.id");

         }
        </script>
        
        <p style="font-size: 15px;font-weight: bold;color: #e74c3c" class="to-hide">
        <?php 
        if($data['id']==$row->id){
            echo $data['message'];
            } ?>
        </p>
        

    
                    </li>
                    @endforeach
        
                </ul>
               
                <!--<p>Filler text by <a href="http://veggieipsum.com/">Veggie Ipsum</a></p>
                <a id="og-additems" href="#">add more</a>
            </div>
        </div>--><!-- /container -->
        
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="jsgrid/grid.js"></script>
        <script>
            $(function() {

                Grid.init();
                

            });
        </script>
        <script type="text/javascript">
                
        </script>

    </body>
</html>