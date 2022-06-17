import "./bootstrap";

let contenido_textarea = "";
let max = 255;

//Funcion maximo de caracteres en descripcion
window.valida_num_caracteres = () => {
    let num_caracteres = document.getElementById("descripcion").value.length;
    let msg = document.getElementById("msg-caracteres");

    if (num_caracteres >= max) {
        document.getElementById("descripcion").value = contenido_textarea;
    } else {
        contenido_textarea = document.getElementById("descripcion").value;
        let cant = max - num_caracteres;
        msg.innerHTML = `${cant} carácteres restantes.`;
    }
};
