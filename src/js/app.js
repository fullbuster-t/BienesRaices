document.addEventListener('DOMContentLoaded', function(){

    eventListeners();
    darkMode();
});

//Función creada para activar el modo oscuro dentro de sitio
function darkMode(){
    //Agregando a una variable las preferencias del usuario respecto al tema
    const preferDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    //Impresión de las preferencias de usuario
    //console.log(preferDarkMode.matches);

    /* Cambio de darkMode a través del cambio de las preferencias del sistema */
    // Comparando las preferencias del usuario para hacer el cambio
    if(preferDarkMode.matches ){
        //Agregando la clase del darkMode
        document.body.classList.add('darkMode');
    }else{
        //Removiendo la clase del darkMode
        document.body.classList.remove('darkMode');
    }


    /* Cambio de darkMode a través del cambio de las preferencias del sistema - Escuchando el cambio en  tiempo real */
    //Agregando evento de cambio a el darkMode a traves de funciones
    preferDarkMode.addEventListener('change', function(){
        // Comparando las preferencias del usuario para hacer el cambio
        if(preferDarkMode.matches ){
            //Agregando la clase del darkMode
            document.body.classList.add('darkMode');
        }else{
            //Removiendo la clase del darkMode
            document.body.classList.remove('darkMode');
        }
    });


    /* Cambio de darkMode mediante el botón */
    //Seleccionando el botón dentro de el documento HTML
    const buttonDarkMode = document.querySelector('.theme-icon');
    //Agregandole el evento de click
    buttonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('darkMode');
    });
}

//Función creada para mostrar la navegación en modo phone
function eventListeners(){
    //Agregando el query a el botón tipo hamburguesa
    const mobileMenu = document.querySelector('.mobile-menu');
    //Agregando un evento a el botón
    mobileMenu.addEventListener('click', navigationResposive);
}

//Función que quita o agrega la clase para ver el menu
function navigationResposive(){
    //Seleccionando la navegación a través de su clase
    const navigation = document.querySelector('.nav');

    //Condición que valida si la navegación esta visible o no
    if(navigation.classList.contains('view-nav')){
        //Quitando la clase para ocultar la navegación
        navigation.classList.remove('view-nav');
    }else{
        //Agregando la clase para mostrar la navegación
        navigation.classList.add('view-nav');
    }

    //Otra forma de crear o representar lo que esta dentro de if
    //navigation.classList.toggle('view-nav');
}