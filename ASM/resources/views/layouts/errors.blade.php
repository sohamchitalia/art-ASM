@if(count($errors))
	<style type="text/css">.alert-danger {
    color: #e74c3c;
    background-color: white;
    border-color: #e74c3c;
}</style>
	<div class="form-group">
		<div class="alert alert-danger">

		<ul style="padding-left: 10px;">
		@foreach($errors->all() as $error)  <!-- errors is an array variable present on 	every page. If no error then it is empty -->
		
			<li> {{ $error }} </li>
		
		
		@endforeach
		</ul>
		</div>
	</div>

@endif
