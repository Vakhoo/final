<!DOCTYPE html>
<html>
<head>
	<title>category</title>
	<link rel="stylesheet" type="text/css" href={{ asset('css/app.css') }}>
</head>
<body>
	<div class="container">
		<form action="{{ route('productsstore') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<label>title:</label>		
			<input type="text" class="form-control" name="title">
			<label>description:</label>
			<textarea type="text" class="form-control" name="description"></textarea>
			<label>price</label>		
			<input type="number" class="form-control" name="price">
			<label>image name</label>		
			<input type="text" class="form-control" name="img_name">
			<label>image:</label>
			<input type="file" name="image" class="form-control">
			<button class="btn btn-primary w-100">save</button>
		</form>
	</div>

</body>
</html>