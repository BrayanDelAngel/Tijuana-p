//Escuchamos el evento desde el bton y mandamos los datos de la tabla al modal en el input indicado
$(document).on("click", "#btnmodal", function () {
    var anio = $(this).data("anio");
    var bim = $(this).data("bim");
    var factor = $(this).data("factor");
    var tarifa = $(this).data("tarifa");
    var factor2 = $(this).data("factor2");
    var tarifa2 = $(this).data("tarifa2");
    $("#anio").val(anio);
    $("#mes").val(bim);
    $("#tarifa1").val(factor);
    $("#factor1").val(tarifa);
    $("#tarifa2").val(factor2);
    $("#factor2").val(tarifa2);
})