<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Artwork Upload Form</title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="L1JBMR3Ki2We40cq4cCTIKxsLsdLNjMdkh4rC9Yg">
    <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Montserrat);
        /*basic reset*/
        
        * {
            margin: 0;
            padding: 0;
        }
        
        html {
            height: 100%;
            min-height: 100%
            /*Image only BG fallback*/
            /*background = gradient + image pattern combo*/
            /* background: linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6)); */
        }
        
        body {
            font-family: montserrat, arial, verdana;
            background: #403A3E;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #c4f3d9, #FFC5B5);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #c4f3d9, #FFC5B5);
            height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
        /*form styles*/
        
        #msform {
            width: 500px;
            margin: 40px auto;
            text-align: center;
            position: relative;
        }
        
        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 3px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 20px 30px;
            box-sizing: border-box;
            width: 80%;
            margin: 0 10%;
            /*stacking fieldsets above each other*/
            position: relative;
        }
        /*Hide all except first fieldset*/
        
        #msform fieldset:not(:first-of-type) {
            display: none;
        }
        /*inputs*/
        
        #msform input,
        #msform textarea {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #e74c3c;
            font-size: 13px;
        }
        /*buttons*/
        
        #msform .action-button {
            width: 100px;
            background: #e74c3c;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 1px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }
        
        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #e74c3c;
        }
        /*headings*/
        
        .fs-title {
            font-size: 15px;
            font-weight: bolder;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
        }
        
        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }
        
    </style>
  
</head>

<body><header>
    @include('header')
  </header>

    <form id="msform"  action="/formsubmit" method="post"  id="contact_form" enctype="multipart/form-data">
      {{ csrf_field() }}
<fieldset>

<!-- Form Name -->
<h2 class="fs-title">Enter Painting Information</h2>


<!-- Painting Name Text input-->

<div class="form-group">
  <label class="control-label"><h3></h3></label>  
  
  <input  name="painting_name" placeholder="Painting Name" placeholder="Name" class="form-control"  type="text" required>
  </div>

<!-- Painting Type Select Basic -->
   
<div class="form-group" style="margin-top:-22px;"> 
  <label class="control-label"></label>
       
    <select name="painting_type" class="form-control " style="font-size:13px; color:gray;">
      <option value=" " >Select your Painting Type</option>
      <option>Modern</option>
      <option>Contemporary</option>
      <option>Nature</option>
      <option>Abstract</option>
      <option>Portrait</option>
    </select>
  </div>
</div>
</div>



<!-- Painting Description Text area -->
  
<div class="form-group">
          <textarea class="form-control" name="description" placeholder="Painting Description"></textarea>
</div>


<!-- Painting Sell Type Radio Checks -->
<div class="form-group">
                        <label class=" control-label">Method of Sale</label> 
                        <div class="radio">
                            <div class="row" >
                                
                                    <input type="radio" name="sell_method" value="Direct Sell" class=" col-md-1" id="direct" checked> 
                                    <label class="col-md-11" style="text-align: left;font-size:14px;font-weight: lighter; "> Direct Sell 
                                    </label> 
                                
                            </div>
                            <div class="row" >
                                
                                    <input type="radio" name="sell_method" value="Auction" id="auction" class=" col-md-1" required> <label class="col-md-11" style="text-align: left;font-size:14px;font-weight: lighter; "> Auction </label>
                                </div>
                            
                    </div>
</div> 

<!-- Painting First Price Text input-->

<div class="form-group">
  
   
  <input name="base_price" placeholder="Enter Selling Price" class="form-control" type="number" id="pricetext" required>
    

</div>


<!--Upload File Text input-->

<div class="form-group">

  <input name="file" placeholder="Upload File Here" class="form-control"  type="file" required>
   
</div>


<!-- Success message -->
<!--<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>
-->
<!-- Button -->
<div class="form-group">
    <button type="submit" class="action-button" onclick="showalt()">Submit </button>
</div>

</fieldset>
</form>
<script>
function showalt(){
  swal("Painting Uploaded", "Your painting has been uploaded", "success",{
    buttons: false,
    timer: 3000
  });
}
</script>

    <!-- /.container -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

    <script src="js/index.js"></script>
    <script type="text/javascript">
      var direct = document.getElementById('direct');
      var auction = document.getElementById('auction');
      var tender = document.getElementById ("tender");
      var pricetext = document.getElementById ("pricetext");

      direct.onclick = function() {
        var pricetext = document.getElementById ("pricetext");
      pricetext.placeholder = "Enter Selling Price";
      }

      auction.onclick = function() {
        var pricetext = document.getElementById ("pricetext");
      pricetext.placeholder = "Enter Base Price";
      }

      tender.onclick = function() {
        var pricetext = document.getElementById ("pricetext");
      pricetext.placeholder = "Enter Minimum Bid";
      }
    </script>


</body>
</html>
