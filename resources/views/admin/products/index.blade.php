<!DOCTYPE html>
<html>
<head>

	<title>index</title>
	<link rel="stylesheet" type="text/css" href={{ asset('css/app.css') }}>

	<style type="text/css">
		table, tr, td, th{
			border: solid 2px black;
			border-collapse: collapse;
			padding: 5px;
		}
	</style>
</head>
<body>
	<table class="alert-info">
		<tr>
			<th>#</th>
			<th>id</th>
			<th>title</th>
			<th>description</th>
			<th>price</th>
			<th>img_name</th>
			<th>category_id</th>
		</tr>
		<tr>
			@foreach ($data as $d)
				<tr>
					<td>{{++$loop->index}}</td>
					<td>{{$d->id}}</td>
					<td>{{$d->title}}</td>
					<td>{{$d->description}}</td>
					<td>{{$d->price}}</td>
					<td>{{$d->img_name}}</td>
					<td>

						<a href="{{ route('productsshow', ["id"=>$d->id]) }}">დათვალიერება</a>
						<form method="POST" action="{{ route('productsdelete') }}">
							@csrf
							<input type="hidden" name="id" value="{{$d->id}}">
							<button>წაშლა</button>
						</form>

					</td>
				</tr>
			@endforeach
		</tr>
	</table>



</body>
</html>

