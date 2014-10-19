<h3>Editar Avión</h3>

{{ Form::open(array('url' => "aviones/$avion->id/update")) }}
	{{ Form::label('placa', 'Placa') }}
	{{ Form::text('placa', $avion->placa) }}
	<br>
	{{ Form::label('color', 'Color') }}
	<input type="color" name="color" value="{{$avion->color}}">
	<br>
	{{Form::submit('Salvar', array())}}

{{ Form::close() }}