<?php
$user=Auth::user();
use Illuminate\Support\Facades\Auth;
$path = storage_path();
use App\user;
use App\paintingform;
use Carbon\Carbon;
$paintingname = paintingform::get();
$painting_uploaded=0;
$painting_sold=0;
$painting_auction=0;
$painting_direct_sell=0;

foreach ($paintingname as $row){
    if($row->seller_id==$user->id){
        $painting_uploaded++;
    }

    if($row->seller_id==$user->id && $row->sold_flag==1){
        $painting_sold++;
    }

    if($row->seller_id==$user->id && $row->sold_flag==0 && $row->sell_method=="Auction"){
        $painting_auction++;
    }

    if($row->seller_id==$user->id && $row->sold_flag==0 && $row->sell_method=="Direct Sell"){
        $painting_direct_sell++;
    }

}




?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Paintings</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Custom CSS -->
    <!--  Style added first by ATD to load before sb-admin for gradient -->
    <style>
body{
    background: #403A3E;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to bottom, #c4f3d9, #FFC5B5);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to bottom, #c4f3d9, #FFC5B5);
  }
</style>
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--Materialize CSS file inclusion ATD-->
    <link rel="stylesheet" type="text/css" href="../cssdashboard/cardstrial.css">
 
    <!--Materialize JS file inclusion ATD-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../js/materialize.js"></script>

      <!-- Compiled and minified CSS ATD-->

  <!-- Compiled and minified JavaScript ATD-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>

  <!--Cards Icons Link-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
body{
    background: #403A3E;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to bottom, #c4f3d9, #FFC5B5);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to bottom, #c4f3d9, #FFC5B5);
  }
  #page-wrapper{
    background: #403A3E;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #c4f3d9, #FFC5B5);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #c4f3d9, #FFC5B5);
            height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
  }
  #paintings-disp{
     background: #403A3E;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #FFC5B5, #c4f3d9);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #FFC5B5, #c4f3d9);
            height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;

  }
</style>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body>

    <div id="wrapper">
<header>
    @include('header')
  </header>
        <!-- Navigation -->
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="color: dimgray">My Paintings</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary" style="background-color: #e74c3c; border-color: #e74c3c;">
                        <div class="panel-heading" style="background-color: #e74c3c; border-color: #e74c3c;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-wpforms fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $painting_uploaded }}</div>
                                    <div>Total Uploaded</div>
                                </div>
                            </div>
                        </div>
                        <a href="/paintingupload">
                            <div class="panel-footer" style="color: #e74c3c; border-color: #e74c3c;">
                                <span class="pull-left">Upload Form</span>
                                
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green" style="background-color: #e74c3c; border-color: #e74c3c;">
                        <div class="panel-heading" style="background-color: #e74c3c; border-color: #e74c3c;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $painting_sold }}</div>
                                    <div>Paintings Sold</div>
                                </div>
                            </div>
                        </div>
                        <a href="#Sold">
                            <div class="panel-footer" style="color: #e74c3c; border-color: #e74c3c;>
                                <span class="pull-left">View Details</span>
                                
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow" style="background-color: #e74c3c; border-color: #e74c3c;">
                        <div class="panel-heading" style="background-color: #e74c3c; border-color: #e74c3c;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $painting_auction }}</div>
                                    <div>Paintings In Auction</div>
                                </div>
                            </div>
                        </div>
                        <a href="#Auction">
                            <div class="panel-footer" style="color: #e74c3c; border-color: #e74c3c;">
                                <span class="pull-left">View Details</span>
                                
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red" style="background-color: #e74c3c; border-color: #e74c3c;">
                        <div class="panel-heading" style="background-color: #e74c3c; border-color: #e74c3c;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cart-arrow-down fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $painting_direct_sell }}</div>
                                    <div>Paintings in Direct Sell</div>
                                </div>
                            </div>
                        </div>
                        <a href="#DirectSell">
                            <div class="panel-footer" style="color: #e74c3c; border-color: #e74c3c;">
                                <span class="pull-left">View Details</span>
                                
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
           

<div class="row" style="" id="Sold">
                <div class="col-sm-12" style="">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #e74c3c; font-size: 18px; color:white; font-weight: 700;">
                            <i class="fa fa-bar-chart-o fa-fw" style="color:white;"></i> <b>Paintings Sold </b>
                           
                        </div>
                        <!-- /.panel-heading -->   
<?php 
$numOfCols=2;
$rowCount=0;
$bootstrapColWidth = 12/$numOfCols;
?>
<div id="paintings-disp">
  <div class="row">
<?php 
foreach ($paintingname as $row) {
?>  

    <?php 

    if ($row->seller_id==$user->id && $row->sold_flag==1){

    ?>

  <div class="card small col-md-6 col-sm-12" style="margin-left:90px;background-color: lightgray;">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="<?php
echo url('/download/' . $row->stored_file_name);
?>"/>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">{{ $row->painting_name }}<i class="material-icons right">more_vert</i></span>
     
    </div>
    <div class="card-reveal" style="background-color: lightgray;">
      <span class="card-title grey-text text-darken-4"> <b>{{ $row->painting_name }} </b><i class="material-icons right">close</i></span>
      <?php $buyer= user::find($row->buyer_id); ?>
      <hr style="border:1px solid gray; margin: 4px; width: 95%; ">
      <h5><p><span style="color:gray">Description:</span> {{ $row->description }}</p>
      <p><span style="color:gray"> Painting Type: </span>{{ $row->painting_type }} </p>
      <p><span style="color:gray"> Base Price : </span>{{ $row->base_price }} </p>
      <p><span style="color:gray"> Sold For:</span> {{ $row->high_bid }}</p>
      <p><span style="color:gray"> Buyer:</span> {{ $row->buyer_name }}</p>
      <p><span style="color:gray"> Buyer Address:</span> {{ $buyer->address }}</p>
      <p><span style="color:gray"> Buyer Contact Number:</span> {{ $buyer->phone }}</p></h5>
     

    </div>
  </div>

  <?php 
  $rowCount++;
  if($rowCount % $numOfCols == 0)
    echo '</div><div class="row">';
}
?>

    <?php } ?>
</div>
</div>
  

            
       


            
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->

<!-- Paintings Auction -->

<div class="row" style="" id="Auction">
                <div class="col-sm-12" style="">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #e74c3c; font-size: 18px; color:white;font-weight: 700">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Paintings In Auction
                           
                        </div>
                        <!-- /.panel-heading -->   
<?php 
$numOfCols=2;
$rowCount=0;
$bootstrapColWidth = 12/$numOfCols;
?>

<div class="row">
<?php 
foreach ($paintingname as $row) {
?>  

    <?php 

    if ($row->seller_id==$user->id && $row->sold_flag==0 && $row->sell_method=="Auction" && $row->start_date!=NULL){

    ?>

  <div class="card small col-md-6 col-sm-12" style="margin-left:90px;background-color: lightgray;">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="<?php
echo url('/download/' . $row->stored_file_name);
?>"/>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">{{ $row->painting_name }}<i class="material-icons right">more_vert</i></span>
      
    </div>
    <div class="card-reveal" style="background-color: lightgray;">
      <span class="card-title grey-text text-darken-4"> <b>{{ $row->painting_name }} </b><i class="material-icons right">close</i></span>
      
      <hr style="border:1px solid gray; margin: 4px; width: 95%; ">
      <h5><p><span style="color:gray">Description: </span>{{ $row->description }}</p>
      <p> <span style="color:gray">Painting Type:</span> {{ $row->painting_type }} </p>
      <p><span style="color:gray"> Base Price :</span> {{ $row->base_price }} </p>
      <p> <span style="color:gray">Sold For:</span> {{ $row->high_bid }}</p></h5>

     

    </div>
  </div>

  <?php 
  $rowCount++;
  if($rowCount % $numOfCols == 0)
    echo '</div><div class="row">';
}
?>

    <?php } ?>

</div>
  

            
       


            
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <!-- /.col-lg-4 -->
            </div>

<!-- Paintings Auction -->



<!-- Paintings Direct Buy -->


<div class="row" style="" id="DirectSell">
                <div class="col-sm-12" style="">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #e74c3c; font-size: 18px; color:white; font-weight: 700">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Paintings For Direct Sell
                           
                        </div>
                        <!-- /.panel-heading -->   
<?php 
$numOfCols=2;
$rowCount=0;
$bootstrapColWidth = 12/$numOfCols;
?>

<div class="row">
<?php 
foreach ($paintingname as $row) {
?>  

    <?php 

    if ($row->seller_id==$user->id && $row->sold_flag==0 && $row->sell_method=="Direct Sell"){

    ?>

  <div class="card small col-md-6 col-sm-12" style="margin-left:90px;background-color: lightgray;">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="<?php
echo url('/download/' . $row->stored_file_name);
?>"/>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">{{ $row->painting_name }}<i class="material-icons right">more_vert</i></span>
      
    </div>
    <div class="card-reveal" style="background-color: lightgray;">
      <span class="card-title grey-text text-darken-4"> <b>{{ $row->painting_name }} </b><i class="material-icons right">close</i></span>
      
      <hr style="border:1px solid gray; margin: 4px; width: 95%; ">
      <h5><p><span style="color:gray">Description:</span> {{ $row->description }}</p>
      <p><span style="color:gray"> Painting Type: </span>{{ $row->painting_type }} </p>
      <p> <span style="color:gray">Base Price : </span>{{ $row->base_price }} </p>
      <p> <span style="color:gray">Sold For: </span>{{ $row->high_bid }}</p></h5>
     

    </div>
  </div>


  <?php 
  $rowCount++;
  if($rowCount % $numOfCols == 0)
    echo '</div><div class="row">';
}
?>

    <?php } ?>

</div>
  

            
       


            
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <!-- /.col-lg-4 -->
            </div>
<!-- Paintings Direct Buy -->

<!-- Inactive Painting -->

<div class="row" style="">
                <div class="col-sm-12" style="">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #e74c3c; font-size: 18px; color:white;font-weight: 700">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Auction Yet To Start
                           
                        </div>
                        <!-- /.panel-heading -->   
<?php 
$numOfCols=2;
$rowCount=0;
$bootstrapColWidth = 12/$numOfCols;
?>

<div class="row">
<?php 
foreach ($paintingname as $row) {
?>  

    <?php 

    if ($row->seller_id==$user->id && $row->sold_flag==0 && $row->sell_method=="Auction" && $row->start_date==NULL){

    ?>

  <div class="card small col-md-6 col-sm-12" style="margin-left:90px;background-color: lightgray;">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="<?php
echo url('/download/' . $row->stored_file_name);
?>"/>
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">{{ $row->painting_name }}<i class="material-icons right">more_vert</i></span>
      
    </div>
    <div class="card-reveal" style="background-color: lightgray;">
      <span class="card-title grey-text text-darken-4"> <b>{{ $row->painting_name }} </b><i class="material-icons right">close</i></span>
      
      <hr style="border:1px solid gray; margin: 4px; width: 95%; ">
      <h5><p><span style="color:gray"> Description:</span> {{ $row->description }}</p>
      <p><span style="color:gray"> Painting Type:</span> {{ $row->painting_type }} </p>
      <p> <span style="color:gray">Base Price : </span>{{ $row->base_price }} </p>
      <p><span style="color:gray"> Sold For: </span>{{ $row->high_bid }}</p>
      <p> <span style="color:gray">Auction Duration :</span> {{ $row->auction_days }}</p></h5>
      <form action="/startauction" method="GET">
      {{ csrf_field() }}
      <input type="hidden" value="{{ $row->id }}" name="id">
      <button class="btn btn-danger" onclick="showal()"> Start Auction </button>
     </form>

    </div>
  </div>
  <?php 
  $rowCount++;
  if($rowCount % $numOfCols == 0)
    echo '</div><div class="row">';
}
?>

    <?php } ?>

<script>
function showal(){
  swal("Added to Auction", "Your painting has been added to auction");
}
</script>
</div>
  

            
       


            
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <!-- /.col-lg-4 -->
            </div>

<!-- Inactive Painting -->


            <!-- /.row -->



        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
