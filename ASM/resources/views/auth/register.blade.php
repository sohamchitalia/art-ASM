@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
@import url(https://fonts.googleapis.com/css?family=Montserrat);
/*basic reset*/
* {margin: 0; padding: 0;}
html {
  height: 100%;
  /*Image only BG fallback*/
  /*background = gradient + image pattern combo*/
  /* background: linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6)); */
}
body {
  font-family: montserrat, arial, verdana;
  background: #403A3E;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to bottom, #c4f3d9, #FFC5B5);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to bottom, #c4f3d9, #FFC5B5);/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  min-height:550px;
  margin-top:0px;
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
#msform input, #msform textarea {
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
#msform .action-button:hover, #msform .action-button:focus {
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
/*progressbar*/
#progressbar {
  margin-bottom: 30px;
  overflow: hidden;
  /*CSS counters to number the steps*/
  counter-reset: step;
}
#progressbar li {
  list-style-type: none;
  color: white;
  text-transform: uppercase;
  font-size: 13px;
  width: 33.33%;
  float: left;
  position: relative;
}
#progressbar li:before {
  content: counter(step);
  counter-increment: step;
  width: 30px;
  line-height: 30px;
  display: block;
  font-size: 15px;
  font-weight: bold;
  color: #333;
  background: white;
  border-radius: 3px;
  margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
  content: '';
  width: 100%;
  height: 2px;
  font-weight: bolder;
  background: white;
  position: absolute;
  left: -50%;
  top: 9px;
  z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
  /*connector not needed before the first step*/
  content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
  background: #e74c3c;
  color: white;
}
.buyer-button{
  height:25px;
}
.buyer-button:hover{
  background-color: lightgreen;
  color:white;
}
.buyer-button:focus{
  background-color: lightgreen;
  color:white;
  border:none;
  box-shadow: none;
}
.artist-button{
  height:25px;
}
.artist-button:hover{
  background-color: lightgreen;
  color:white;
}
.artist-button:focus{
  background-color: lightgreen;
  color:white;
  border:none;
}
.ref-id-text{
  display:none;
  height:40px;
  width:200px;
}
.buyer-button:focus .ref-id-text{
  display:block;
}
</style>
  <!-- multistep form -->
  <header>
    @include('header')
  </header>
    <form id="msform" method="POST" action="/register">
      {{ csrf_field() }}
      <!-- progressbar -->
      <ul id="progressbar">
        <li class="active">Account Setup</li>
        <li>Social Profiles</li>
        <li>Personal Details</li>
      </ul>
      <!-- fieldsets -->
      <fieldset>
        <h2 class="fs-title">Create your account</h2>
        <h3 class="fs-subtitle"></h3>
        <input type="text" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Password"/>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" />
        <button type="button" name="next" class="next action-button" value="Next" >Next</button>
      </fieldset>
      <fieldset>
        <h2 class="fs-title">Your Profile</h2>
        <h3 class="fs-subtitle"></h3>
        <!--<input type="text" name="twitter" placeholder="Twitter" />
        <input type="text" name="facebook" placeholder="Facebook" />
        <input type="text" name="gplus" placeholder="Google Plus" />-->
   
         <div>
    <!-- <label for="role"></label><br> -->
    <div class="row" style="padding-left: 40%;">
    <input type="radio" name="role" class="artist-button col-md-1" value="artist" id="artist" checked>
    <label class="col-md-11" for="artist" style="text-align: left;font-size:18px;padding-top: 1.5%;font-weight: lighter; ">Artist</label>
    </div>
    <!-- <br> -->
    <div class="row" style="padding-left: 40%">
      <input type="radio" name="role" class="buyer-button col-md-1" value="buyer" id="buyer">
      <label for="buyer" class="col-md-11" style="text-align: left;font-size:18px;padding-top: 1.5%;font-weight: lighter;"> Buyer </label>
    </div>
    <!-- <br> -->
    <input id="inputtext" type="text" name="ref_id" class="ref-id-text" placeholder="Enter Reference ID"> 
  </div>
    
        </label>
      </div>
        <button type="button" name="previous" class="previous action-button" value="Previous">Previous</button>
        <button type="button" name="next" class="next action-button" value="Next">Next</button>
      </fieldset>
      <fieldset>
        <h2 class="fs-title">Personal Details</h2>
        <h3 class="fs-subtitle"></h3>
        <input type="text" name="name" placeholder="Name"/>
        <input type="text" name="phone" placeholder="Phone"/>  
        <textarea name="address" placeholder="Address"></textarea>
        <button type="button" name="previous" class="previous action-button" value="Previous">Previous</button>
        <button type="submit" name="submit" class="submit action-button" value="Submit" />Submit</button>
      </fieldset>
    </form>
<div style="position:absolute; left:0; top: 40%; transform: translateY(-50%); max-width:500px; max-height: 100px; margin-left:90px;">
@include ('layouts.errors')
</div>

@endsection
  