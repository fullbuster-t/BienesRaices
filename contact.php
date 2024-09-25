<?php
	//Agregando el archivo functions para hacer los includes
	require 'includes/functions.php';
	//Llamando a la función para pasarle el parametro del include y hacer los cambios del index en el header
	includeTemplate('header');
?>
	<main class="container section">
		<h1>Contacto</h1>
		<picture>
			<source srcset="build/img/destacada3.webp" type="image/webp">
			<img loading="lazy" src="build/img/destacada3.jpg" alt="Contact image">
		</picture>
		<h2>Llene el formulario de contacto</h2>
		<form class="form">
			<fieldset>
				<legend>Información personal</legend>
				<label for="name">Nombre</label>
				<input id="name" type="text" placeholder="Ingresa tu nombre">
				<label for="email">E-mail</label>
				<input id="email" type="email" placeholder="Ingresa tu e-mail">
				<label for="tel">Telefono</label>
				<input id="tel" type="tel" placeholder="Ingresa tu número de telefono">
				<label for="message">Mensaje</label>
				<textarea id="message" placeholder="Ingresa el mensaje"></textarea>
			</fieldset>
			<fieldset>
				<legend>Información sobre la propiedad</legend>
				<label for="options">Vende o compra</label>
				<select id="options">
					<option value="" disabled selected>---Elije una opción---</option>
					<option value="Compra">---Compra---</option>
					<option value="Venta">---Venta---</option>
				</select>
				<label for="price">Precio o presupuesto</label>
				<input id="price" type="number" placeholder="Ingresa el valor para el presupuesto">
			</fieldset>
			<fieldset>
				<legend>Contacto</legend>
				<p>Como desea ser contactado</p>
				<div class="form-contact">
					<label for="contact-phone">Télefono</label>
					<input name="contact-mail" id="contact-phone" type="radio" value="phone">
					<label for="contact-email">E-mail</label>
					<input name="contact-mail" id="contact-email" type="radio" value="email">
				</div>
				<p>Si eligió télefono elija la fecha y la hora para ser contactado</p>
				<label for="date">Fecha</label>
				<input id="date" type="date">
				<label for="time">Hora</label>
				<input id="time" type="time" min="09:00" max="18:00">
			</fieldset>
			<input type="submit" value="Enviar" class="btn-green">
		</form>
	</main>
<?php
	//Llamando a la función para pasarle el parametro del include y agregar el footer
	includeTemplate('footer');
?>