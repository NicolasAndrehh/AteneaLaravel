const expresiones = {
    nombres: /^[a-zA-ZÀ-ÿ\s]{4,}$/,
    apellidos: /^[a-zA-ZÀ-ÿ\s]{4,}$/,
    documento: /^[0-9]{6,}$/,
    procedencia: /^[a-zA-Z\s\-]{2,35}$/,
    telefono: /^[0-9]{10,16}$/,
    email: /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/,
}

const modal = document.querySelector('.modal');

const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");

const validarFormulario = (e) =>{
    switch(e.target.name){
        case "nombres":
            if(expresiones.nombres.test(e.target.value)){
                document.getElementById("nombresInput").classList.remove("input-incorrecto");
                document.getElementById("nombresLabel").classList.remove("label-incorrecto");
                document.getElementById("nombresCheck").classList.add("check-show");
            } else {
                document.getElementById("nombresCheck").classList.remove("check-show");
                document.getElementById("nombresInput").classList.add("input-incorrecto");
                document.getElementById("nombresLabel").classList.add("label-incorrecto");
            }
        break;
        case "apellidos":
            if(expresiones.apellidos.test(e.target.value)){
                document.getElementById("apellidosInput").classList.remove("input-incorrecto");
                document.getElementById("apellidosLabel").classList.remove("label-incorrecto");
                document.getElementById("apellidosCheck").classList.add("check-show");
            } else {
                document.getElementById("apellidosCheck").classList.remove("check-show");
                document.getElementById("apellidosInput").classList.add("input-incorrecto");
                document.getElementById("apellidosLabel").classList.add("label-incorrecto");
            }
        break;
        case "num_documento":
            if(expresiones.documento.test(e.target.value)){
                document.getElementById("documentoInput").classList.remove("input-incorrecto");
                document.getElementById("documentoLabel").classList.remove("label-incorrecto");
                document.getElementById("documentoCheck").classList.add("check-show");
            } else {
                document.getElementById("documentoCheck").classList.remove("check-show");
                document.getElementById("documentoInput").classList.add("input-incorrecto");
                document.getElementById("documentoLabel").classList.add("label-incorrecto");
            }
        break;
        case "procedencia":
            if(expresiones.procedencia.test(e.target.value)){
                document.getElementById("procedenciaInput").classList.remove("input-incorrecto");
                document.getElementById("procedenciaLabel").classList.remove("label-incorrecto");
                document.getElementById("procedenciaCheck").classList.add("check-show");
            } else {
                document.getElementById("procedenciaCheck").classList.remove("check-show");
                document.getElementById("procedenciaInput").classList.add("input-incorrecto");
                document.getElementById("procedenciaLabel").classList.add("label-incorrecto");
            }
        break;
        case "telefono":
            if(expresiones.telefono.test(e.target.value)){
                document.getElementById("telefonoInput").classList.remove("input-incorrecto");
                document.getElementById("telefonoLabel").classList.remove("label-incorrecto");
                document.getElementById("telefonoCheck").classList.add("check-show");
            } else {
                document.getElementById("telefonoCheck").classList.remove("check-show");
                document.getElementById("telefonoInput").classList.add("input-incorrecto");
                document.getElementById("telefonoLabel").classList.add("label-incorrecto");
            }
        break;
        case "email":
            if(expresiones.email.test(e.target.value)){
                document.getElementById("emailInput").classList.remove("input-incorrecto");
                document.getElementById("emailLabel").classList.remove("label-incorrecto");
                document.getElementById("emailCheck").classList.add("check-show");
            } else {
                document.getElementById("emailCheck").classList.remove("check-show");
                document.getElementById("emailInput").classList.add("input-incorrecto");
                document.getElementById("emailLabel").classList.add("label-incorrecto");
            }
        break;
        default:
            console.log("");
        break;
    }
}

inputs.forEach((input) =>{
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
})

formulario.addEventListener("submit", () =>{
    validarFormulario;
})



