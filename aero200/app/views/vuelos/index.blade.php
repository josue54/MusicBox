{{ Form::open(array('url' => 'vuelos')) }}
	{{ Form::label('descripcion', 'Descripción') }}
	{{ Form::text('descripcion', '') }}
	<br>
	{{ Form::label('piloto', 'Piloto:') }}
	<select name="piloto">
		@foreach($pilotos as $piloto)
			<option value={{$piloto->id}}>{{$piloto->nombre}}</option>
    	@endforeach
	</select>
	<br>
	{{ Form::label('avion', 'Avion:') }}
	<select name="avion">
		@foreach($aviones as $avion)
			<option value={{$avion->id}}>{{$avion->placa}}</option>
    	@endforeach
	</select>
	<br>
	{{Form::submit('Salvar', array())}}

{{ Form::close() }}

<table>
	<tr>
		<th>Id</th>
		<th>Descripcion</th>
		<th>Piloto</th>
		<th>Avión</th>
		<th>Acciones</th>
	</tr>
	@foreach($vuelos as $vuelo)
        <tr>
        	<td>{{ $vuelo->id }}</td>	
        	<td>{{ $vuelo->descripcion }}</td>		
        	<td>{{ $vuelo->nombre }}</td>		
        	<td>{{ $vuelo->placa }}</td>		
        	<td>
        		{{link_to("vuelos/$vuelo->id/edit", 'Editar', $attributes = array(), $secure = null);}}
        		{{link_to("vuelos/$vuelo->id/delete", 'Eliminar', $attributes = array(), $secure = null);}}
        	</td>	
        </tr>
    @endforeach
</table>