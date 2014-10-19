<h3>Nuevo Avión</h3>

{{ Form::open(array('url' => 'aviones')) }}
	{{ Form::label('placa', 'Placa') }}
	{{ Form::text('placa', '') }}
	<br>
	{{ Form::label('color', 'Color') }}
	<input type="color" name="color">
	<br>
	{{Form::submit('Salvar', array())}}

{{ Form::close() }}