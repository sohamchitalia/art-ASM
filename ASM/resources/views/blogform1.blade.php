<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form class="well form-horizontal"  action="/blogsubmit " method="post"  id="blog_form" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
  		<label class="col-md-4 control-label"></label>  
  		<div class="col-md-4 inputGroupContainer">
  		<div class="input-group">
  		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  		<input  name="blog_title" placeholder="Blog Post Title" class="form-control"  type="text">
    </div>
    <div class="form-group">
  		<label class="col-md-4 control-label"></label>  
  		<div class="col-md-4 inputGroupContainer">
  		<div class="input-group">
  		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  		<input  name="blog_author" placeholder="Blog Post Author" class="form-control"  type="text">
    </div>
    <div class="form-group">
  <label class="col-md-4 control-label"></label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <textarea class="form-control" name="blog_content" placeholder="Blog Post Content"></textarea>
  </div>
  </div>
</div>
    
</div>
</body>
</html>