<h3>Nuevo Piloto</h3>

{{ Form::open(array('url' => 'pilotos')) }}
	{{ Form::label('nombre', 'Nombre') }}
	{{ Form::text('nombre', '') }}
	{{Form::submit('Salvar', array())}}

{{ Form::close() }}