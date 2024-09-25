<?php
	//Comprobando si ya existe una sesión activa para no crearla dos veces
	if(!isset($_SESSION)){
		//Si no esta iniciada la sesión entonces la iniciamos
		session_start();
	}

	//Asignando el valor de la sesión a $auth, en caso de que la variable no este definida le asignamos el valor por defaul de false
	$auth = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bienes Raices</title>
	<link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
	<header class="header <?php echo $start ? 'start' : ''; ?> ">
		<div class="container header-content">
			<div class="bar">
				<div class="superior">
					<div class="mobile-menu">
						<img src="/build/img/barras.svg" alt="Icon menu">
					</div>
					<a href="/index.php">
						<img src="/build/img/logo.svg" alt="Bienes Raices logo">
					</a>
					<div class="theme-icon">
						<img src="/build/img/dark-mode.svg" alt="Theme icon">
					</div>
				</div>
				<nav class="nav inferior">
					<a href="about-us.php">Nosotros</a>
					<a href="announcements.php">Anuncios</a>
					<a href="blog.php">Blog</a>
					<a href="contact.php">Contacto</a>
					<?php if(!$auth):  ?>
						<a href="login.php">Admin</a>
					<?php endif; ?>
					<?php if($auth):  ?>
						<a href="close-sesion.php">Cerrar sesión</a>
					<?php endif; ?>
				</nav>
			</div>
			<?php 
				if($start){
					echo "<h1>Venta de Casas y Departamentos <br> Exclusivos de Lujo</h1>";
				}
			?>
		</div>
	</header>