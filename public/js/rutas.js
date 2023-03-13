
function determinacion(cuenta) {
    var contenedor = document.getElementById('contenedor_carga');
    contenedor.style.visibility = '';
    contenedor.style.opacity = '0.9';
    window.location.href = "/calculo/" + cuenta;
}
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
function pdf(cuenta) {
    var contenedor = document.getElementById('contenedor_carga');
    contenedor.style.visibility = '';
    contenedor.style.opacity = '0.9';
    window.location.href = "/pdf/" + cuenta;
}