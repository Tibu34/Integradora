<!DOCTYPE html>
<html data-theme="dark" lang="es">
	<head>
		<title>API Sensores</title>
		<link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
	</head>
	<body>
		<header class="container">
			<hgroup>
				<h1>API Sensores</h1>
				<h2>API REST de sensores nodeMCU implementada en Laravel</h2>
			</hgroup>
		</header>

		<main class="container">
			<h3>Sensores Usados</h3>
			<ul>
				<li>Sensor de Botón</li>
				<li>Sensor de Vibración</li>
				<li>Sensor de Humedad</li>
				<li>Sensor de Temperatura</li>
				<li>Sensor de Distancia</li>
				<li>Sensor de Ritmo Cardiaco</li>
			</ul>
		</main>

		<footer class="container">
			<small>
				Usando:
				PHP v{{ PHP_VERSION }},
				Laravel v{{ Illuminate\Foundation\Application::VERSION }}
			</small>
		</footer>
	</body>
</html>