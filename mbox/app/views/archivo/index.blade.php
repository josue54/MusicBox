
{{Form::open( array('url'=>'archivo', 'files' => true))}}
 {{ Form::label('partes', 'Partes') }}
    {{ Form::text('partes', '') }}
    {{ Form::label('tiempo', 'Tiempo') }}
    {{ Form::text('tiempo', '') }}
    {{ Form::label('subir audio') }}
    {{ Form::file('file')}}
    {{ Form::submit('upload') }}

    {{ Form::close() }}

