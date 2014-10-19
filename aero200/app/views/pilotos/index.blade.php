{{link_to("pilotos/create", 'Nuevo', $attributes = array(), $secure = null);}}
{{link_to("aviones", 'Aviones', $attributes = array(), $secure = null);}}
<table>
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Acciones</th>
	</tr>
	@foreach($pilotos as $piloto)
        <tr>
        	<td>{{ $piloto->id }}</td>	
        	<td>{{ $piloto->nombre }}</td>		
        	<td>
        		{{link_to("pilotos/$piloto->id/edit", 'Editar', $attributes = array(), $secure = null);}}
        		{{link_to("pilotos/$piloto->id/delete", 'Eliminar', $attributes = array(), $secure = null);}}
        	</td>	
        </tr>
    @endforeach
</table>