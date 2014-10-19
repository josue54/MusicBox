{{link_to("aviones/create", 'Nuevo', $attributes = array(), $secure = null);}}
{{link_to("pilotos", 'Pilotos', $attributes = array(), $secure = null);}}
<table>
	<tr>
		<th>Id</th>
		<th>Placa</th>
		<th>Color</th>
		<th>Acciones</th>
	</tr>
	@foreach($aviones as $avion)
        <tr>
        	<td>{{ $avion->id }}</td>	
        	<td>{{ $avion->placa }}</td>	
        	<td><input type="color" value="{{ $avion->color }}"> </td>	
        	<td>
        		{{link_to("aviones/$avion->id/edit", 'Editar', $attributes = array(), $secure = null);}}
        		{{link_to("aviones/$avion->id/delete", 'Eliminar', $attributes = array(), $secure = null);}}
        	</td>	
        </tr>
    @endforeach
</table>