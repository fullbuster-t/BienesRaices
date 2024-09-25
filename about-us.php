<?php
	//Agregando el archivo functions para hacer los includes
	require 'includes/functions.php';
	//Llamando a la función para pasarle el parametro del include y hacer los cambios del index en el header
	includeTemplate('header');
?>
	<main class="container">
		<h2>Conoce Sobre Nosotros</h2>
		<div class="about-us">
			<div class="about-image">
				<picture>
					<source srcset="build/img/nosotros.webp" type="image/webp">
					<img loading="lazy" src="build/img/nosotros.jpg" alt="About image">
				</picture>
			</div>
			<div class="about-text">
				<blockquote>25 años de experiencia</blockquote>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas ratione inventore saepe quo, eveniet ipsum maxime facere neque corrupti iste facilis animi expedita. Incidunt porro ad quam ipsum neque, qui sapiente laborum exercitationem repellendus quisquam, impedit cupiditate necessitatibus. Quidem beatae quae doloremque. Debitis consectetur quidem quibusdam dolorum rerum minus vitae maiores accusantium eveniet! Incidunt velit commodi, quo quaerat, dignissimos odit quam harum maxime tenetur omnis optio vel est, tempora dolores?</p>
			</div>
		</div>
	</main>
	<section class="container">
		<h2>Más sobre nosotros</h2>
		<div class="about-us-icons">
			<div class="icon">
				<img loading="lazy" src="build/img/icono1.svg" alt="Icon">
				<h3>Seguridad</h3>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptas pariatur qui odit labore iusto ea dolorum vero mollitia quo?</p>
			</div>
			<div class="icon">
				<img loading="lazy" src="build/img/icono2.svg" alt="Icon">
				<h3>Precio</h3>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptas pariatur qui odit labore iusto ea dolorum vero mollitia quo?</p>
			</div>
			<div class="icon">
				<img loading="lazy" src="build/img/icono3.svg" alt="Icon">
				<h3>A tiempo</h3>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptas pariatur qui odit labore iusto ea dolorum vero mollitia quo?</p>
			</div>
		</div>
	</section>
<?php
	//Llamando a la función para pasarle el parametro del include y agregar el footer
	includeTemplate('footer');
?>