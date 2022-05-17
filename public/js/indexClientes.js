const servicios = document.getElementById('servicios');
const desplegable = document.getElementById('desplegable-bg');

servicios.addEventListener('click', (e) => {
    e.preventDefault();
    desplegable.classList.remove('ocultar')
    desplegable.classList.add('desplegar')
})