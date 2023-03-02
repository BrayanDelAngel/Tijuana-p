let agregar = document.getElementById('agregar');
let contenido = document.getElementById('contenedor');

let boton_enviar = document.querySelector('#enviar_contacto')

agregar.addEventListener('click', e => {
    e.preventDefault();
    let clonado = document.querySelector('.clonar');
    let clon = clonado.cloneNode(true);

    contenido.appendChild(clon).classList.remove('clonar');

    let remover_ocutar = contenido.lastChild.childNodes[1].querySelectorAll('button');
    remover_ocutar[0].classList.remove('ocultar');
});

contenido.addEventListener('click', e => {
    e.preventDefault();
    if (e.target.classList.contains('puntero')) {
        let contenedor = e.target.parentNode.parentNode;

        contenedor.parentNode.removeChild(contenedor);
    }
});