<?php
	//Agregando el archivo functions para hacer los includes
	require 'includes/functions.php';
	//Llamando a la función para pasarle el parametro del include y hacer los cambios del index en el header
	includeTemplate('header', $start = true);
?>
	<main class="container">
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
	</main>
	<section class="section container">
		<h2>Casas y depas en venta</h2>
		<?php
			//Limitando el número de porpiedades
			$limit = 3;
			include 'includes/templates/announcements.php';
		?>
		<div class="align-right">
			<a href="announcements.php" class="btn btn-green">Ver todas</a>
		</div>
	</section>
	<section class="contact-image section">
		<h2>Encuentra la casa de tus sueños</h2>
		<p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad.</p>
		<a href="contact.php" class="btn-yellow-inline">Contactános</a>
	</section>
	<div class="container section section-inferior">
		<section class="blog">
			<h3>Nuestro blog</h3>
			<article class="input-blog">
				<div class="image">
					<picture>
						<source srcset="build/img/blog1.webp" type="image/webp">
						<img loading="lazy" src="build/img/blog1.jpg" alt="Blog">
					</picture>
				</div>
				<div class="input-text">
					<a href="input.php">
						<h4>Terraza en el techo de tu casa</h4>
						<p class="input-date">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
						<p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
					</a>
				</div>
			</article>
			<article class="input-blog">
				<div class="image">
					<picture>
						<source srcset="build/img/blog2.webp" type="image/webp">
						<img loading="lazy" src="build/img/blog2.jpg" alt="Blog">
					</picture>
				</div>
				<div class="input-text">
					<a href="input.php">
						<h4>Guia para la decoración de tu hogar.</h4>
						<p class="input-date">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
						<p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.</p>
					</a>
				</div>
			</article>
		</section>
		<section class="testimonials">
			<h3>Testimoniales</h3>
			<div class="testimonial">
				<blockquote>
					El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis espectativas.
				</blockquote>
				<p>- John Doe</p>
			</div>
		</section>
	</div>
<?php
	//Llamando a la función para pasarle el parametro del include y agregar el footer
	includeTemplate('footer');
?>