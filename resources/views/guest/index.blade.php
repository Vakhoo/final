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
			<th>title</th>
			<th>image</th>
			<th>created at</th>
			@guest
	        @else
		        <th>created at</th>
	        @endguest
		</tr>
		<tr>
			@foreach ($data as $d)
				<tr>
					<td>{{++$loop->index}}</td>
					<td>{{$d->title}}</td>
					<td><img src="{{ asset("gallery/$d->img_name.jpg") }}" alt="img" class="container img-responsive"></td>
					<td>{{$d->created_at}}</td>
					@guest
			        @else
			        	<td>
					        <form action="{{ route('addtocart') }}" method="POST">
					        	@csrf
					        	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					        	<input type="hidden" name="product_id" value="{{$d->id}}">
					        	<input type="number" name="product_num">
					        	<button>submit</button>
					        </form>
				        </td>
			        @endguest
				</tr>
			@endforeach
		</tr>
	</table>



</body>
</html>

