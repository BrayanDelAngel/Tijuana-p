//Escuchamos el evento desde el bton y mandamos los datos de la tabla al modal en el input indicado
$(document).on("click", "#btnmodal", function () {
    var anio = $(this).data("anio");
    var bim = $(this).data("mes");
    var inpc = $(this).data("inpc");
    $("#anioM").val(anio);
    $("#mesM").val(bim);
    $("#incpM").val(inpc);
})