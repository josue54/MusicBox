{{ Form::open(array('url' => "vuelos/$vuelo->id/update")) }}
	{{ Form::label('descripcion', 'Descripción') }}
	{{ Form::text('descripcion', $vuelo->descripcion) }}
	<br>
	{{ Form::label('piloto', 'Piloto:') }}
	<select name="piloto">
		@foreach($pilotos as $piloto)
			<?php
				if($piloto->id == $vuelo->piloto_id){
					echo "<option selected value=$piloto->id>$piloto->nombre</option>";		
				}else{
					echo "<option value=$piloto->id>$piloto->nombre</option>";		
				}
			?>
    	@endforeach
	</select>
	<br>
	{{ Form::label('avion', 'Avion:') }}
	<select name="avion">
		@foreach($aviones as $avion)
			<?php
				if($avion->id == $vuelo->avion_id){
					echo "<option selected value=$avion->id>$avion->placa</option>";		
				}else{
					echo "<option value=$avion->id>$avion->placa</option>";		
				}
			?>
    	@endforeach
	</select>
	<br>
	{{Form::submit('Salvar', array())}}

{{ Form::close() }}