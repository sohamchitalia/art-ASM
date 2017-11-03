<?php
use Illuminate\Support\Facades\Auth;
$user=Auth::user();
$painting_type = DB::table('demo_cities')->select('name')->where('state_id','=','2')->get(); 
$name = DB::table('demo_cities')->select('name')->where('state_id','=','3')->get(); 
$lentype=count($painting_type);
$lenartist=count($name);
$counter=0;
if(!isset($data['message']) || !isset($data['id']))
{
  $data=array('message'=>"Hello",'id'=>NULL);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>Paintings</title>
<!--
Snapshot Template
http://www.templatemo.com/tm-493-snapshot

Zoom Slider
https://vegas.jaysalvat.com/

Caption Hover Effects
http://tympanus.net/codrops/2013/06/18/caption-hover-effects/
-->
    <link rel="stylesheet" href="/cssgrid/bootstrap.min.css">
    <link rel="stylesheet" href="/cssgrid/animate.min.css">
    <link rel="stylesheet" href="/cssgrid/font-awesome.min.css">
    <link rel="stylesheet" href="/cssgrid/component.css">
    <link rel="stylesheet" href="/cssgrid/owl.theme.css">
    <link rel="stylesheet" href="/cssgrid/owl.carousel.css">
    <link rel="stylesheet" href="/cssgrid/vegas.min.css">
    <link rel="stylesheet" href="/cssgrid/style.css">
  <link rel="stylesheet" type="text/css" href="/cssgrid/default.css" />
    <link rel="stylesheet" type="text/css" href="/cssgrid/component1.css" />

    <!-- Google web font  -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>

  <style>
  .event-type-select{
    width:250px;
    height:40px;
    margin-bottom:20px;
  }
  body{
    background: #403A3E;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to bottom, #c4f3d9, #FFC5B5);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to bottom, #c4f3d9, #FFC5B5);
  }
  </style>
    
</head>
<body id="top" data-spy="scroll" data-offset="50" data-target=".navbar-collapse">


<!-- Preloader section -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-pulse"></div>
</div>


<!-- Navigation section  -->

  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
<header>
    @include('header')
  </header> 

  </div>


<!-- Home section -->

<section id="home">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">

      <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <h1 class="wow fadeInUp" data-wow-delay="0.6s" style=" color:#e74c3c; font-weight: bold">Featured Paintings</h1>
        <p class="wow fadeInUp" data-wow-delay="0.8s">
          <form method= "get" action="/paintings" name="f1" class="wow fadeInUp" data-wow-delay="0.8s" style="margin-bottom: 20px;"> 
          <div style="width:345px; margin:0 auto;text-align-last: center;text-align: center;font-weight: bold;" class="category_div" id="category_div">
          <select id="source" name="source" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);" class="form-control" style="width:350px" class="event-type-select" >
                    <option name="filter1" value="">--- Select Filter ---</option>
                    <option value="painting_type">Type</option>
                    <option value="name">Artist</option>
                    <input type="hidden" id="hfilter1" name="hfilter1" value="">
                    <input type="hidden" id="hfilter2" name="hfilter2" value="">
            </select>
          </div>
          <br> 
          <div style="width:345px; margin:0 auto;text-align-last: center;text-align: center;font-weight: bold;" class="sub_category_div" id="sub_category_div">
       

        <script type="text/javascript" language="JavaScript">
         
        document.write('<select name="status" id="status" style="width:350px" class="form-control event-type-select" onchange="hf2()"><option value=""></option></select>');
        </script>
          </div>
            <button class="smoothScroll btn btn-success btn-lg wow fadeInUp " data-wow-delay="1.2s" type="submit" style="background: #e74c3c">Search</button>
          <br>
        </form> 
        </p>
     
      </div>

    </div>
  </div>
</section>

<section id="about">
@include('grid')
</section>
<script type="text/javascript" language="javascript">
  var typepainting = new Array();
  <?php foreach($painting_type as $type){ ?>
    typepainting.push('{{$type->name}}');
  <?php } ?>

  var typeartist = new Array();
  <?php foreach($name as $type){ ?>
    typeartist.push('{{$type->name}}');
  <?php } ?>

</script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script language="javascript" type="text/javascript">
    function dynamicdropdown(listindex)
    {
      var typelen="<?php echo $lentype ?>";
      var artistlen="<?php echo $lenartist ?>";
        switch (listindex)
        {
        case "painting_type" :
            document.getElementById("status").options[0]=new Option("Select filter","");
            for(i=0;i<artistlen;i++){
            document.getElementById("status").options.remove(i);
        }
            for (i=0; i< typelen; i++){

            document.getElementById("status").options[i]=new Option(typepainting[i],typepainting[i]);
            
            }
            break;
        case "name" :
        for(i=0;i<typelen;i++){
         
         document.getElementById("status").options.remove(i);
       }
    for (i=0; i< artistlen; i++){

            document.getElementById("status").options[i]=new Option(typeartist[i],typeartist[i]);
            
            }
            break;
        }
         var x = document.getElementById("source").value;
    document.getElementById("hfilter1").value = x;
    //var y = document.getElementById("status").value;
    //.getElementById("hfilter2").value = y;
        return true;
    }
    function hf2(){
      var y = document.getElementById("status").value;
    document.getElementById("hfilter2").value = y;
    }
    </script>

<script src="/jsgrid/bootstrap.min.js"></script>
<script src="/jsgrid/vegas.min.js"></script>
<script src="/jsgrid/modernizr.custom.js"></script>
<script src="/jsgrid/toucheffects.js"></script>
<script src="/jsgrid/owl.carousel.min.js"></script>
<script src="/jsgrid/smoothscroll.js"></script>
<script src="/jsgrid/wow.min.js"></script>
<script src="/jsgrid/custom.js"></script>

</body>
</html>








