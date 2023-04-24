//Escuchamos el evento desde el bton y mandamos los datos de la tabla al modal en el input indicado
$(document).on("click", "#btnmodal", function () {
    var anio = $(this).data("anio");
    var bim = $(this).data("mes");
    var tarifa = $(this).data("tarifa");
    $("#anioM").val(anio);
    $("#mesM").val(bim);
    $("#tarifaM").val(tarifa);
})