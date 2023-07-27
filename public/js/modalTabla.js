//Escuchamos el evento desde el bton y mandamos los datos de la tabla al modal en el input indicado
$(document).on("click", "#btnmodal", function () {
    let cuenta = $(this).data("cuenta");
    let meses = $(this).data("meses");
    let periodo = $(this).data("periodo");
    let fecha_vto = $(this).data("fecha_vto");
    let lecturaFacturada = $(this).data("lf");
    let tarifa1 = $(this).data("t1");
    // let tarifa2 = $(this).data("t2");
    let sumaTarifas = $(this).data("st");
    let factor = $(this).data("f");
    let saldoAtraso = $(this).data("sa");
    let saldoRezago = $(this).data("sr");
    let totalPeriodo = $(this).data("tp");
    let importeMensual = $(this).data("im");
    let RecargosAcumulados = $(this).data("ra");

    $("#cuentaT").val(cuenta);
    $("#mesesT").val(meses);
    $("#periodoT").val(periodo);
    $("#lecturaFacturadaT").val(lecturaFacturada);
    $("#fecha_vtoT").val(fecha_vto);
    $("#tarifa1T").val(remplaceStr(tarifa1));
    // $("#tarifa2T").val(tarifa2);
    $("#sumaTarifasT").val(remplaceStr(sumaTarifas));
    $("#factorT").val(remplaceStr(factor));
    $("#saldoAtrasoT").val(remplaceStr(saldoAtraso));
    $("#saldoRezagoT").val(remplaceStr(saldoRezago));
    $("#totalPeriodoT").val(remplaceStr(totalPeriodo));
    $("#importeMensualT").val(remplaceStr(importeMensual));
    $("#RecargosAcumuladosT").val(remplaceStr(RecargosAcumulados));
})
//La funcion sirve para eliminar , ya que en las validaciones mandar error por que no lo detecta como valor numerico
function remplaceStr(str) {
    var str = str.toString().replace(",", "");
    return str;
}
