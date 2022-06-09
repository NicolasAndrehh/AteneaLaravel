const expresiones = {
    num_documento: /^[0-9]{6,}$/,
    habitacion: /^[0-9]{1,5}$/,
    num_personas:  /^[0-9]{1,2}$/,
    pago: /^[0-9]{1,}$/,
} 

const modal = document.querySelector('.modal');

const formulario = document.getElementById("formulario");
const inputs = document.querySelectorAll("#formulario input");

const validarFormulario = (e) =>{
    switch(e.target.name){
        case "num_documento":
            if(expresiones.num_documento.test(e.target.value)){
                document.getElementById("documentoInput").classList.remove("input-incorrecto");
                document.getElementById("documentoLabel").classList.remove("label-incorrecto");
                document.getElementById("documentoCheck").classList.add("check-show");
            } else {
                document.getElementById("documentoCheck").classList.remove("check-show");
                document.getElementById("documentoInput").classList.add("input-incorrecto");
                document.getElementById("documentoLabel").classList.add("label-incorrecto");
            }
        break;
        case "habitacion":
            if(expresiones.habitacion.test(e.target.value)){
                document.getElementById("habitacionInput").classList.remove("input-incorrecto");
                document.getElementById("habitacionLabel").classList.remove("label-incorrecto");
                document.getElementById("habitacionCheck").classList.add("check-show");
            } else {
                document.getElementById("habitacionCheck").classList.remove("check-show");
                document.getElementById("habitacionInput").classList.add("input-incorrecto");
                document.getElementById("habitacionLabel").classList.add("label-incorrecto");
            }
        break;
        case "num_personas":
            if(expresiones.num_personas.test(e.target.value)){
                document.getElementById("num_personasInput").classList.remove("input-incorrecto");
                document.getElementById("num_personasLabel").classList.remove("label-incorrecto");
                document.getElementById("num_personasCheck").classList.add("check-show");
            } else {
                document.getElementById("num_personasCheck").classList.remove("check-show");
                document.getElementById("num_personasInput").classList.add("input-incorrecto");
                document.getElementById("num_personasLabel").classList.add("label-incorrecto");
            }
        break;
        case "pago":
            if(expresiones.pago.test(e.target.value)){
                document.getElementById("pagoInput").classList.remove("input-incorrecto");
                document.getElementById("pagoLabel").classList.remove("label-incorrecto");
                document.getElementById("pagoCheck").classList.add("check-show");
            } else {
                document.getElementById("pagoCheck").classList.remove("check-show");
                document.getElementById("pagoInput").classList.add("input-incorrecto");
                document.getElementById("pagoLabel").classList.add("label-incorrecto");
            }
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



