const openModal = document.querySelector('.abrirModalModificar');
const modalModificar = document.querySelector('.modalModificar');
const closeModal = document.querySelector('.cerrarModalModificar')

openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modalModificar.classList.add('modal--show');
})

closeModal.addEventListener('click', (e)=>{
    e.preventDefault();    
    modalModificar.classList.remove('modal--show');
})

const formularioModificar = document.getElementById("formularioModificar");
const inputsModificar = document.querySelectorAll("#formularioModificar input");
const expresiones = {
    nombres: /^[a-zA-ZÀ-ÿ\s]{4,}$/,
    apellidos: /^[a-zA-ZÀ-ÿ\s]{4,}$/,
    documento: /^[0-9]{6,}$/,
    direccion: /^[a-zA-ZÀ-ÿ0-9\s\#\.\/\_\-]{7,200}$/,
    telefono: /^[0-9]{10,16}$/,
    cargo: /^[a-zA-Z\s]+$/
}


const validarFormularioModificar = (e) =>{
    switch(e.target.name){
        case "nombres":
            if(expresiones.nombres.test(e.target.value)){
                document.getElementById("nombresInputModificar").classList.remove("input-incorrecto");
                document.getElementById("nombresLabelModificar").classList.remove("label-incorrecto");
                document.getElementById("nombresCheckModificar").classList.add("check-show");
            } else {
                document.getElementById("nombresCheckModificar").classList.remove("check-show");
                document.getElementById("nombresInputModificar").classList.add("input-incorrecto");
                document.getElementById("nombresLabelModificar").classList.add("label-incorrecto");
            }
        break;
        case "apellidos":
            if(expresiones.apellidos.test(e.target.value)){
                document.getElementById("apellidosInputModificar").classList.remove("input-incorrecto");
                document.getElementById("apellidosLabelModificar").classList.remove("label-incorrecto");
                document.getElementById("apellidosCheckModificar").classList.add("check-show");
            } else {
                document.getElementById("apellidosCheckModificar").classList.remove("check-show");
                document.getElementById("apellidosInputModificar").classList.add("input-incorrecto");
                document.getElementById("apellidosLabelModificar").classList.add("label-incorrecto");
            }
        break;
        case "num_documento":
            if(expresiones.documento.test(e.target.value)){
                document.getElementById("documentoInputModificar").classList.remove("input-incorrecto");
                document.getElementById("documentoLabelModificar").classList.remove("label-incorrecto");
                document.getElementById("documentoCheckModificar").classList.add("check-show");
            } else {
                document.getElementById("documentoCheckModificar").classList.remove("check-show");
                document.getElementById("documentoInputModificar").classList.add("input-incorrecto");
                document.getElementById("documentoLabelModificar").classList.add("label-incorrecto");
            }
        break;
        case "direccion":
            if(expresiones.direccion.test(e.target.value)){
                document.getElementById("direccionInputModificar").classList.remove("input-incorrecto");
                document.getElementById("direccionLabelModificar").classList.remove("label-incorrecto");
                document.getElementById("direccionCheckModificar").classList.add("check-show");
            } else {
                document.getElementById("direccionCheckModificar").classList.remove("check-show");
                document.getElementById("direccionInputModificar").classList.add("input-incorrecto");
                document.getElementById("direccionLabelModificar").classList.add("label-incorrecto");
            }
        break;
        case "telefono":
            if(expresiones.telefono.test(e.target.value)){
                document.getElementById("telefonoInputModificar").classList.remove("input-incorrecto");
                document.getElementById("telefonoLabelModificar").classList.remove("label-incorrecto");
                document.getElementById("telefonoCheckModificar").classList.add("check-show");
            } else {
                document.getElementById("telefonoCheckModificar").classList.remove("check-show");
                document.getElementById("telefonoInputModificar").classList.add("input-incorrecto");
                document.getElementById("telefonoLabelModificar").classList.add("label-incorrecto");
            }
        break;
        case "cargo":
            if(expresiones.cargo.test(e.target.value)){
                document.getElementById("cargoInputModificar").classList.remove("input-incorrecto");
                document.getElementById("cargoLabelModificar").classList.remove("label-incorrecto");
                document.getElementById("cargoCheckModificar").classList.add("check-show");
            } else {
                document.getElementById("cargoCheckModificar").classList.remove("check-show");
                document.getElementById("cargoInputModificar").classList.add("input-incorrecto");
                document.getElementById("cargoLabelModificar").classList.add("label-incorrecto");
            }
        break;
        default:
            console.log("");
        break;
    }
}

inputsModificar.forEach((input) =>{
    input.addEventListener('keyup', validarFormularioModificar);
    input.addEventListener('blur', validarFormularioModificar);
})

formularioModificar.addEventListener("submit", () =>{
    validarFormularioModificar;
})


// MODAL REGISTRAR

const openModalRegistrar = document.querySelector('.abrirModalRegistrar');
const modalRegistrar = document.querySelector('.modalRegistrar');
const closeModalRegistrar = document.querySelector('.cerrarModalRegistrar')


openModalRegistrar.addEventListener('click', (e)=>{
    e.preventDefault();
    modalRegistrar.classList.add('modal--show');
})

closeModalRegistrar.addEventListener('click', (e)=>{
    e.preventDefault();
    modalRegistrar.classList.remove('modal--show');
})

const formularioRegistrar = document.getElementById("formularioRegistrar");
const inputsRegistrar = document.querySelectorAll("#formularioRegistrar input");

const validarFormularioRegistrar = (e) =>{
    switch(e.target.name){
        case "nombres":
            if(expresiones.nombres.test(e.target.value)){
                document.getElementById("nombresInputRegistrar").classList.remove("input-incorrecto");
                document.getElementById("nombresLabelRegistrar").classList.remove("label-incorrecto");
                document.getElementById("nombresCheckRegistrar").classList.add("check-show");
            } else {
                document.getElementById("nombresCheckRegistrar").classList.remove("check-show");
                document.getElementById("nombresInputRegistrar").classList.add("input-incorrecto");
                document.getElementById("nombresLabelRegistrar").classList.add("label-incorrecto");
            }
        break;
        case "apellidos":
            if(expresiones.apellidos.test(e.target.value)){
                document.getElementById("apellidosInputRegistrar").classList.remove("input-incorrecto");
                document.getElementById("apellidosLabelRegistrar").classList.remove("label-incorrecto");
                document.getElementById("apellidosCheckRegistrar").classList.add("check-show");
            } else {
                document.getElementById("apellidosCheckRegistrar").classList.remove("check-show");
                document.getElementById("apellidosInputRegistrar").classList.add("input-incorrecto");
                document.getElementById("apellidosLabelRegistrar").classList.add("label-incorrecto");
            }
        break;
        case "num_documento":
            if(expresiones.documento.test(e.target.value)){
                document.getElementById("documentoInputRegistrar").classList.remove("input-incorrecto");
                document.getElementById("documentoLabelRegistrar").classList.remove("label-incorrecto");
                document.getElementById("documentoCheckRegistrar").classList.add("check-show");
            } else {
                document.getElementById("documentoCheckRegistrar").classList.remove("check-show");
                document.getElementById("documentoInputRegistrar").classList.add("input-incorrecto");
                document.getElementById("documentoLabelRegistrar").classList.add("label-incorrecto");
            }
        break;
        case "direccion":
            if(expresiones.direccion.test(e.target.value)){
                document.getElementById("direccionInputRegistrar").classList.remove("input-incorrecto");
                document.getElementById("direccionLabelRegistrar").classList.remove("label-incorrecto");
                document.getElementById("direccionCheckRegistrar").classList.add("check-show");
            } else {
                document.getElementById("direccionCheckRegistrar").classList.remove("check-show");
                document.getElementById("direccionInputRegistrar").classList.add("input-incorrecto");
                document.getElementById("direccionLabelRegistrar").classList.add("label-incorrecto");
            }
        break;
        case "telefono":
            if(expresiones.telefono.test(e.target.value)){
                document.getElementById("telefonoInputRegistrar").classList.remove("input-incorrecto");
                document.getElementById("telefonoLabelRegistrar").classList.remove("label-incorrecto");
                document.getElementById("telefonoCheckRegistrar").classList.add("check-show");
            } else {
                document.getElementById("telefonoCheckRegistrar").classList.remove("check-show");
                document.getElementById("telefonoInputRegistrar").classList.add("input-incorrecto");
                document.getElementById("telefonoLabelRegistrar").classList.add("label-incorrecto");
            }
        break;
        case "cargo":
            if(expresiones.cargo.test(e.target.value)){
                document.getElementById("cargoInputRegistrar").classList.remove("input-incorrecto");
                document.getElementById("cargoLabelRegistrar").classList.remove("label-incorrecto");
                document.getElementById("cargoCheckRegistrar").classList.add("check-show");
            } else {
                document.getElementById("cargoCheckRegistrar").classList.remove("check-show");
                document.getElementById("cargoInputRegistrar").classList.add("input-incorrecto");
                document.getElementById("cargoLabelRegistrar").classList.add("label-incorrecto");
            }
        break;
        default:
            console.log("");
        break;
    }
}

inputsRegistrar.forEach((input) =>{
    input.addEventListener('keyup', validarFormularioRegistrar);
    input.addEventListener('blur', validarFormularioRegistrar);
})

formularioRegistrar.addEventListener("submit", (e) =>{
    validarFormularioRegistrar;
    modalRegistrar.classList.add('modal--show');
})



