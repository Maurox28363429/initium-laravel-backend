<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
        		table{
        			width:100%
        		}
        		th, td {
			  padding: 15px;
			  text-align: left;
			  border-bottom: 1px solid #ddd;
			}
			tr:nth-child(even) {background-color: #f2f2f2;}
			thead{
			  background-color: #04AA6D;
			  color: white;
			}

        </style>
    </head>
    <body>
    <h2 style="text-align:justify;">
        Curso: {{ $curso->name }}
        <span style="font-weight:bold;color:#00e676;margin-left:1em;">
            Asistieron: {{ $asist.' /'.$total}}
        </span>
        <span style="font-weight:bold;color:#d50000;margin-left:1em;">
            No asistieron: {{ $no_asist.' /'.$total }}
        </span>
    </h2>
	<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">Enrolador</th>
      <th scope="col">Asistencia</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($data as $key=>$value)
  	    <tr>
  	      <th>{{ $value->id }}</th>
	      <th>{{ $value->name.' '.$value->last_name }}</th>
	      <th>{{ $value->phone }}</th>
          <th>{{ ($value->reference_person)? $value->reference_person:'N/D' }}</th>
	      @if(!empty($value->assist))
	      	<th>Asistió correctamente</th>
	      @else
	      	<th>No asistió</th>
	      @endif
	    </tr>
  	@endforeach
  </tbody>
</table>

    </body>
</html>