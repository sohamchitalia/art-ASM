@section('content')
<!DOCTYPE html>
<?php 
 
 $user = Auth::user();
 ?>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<head>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Reference ID</title>
  <style>
  body {
            background: #403A3E;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #c4f3d9, #FFC5B5);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #c4f3d9, #FFC5B5);
            background-repeat: no-repeat;
            background-attachment: fixed;
  }
  </style>
  </head>
  <body>




 

    @include('header')


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php $namee = $user->fname; ?>
    
<div class="container" style="margin-top:20px; margin-left: 20px;">
    
        
                    <form method="GET" action="/ref" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" onClick="window.location.reload();" style="width: 150px; height:40px;">Generate Ref ID</button>
                    <br>    

                    
                     <h3> Your reference id is:  <span style="color: blue;"> <b> {{$request_data->ref_id}} </b>  </span></h3>
                     <br>
                     <div style="background-color:#ccffcc; border: 1px solid green; border-radius: 5px; margin-right: 20px; width:400px; height:40px; padding:10px;">
                     Reloading the page will generate a new reference ID.<br>
                     
                        </div>
                   </form>
                   <br>
                  <!-- emailjs.send("gmail","refid_email_temp",{name: "James", notes: "Check this out!"}); -->
                
                   <!-- <form method="POST" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    Enter friend's email: <input type="email" name="friendemail" id = "friendemail">
                   <!-- <button type="submit" class="btn" onClick="window.location.reload();" style="width: 100px; height:20px;">Generate Ref ID</button> 
                   </form> -->
                  <form method="GET" action="/refsms">
                    {{ csrf_field() }}
                   Enter friend's number: <input type="numeric" name="friendnumber" id = "friendnumber" >
                  <input type="hidden" name="refid" value="{{ $request_data->ref_id   }}">
                   <button  class="btn btn-danger" onclick="myFunction()">Send Message</button>
               </form>
                    <p id="testp"> </p>
                   <script  type="text/javascript" language="JavaScript" >
                    
                     //   console.log("hi");
                 //document.getElementById("testp").innerHTML = "hello";
                  
                //   var uname = '<?php echo $namee; ?>';
                   //console.log(uname);
                //   var friendmail = document.getElementById('friendemail').value;
                   // console.log(friendmail);
               
                 //   var ref = '<?php echo $request_data->ref_id ?>';
                  //  var f = JSON.stringify({uname: uname , ref: ref, friendmail: friendmail});


                    
                    

                   </script>

                  
</div>

</body>
</html>



