<!DOCTYPE html>
<html>
<head>
	<title>{{ $titulo }}</title>
</head>
<body>
	<h1>Aerolinea 2000</h1>

	<ul>
		<li>{{link_to("aviones", 'Aviones', $attributes = array(), $secure = null);}}</li>
		<li>{{link_to("pilotos", 'Pilotos', $attributes = array(), $secure = null);}}</li>
		<li>{{link_to("vuelos", 'Vuelos', $attributes = array(), $secure = null);}}</li>
	</ul>

	{{ $content }}
	<p>Esto es una prueba</p>
</body>
</html>