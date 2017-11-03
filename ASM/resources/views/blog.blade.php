<?php
$user=Auth::user();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ASM Blog</title>
	<meta name="description" content="Card Expansion Effect with SVG clipPath" />
	<meta name="keywords" content="clipPath, svg, effect, layout, expansion, images, grid, polygon" />
	<meta name="author" content="Claudio Calautti for Codrops" />
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="cssblog/normalize2.css" />
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="cssblog/demo2.css" />
	<link rel="stylesheet" type="text/css" href="cssblog/card2.css" />
	<link rel="stylesheet" type="text/css" href="cssblog/pattern2.css" />
	<!--[if IE]>
	  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script>
	if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
		var root = document.getElementsByTagName('html')[0];
		root.setAttribute('class', 'ff');
	};
	</script>
</head>

<body class="demo-2">
	<div class="container">
		<header>
    @include('header')
  </header>
		
		<div class="content">
			<!-- trianglify pattern container -->
			<div class="pattern pattern--hidden"></div>
			<!-- cards -->
			<div class="wrapper">
				@foreach($request_data as $row)
				<div class="card">
					<div class="card__container card__container--closed">
						<svg class="card__image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 500" preserveAspectRatio="xMidYMid slice">
							<defs>
								<clipPath id="clipPath1">
									<polygon class="clip" points="0,500 0,0 1920,0 1920,500"></polygon>
								</clipPath>
							</defs>
							<image clip-path="url(#clipPath1)" width="1920" height="500" xlink:href="<?php echo url('/download/' . $row->stored_file_name); ?>"></image>
						</svg>
						<div class="card__content">
							<i class="card__btn-close fa fa-times"></i>
							<div class="card__caption">
								<h2 class="card__title">{{$row->blog_title}}</h2>
								<p class="card__subtitle"></p>
							</div>
							<div class="card__copy">
								<div class="meta">
									<!--<img class="meta__avatar" src="img/authors/1.png" alt="author01" />-->
									<i class="fa fa-user fa-lg"></i>
									<span class="meta__author">{{$row->blog_author}}</span>
								</div>
								<?php echo nl2br($row->blog_content); ?>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
			<!-- /cards -->
		</div>
		</section> 
	</div>
	<!-- /container -->
	<!-- JS -->
	<script src="jsblog/vendors/trianglify.min.js"></script>
	<script src="jsblog/vendors/TweenMax.min.js"></script>
	<script src="jsblog/vendors/ScrollToPlugin.min.js"></script>
	<script src="jsblog/vendors/cash.min.js"></script>
	<script src="jsblog/Card-polygon.js"></script>
	<script src="jsblog/demo-22.js"></script>
</body>

</html>