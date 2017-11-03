<?php
$user=Auth::user();
$user = Auth::user();
$path = storage_path();
use App\paintingform;
use Carbon\Carbon;
$paintingname = paintingform::latest()->take(6)->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type='text/javascript' src='js/jquery.particleground.js'></script>
  <script type='text/javascript' src='js/demo.js'></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Galerie d'art ASM</title>
  <style type="text/css">
    .introduc{
      background: #403A3E;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to bottom, #c4f3d9, #FFC5B5);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to bottom, #c4f3d9, #FFC5B5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      height: 700px;
      margin: auto;

    }
    .home-h1{
      color:#E74C3C;
      font-weight: bold;
      /*padding-bottom:350px;
      padding-top:350px; */
      font-size:40px;
      text-align: center;
      margin: auto;
      position: relative;
      bottom: 1145px;
      

    }
    
    @media (max-width: 767px) {
      .home-h1{
        font-size:25px;
      }
    }

    .home-p1{
      color: #212F3C;
      font-size:25px;
      text-align: center;
      font-weight: bolder;
      margin: auto;
      position: relative;
      bottom: 1135px;
      /* padding-bottom:350px; */
    }
    
   /* .home-intro-button{
      background-color: rgb(196, 243, 217);
      color: black;
      margin:auto;
      text-align:center;
      z-index: 50;

    }
    .home-intro-button:hover {
      background-color:black;
      color:white;
    } */

    

  </style>
<!--
Snapshot Template
http://www.templatemo.com/tm-493-snapshot

Zoom Slider
https://vegas.jaysalvat.com/

Caption Hover Effects
http://tympanus.net/codrops/2013/06/18/caption-hover-effects/
-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/component.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/vegas.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- Google web font  -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <!-- remember, jQuery is completely optional -->
  <!-- <script type='text/javascript' src='js/jquery-1.11.1.min.js'></script> -->
  <script type='text/javascript' src='../jquery.particleground.js'></script>
  <script type='text/javascript' src='js/demo.js'></script>
  <script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
  <script type="text/javascript">
   (function(){
      emailjs.init("user_Pb0L4PtZNhNlyJcvK6cts");
   })();
</script>
</head>
<body id="top" data-spy="scroll" data-offset="50" data-target=".navbar-collapse">


<!-- Preloader section -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-pulse"></div>
</div>


<!-- Navigation section  -->
  <header>
    @include('header')
  </header>
  
<div id="particles" class="introduc" style="max-height: 720px;">


  <!--<div id="intro">-->
    <!--<div style="padding-bottom:-200px;" class="text-center">-->
  <h1 class="home-h1">Galerie d'art ASM</h1>
    <p class="home-p1"> An online platform that connects art patrons to artists who wish to promote their artwork. </p>
  <!--  <button type="button" class="home-intro-button text-center"> Paintings </button> -->
    </div>

  </div>
</div>

<!-- About section -->

<section id="about">
  <div class="container">
    <div class="row">

      <div class="col-md-9 col-sm-8 wow fadeInUp" data-wow-delay="0.2s">
        <div class="about-thumb">
          <h1><b>ABOUT US</b></h1>
          <div style="font-weight: bolder;">
          <p>Galleria D'art ASM was established in 1997 by a group of art enthusiasts inclined on having a global platform for artists to display their talent and put their art up for sale.</p>
        </div></div>
      </div>

      <div class="col-md-3 col-sm-4 wow fadeInUp about-img" data-wow-delay="0.6s">
        <img src="WhatsApp Image 2017-10-31 at 2.49.23 PM.jpeg" class="img-responsive img-circle" alt="About">
      </div>

      <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <div class="section-title text-center">
          <h1><b>FEATURED ARTISTS</b></h1>
          <h2>These are some of the top artists who have put their paintings in the gallery as well as in auctions.</div></h2>
        </div>
      </div>

      <!-- team carousel -->
      <div id="team-carousel" class="owl-carousel">

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="team-img1.jpg" class="img-responsive img-circle" alt="Mary">
          </div>
          <h2 class="heading">Rama Shah</h2>
          <p class="description">Popular artist from the small town of Varanasi.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="team-img8.jpg" class="img-responsive img-circle" alt="Jack">
          </div>
          <h2 class="heading">Aditi Mehta</h2>
          <p class="description"> Well known for her abstract and nature paintings. </p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="team-img3.jpg" class="img-responsive img-circle" alt="Linda">
          </div>
          <h2 class="heading">Meghna Shah</h2>
          <p class="description"> Well known for her modern paintings and portraits.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="team-img2.jpg" class="img-responsive img-circle" alt="Sandy">
          </div>
          <h2 class="heading">Ankit Desai</h2>
          <p class="description">Popular for his extensive experience in oil paintings.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="team-img5.jpg" class="img-responsive img-circle" alt="Lukia">
          </div>
          <h2 class="heading">Mitali Dave</h2>
          <p class="description">Well known in India for her scenery drawings.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="team-img6.jpg" class="img-responsive img-circle" alt="George">
          </div>
          <h2 class="heading">Soham Chitalia</h2>
          <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="team-img4.jpg" class="img-responsive img-circle" alt="Day">
          </div>
          <h2 class="heading">Miloni Joshi</h2>
          <p class="description">Maecenas sed diam eget risus varius blandit sit.</p>
        </div>
      </div>

      <div class="item col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="team-img8.jpg" class="img-responsive img-circle" alt="Lynn">
          </div>
          <h2 class="heading">Anjana Sharma</h2>
          <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
        </div>
      </div>

      </div>
      <!-- end team carousel -->

    </div>
  </div>
</section>


<!-- Gallery section -->

<section id="gallery">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <div class="section-title">
          <h1><b>Gallery</b></h1>
          <h2>Some of the recently added paintings have been displayed here. </h2>
        </div>
      </div>
@foreach($paintingname as $row)
      <ul class="grid cs-style-4">
        <li class="col-md-4 col-sm-4"  >
          <figure>
            <div style="width: 300px; height: 225px">
            <img src="<?php echo url('/download/' . $row->stored_file_name); ?>" alt="image 1" width="100%" height="100%" >
</div>
            <figcaption>
              <h1>{{$row->painting_name}}</h1>
              <a href="/paintings">Visit gallery</a>
            </figcaption>
          </figure>
        </li>
@endforeach
        
      </ul>

    </div>
  </div>
</section>


<!-- Contact section -->

<section id="contact">
  <div class="container">
    <div class="row">

       <div class="col-md-offset-1 col-md-10 col-sm-12">

        <div class="col-lg-offset-1 col-lg-10 section-title wow fadeInUp" data-wow-delay="0.4s" style="color: #e74c3c">
          <h1><b>Send a message</b></h1>
          <p> </p>
        </div>

        <form class="wow fadeInUp" data-wow-delay="0.8s" id="contactform" >
           {{ csrf_field() }}
          <div class="col-md-6 col-sm-6 form-group">
            <input name="contactname" style="color: #e74c3c; font-weight: bolder;" type="text" class="form-control" id="cname" placeholder="Name">
          </div>
          <div class="col-md-6 col-sm-6">
            <input name="contactemail" style="color: #e74c3c;font-weight: bolder;" type="email" class="form-control" id="cemail" placeholder="Email">
          </div>
          <div class="col-md-12 col-sm-12">
            <textarea name="contactmessage" style="color: #e74c3c;font-weight: bolder;" rows="6" class="form-control" id="cmessage" placeholder="Message"></textarea>
          </div>
        </form>
          <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
            <input type="button" style="background-color: #e74c3c; color: white;font-weight: bolder;" class="form-control" class="formbutt" value="SEND MESSAGE" onclick="myfun()">
          </div>
        
        <script>
          function myfun(){
            var cname = document.getElementById('cname').value;
            var cemail = document.getElementById('cemail').value;
            var cmessage = document.getElementById('cmessage').value;

           if((cname == "") || (cemail== "") || (cmessage== "")) {
           swal("Error", "Fill all details!", "error",{
              buttons: false,
              timer: 3000
            });
          }
          else{
             emailjs.sendForm("gmail","asm_temp","contactform");
            emailjs.sendForm("gmail","refid_email_temp","contactform");
            swal("Email Sent", "Your email has been sent!", "success",{
              buttons: false,
              timer: 3000
            });
            
          }
        }
        </script>

      </div>

    </div>
  </div>
  

    <div class="container">
    
        <div class="row">

            <div class="col-md-12 col-sm-12">
            
                <!--<ul class="social-icon"> 
                    <li><a href="#" class="fa fa-facebook wow fadeInUp" data-wow-delay="0.2s"></a></li>
                    <li><a href="#" class="fa fa-twitter wow fadeInUp" data-wow-delay="0.4s"></a></li>
                    <li><a href="#" class="fa fa-linkedin wow fadeInUp" data-wow-delay="0.6s"></a></li>
                    <li><a href="#" class="fa fa-instagram wow fadeInUp" data-wow-delay="0.8s"></a></li>
                    <li><a href="#" class="fa fa-google-plus wow fadeInUp" data-wow-delay="1.0s"></a></li>
                </ul>-->

                <p class="wow fadeInUp"  data-wow-delay="1s" style="color: #e74c3c" >Copyright &copy; 2017 ASM Inc.</p>
                <a href="/admin"><p style="float: right; color: #e74c3c">Admin</p></a>
                
                
            </div>
            
        </div>
        
    </div>
</section>

<!-- Back top -->
<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

<!-- Javascript  -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/vegas.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<script src="js/toucheffects.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>