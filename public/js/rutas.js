// //Declaraciones de las rutas en base a una funcion se carga desde el archivo export_search.js
function requerimiento(cuenta) {
    var contenedor = document.getElementById('contenedor_carga');
    contenedor.style.visibility = '';
    contenedor.style.opacity = '0.9';
    window.location.href = "/formR/" + cuenta;
}
function mandamiento(cuenta) {
    var contenedor = document.getElementById('contenedor_carga');
    contenedor.style.visibility = '';
    contenedor.style.opacity = '0.9';
    window.location.href = "/formM/" + cuenta;
}