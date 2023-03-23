<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

</head>
<body>
	<table>
		<thead>
			<tr>
				@foreach($cabecera as $value)
					<th>{{ $value }}</th>
				@endforeach

			</tr>
		</thead>
		<tbody>
			@foreach($data as $columna)
				<tr>
				@foreach($columna as $row)
					<td>{{ $row }}</td>
				@endforeach
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>