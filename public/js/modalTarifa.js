//Escuchamos el evento desde el bton y mandamos los datos de la tabla al modal en el input indicado
$(document).on("click", "#btnmodal", function () {
    var anio = $(this).data("anio");
    var bim = $(this).data("mes");
    var tarifa = $(this).data("tarifa");
    var tarifa2 = $(this).data("tarifa2");
    $("#anioM").val(anio);
    $("#mesM").val(bim);
    $("#tarifaM").val(tarifa);
    $("#tarifaM2").val(tarifa2);
})