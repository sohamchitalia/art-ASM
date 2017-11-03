<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="L1JBMR3Ki2We40cq4cCTIKxsLsdLNjMdkh4rC9Yg">
    <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <style>
        @import url(https://fonts.googleapis.com/css?family=Montserrat);
        /*basic reset*/
        
        * {
            margin: 0;
            padding: 0;
        }
        
        html {
            height: 100%;
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
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            min-height: 550px;
            margin-top: 0px;
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
            z-index: -1;
            /*put it behind the numbers*/
        }
        
        #progressbar li:first-child:after {
            /*connector not needed before the first step*/
            content: none;
        }
        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        
        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #e74c3c;
            color: white;
        }
        
        .buyer-button {
            height: 25px;
        }
        
        .buyer-button:hover {
            background-color: lightgreen;
            color: white;
        }
        
        .buyer-button:focus {
            background-color: lightgreen;
            color: white;
            border: none;
            box-shadow: none;
        }
        
        .artist-button {
            height: 25px;
        }
        
        .artist-button:hover {
            background-color: lightgreen;
            color: white;
        }
        
        .artist-button:focus {
            background-color: lightgreen;
            color: white;
            border: none;
        }
        
        .ref-id-text {
            display: none;
            height: 40px;
            width: 200px;
        }
        
        .buyer-button:focus .ref-id-text {
            display: block;
        }
    </style>
</head>

<body>
    <div>

        <header>
            @include('header')
        </header>
        <form id="msform" method="post" enctype="multipart/form-data" action="{{ route('login') }}">
            {{ csrf_field() }}
            <fieldset>
                <h2 class="fs-title">Enter Login Information</h2>
                <h3 class="fs-subtitle"></h3>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">
                        <h3></h3></label>
                    <div>
                        <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">
                        <h3></h3></label>
                    <div>
                        <input id="password" type="password" placeholder="Password" class="form-control" name="password" required> @if ($errors->has('password'))
                        <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> @endif
                    </div>
                </div>

                <center>
                    <button type="submit" class="action-button">Login</button>
                </center>
                <br>
                <class="fs-subtitle">Don't have an account? <a href="register">Register here.</a>
        </form>
    </div>
    </fieldset>
</body>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

<script src="js/login.js"></script>

</body>

</html>