document.getElementById("foto").onchange = function(e) {
    // Creamos el objeto de la clase FileReader
    let reader = new FileReader();
  
    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(e.target.files[0]);
  
    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function(){
      let fotoPreview = document.getElementById('fotoPreview'),
            image = document.createElement('img');
  
      image.src = reader.result;
  
      fotoPreview.innerHTML = '';
      fotoPreview.append(image);
    };
}

const expresiones = {
    nombres: /^[a-zA-ZÀ-ÿ\s]{4,}$/,
    apellidos: /^[a-zA-ZÀ-ÿ\s]{4,}$/,
    documento: /^[0-9]{6,}$/,
    direccion: /^[a-zA-ZÀ-ÿ0-9\s\#\.\/\_\-]{7,200}$/,
    telefono: /^[0-9]{10,16}$/,
    cargo: /^[a-zA-Z\s]+$/, 

    // Registrar usuario
    nombreUsuario: /^[0-9a-zA-ZÀ-ÿ\s\_\-]{4,}$/,
    email: /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/,
    password: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/

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
        case "direccion":
            if(expresiones.direccion.test(e.target.value)){
                document.getElementById("direccionInput").classList.remove("input-incorrecto");
                document.getElementById("direccionLabel").classList.remove("label-incorrecto");
                document.getElementById("direccionCheck").classList.add("check-show");
            } else {
                document.getElementById("direccionCheck").classList.remove("check-show");
                document.getElementById("direccionInput").classList.add("input-incorrecto");
                document.getElementById("direccionLabel").classList.add("label-incorrecto");
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
        case "cargo":
            if(expresiones.cargo.test(e.target.value)){
                document.getElementById("cargoInput").classList.remove("input-incorrecto");
                document.getElementById("cargoLabel").classList.remove("label-incorrecto");
                document.getElementById("cargoCheck").classList.add("check-show");
            } else {
                document.getElementById("cargoCheck").classList.remove("check-show");
                document.getElementById("cargoInput").classList.add("input-incorrecto");
                document.getElementById("cargoLabel").classList.add("label-incorrecto");
            }
        break;

        // Registrar usuario
        case "name":
            if(expresiones.nombreUsuario.test(e.target.value)){
                document.getElementById("nombresInput").classList.remove("input-incorrecto");
                document.getElementById("nombresLabel").classList.remove("label-incorrecto");
                document.getElementById("nombresCheck").classList.add("check-show");
            } else {
                document.getElementById("nombresCheck").classList.remove("check-show");
                document.getElementById("nombresInput").classList.add("input-incorrecto");
                document.getElementById("nombresLabel").classList.add("label-incorrecto");
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
        case "password":
            if(expresiones.password.test(e.target.value)){
                document.getElementById("passwordInput").classList.remove("input-incorrecto");
                document.getElementById("passwordLabel").classList.remove("label-incorrecto");
                document.getElementById("passwordCheck").classList.add("check-show");
            } else {
                document.getElementById("passwordCheck").classList.remove("check-show");
                document.getElementById("passwordInput").classList.add("input-incorrecto");
                document.getElementById("passwordLabel").classList.add("label-incorrecto");
            }
        break;
        case "password2":
            if(expresiones.password.test(e.target.value)){
                document.getElementById("password2Input").classList.remove("input-incorrecto");
                document.getElementById("password2Label").classList.remove("label-incorrecto");
                document.getElementById("password2Check").classList.add("check-show");
            } else {
                document.getElementById("password2Check").classList.remove("check-show");
                document.getElementById("password2Input").classList.add("input-incorrecto");
                document.getElementById("password2Label").classList.add("label-incorrecto");
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



