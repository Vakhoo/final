<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
	<link rel="stylesheet" type="text/css" href={{ asset('css/app.css') }}>
</head>
<body>
		<div class="container">
			<form action="{{ route('productsupdate') }}" method="POST" enctype="multipart/form-data">
				@csrf


				<input type="hidden" name="id" value="{{$data->id}}">
				<label>title:</label>		
				<input type="text" class="form-control" name="title" value="{{$data->title}}">
				<label>description:</label>
				<textarea type="text" class="form-control" name="description">{{$data->description}}</textarea>
				<label>price</label>		
				<input type="number" class="form-control" name="price" value="{{$data->price}}">
				<label>image name</label>		
				<input type="text" class="form-control" name="img_name" value="{{$data->img_name}}">
				<button class="btn btn-primary w-100">save</button>
			</form>
		</div>

</body>
</html>

