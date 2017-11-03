<?php
$user=Auth::user();
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <link rel="stylesheet" type="text/css" href="{{asset('/cssheader/styles.css')}}">
     <script type='text/javascript' src='js/script.js'></script>
     <script type="text/javascript">
     $(function () {
    var url = window.location.pathname; //sets the variable "url" to the pathname of the current window
    var activePage = url.substring(url.lastIndexOf('/') + 1); //sets the variable "activePage" as the substring after the last "/" in the "url" variable
        $('.primary-nav li a').each(function () { //looks in each link item within the primary-nav list
            var linkPage = this.href.substring(this.href.lastIndexOf('/') + 1); //sets the variable "linkPage" as the substring of the url path in each &lt;a&gt;
 
            if (activePage == linkPage) { //compares the path of the current window to the path of the linked page in the nav item
                $(this).parent().addClass('active'); //if the above is true, add the "active" class to the parent of the &lt;a&gt; which is the &lt;li&gt; in the nav list
            }
        });
})
   </script>

   <title>CSS MenuMaker</title>
</head>
<body>

<nav class="primary-nav">
<div id='cssmenu' >
<ul>
   <li><a href='/'>Home</a></li>
   <li><a href='/paintings'>Paintings</a></li>
   @if (Auth::user())
      @if ($user->role=='artist')
    <li><a href="/dashboard">My Paintings</a></li> 
      @endif
      @if ($user->role=='buyer')
    <li><a href="/dashboard1">My Collection</a></li> 
      @endif
  @endif
    <li><a href='/blogs'>Blogs</a></li>
<li>
   @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
    <li style="float: right"><a>Hello {{ $user->name }}</a></li>
                                </ul>
                            </li>
                        @endif</li>

</div>
</nav>

</body>
<html>

