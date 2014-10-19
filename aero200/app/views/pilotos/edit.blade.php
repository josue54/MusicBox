<h3>Editar Piloto</h3>

{{ Form::open(array('url' => "pilotos/$piloto->id/update")) }}
	{{ Form::label('nombre', 'Nombre') }}
	{{ Form::text('nombre', $piloto->nombre) }}
	<br>
	{{Form::submit('Salvar', array())}}

{{ Form::close() }}