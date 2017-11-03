<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin</title>
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
        
    </style>
                        </head>
                        <body>
                            <div>
                                
            <form id="msform" method="post" enctype="multipart/form-data" action="/blogform">
            {{ csrf_field() }}
                                             
                                <fieldset>
                                <h2 class="fs-title">Enter Admin Information</h2>
                                    <h3 class="fs-subtitle"></h3>
                                        <div >
                                            <label for="adminname" class="control-label">
                                                <h3></h3>
                                            </label>
                                            <div>
                                                <input id="adminname" type="text" class="form-control" placeholder="Admin Name" name="adminname" required autofocus> 
                                                
                                                </div>
                                            </div>
                                            <div>
                                                <label for="password" class="control-label">
                                                    <h3></h3>
                                                </label>
                                                <div>
                                                    <input id="password" type="password" placeholder="Password" class="form-control" name="password" required> 
                    
                                                    
                                                    </div>
                                                </div>
                                                <center>
                                                    <button  type="submit" class="action-button">Submit</button>
                                                </center>
                                                
                                                    </form>
                                                </div>
                                            </fieldset>
                                        </body>
                                        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
                                        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
                                        </script>
                                    </body>
                                </html>