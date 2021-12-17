document.addEventListener('DOMContentLoaded', function(){

    eventListeners();

    darkMode();


});

function eventListeners(){
    const mobileMenu = document.querySelector('.mobil-menu');

    mobileMenu.addEventListener('click' , menuResponsive);

    //muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');

    metodoContacto.forEach(metodo => metodo.addEventListener('click' , mostrarMetodosContacto));
}

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
            <label for="telefono">Numero de Teléfono</label>
            <input data-cy="input-telefono" type="tel"  name="contacto[telefono]" id="telefono" placeholder="Número de telefono" >

            <p>Elija la fecha y hora para la llamada</p>

            <label for="fecha">Fecha:</label>
            <input data-cy="input-fecha" type="date"  name="contacto[fecha]" id="fechadate">

            <label for="hora">Hora:</label>
            <input data-cy="input-hora" type="time"  name="contacto[hora]" id="hora" min="09:00" max="18:00">
        `;
    }else{
        contactoDiv.innerHTML = `
        <label for="email">Correo electronico</label>
        <input data-cy="input-email" type="email"  name="contacto[email]" id="email" placeholder="Correo electronico" >

        `;
    }
}

function menuResponsive() {
    const navegacion = document.querySelector('.navegacion');

    // if(navegacion.classList.contains('mostrar')){
    //     navegacion.classList.remove('mostrar');
    // }else{
    //     navegacion.classList.add('mostrar')


    // } el toggle hace lo mismo que todo este codigo

    navegacion.classList.toggle('mostrar');

}

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');


    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode')
    } else {
        document.body.classList.remove('dark-mode')
    }

    prefiereDarkMode.addEventListener('change' ,() => document.body.classList.toggle('dark-mode') );

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click' , () => {
        document.body.classList.toggle('dark-mode')
    })
}