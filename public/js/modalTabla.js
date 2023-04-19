//Escuchamos el evento desde el bton y mandamos los datos de la tabla al modal en el input indicado
$(document).on("click", "#btnmodal", function () {
    let cuenta = $(this).data("cuenta");
    let meses = $(this).data("meses");
    let periodo = $(this).data("periodo");
    let fecha_vto = $(this).data("fecha_vto");
    let lecturaFacturada = $(this).data("lecturaFacturada");
    let sumaTarifas = $(this).data("tarifa1");
    let factor = $(this).data("factor");
    let saldoAtraso = $(this).data("saldoAtraso");
    let saldoRezago = $(this).data("saldoRezago");
    let totalPeriodo = $(this).data("totalPeriodo");
    let importeMensual = $(this).data("importeMensual");
    let RecargosAcumulados = $(this).data("RecargosAcumulados");
    console.log($(this).data("lecturaFacturada"));
    console.log(
         cuenta ,
         periodo,
     meses ,
     fecha_vto ,
     lecturaFacturada ,
     sumaTarifas ,
     factor ,
     saldoAtraso ,
     saldoRezago ,
     totalPeriodo ,
     importeMensual ,
     RecargosAcumulados,
    );
    $("#cuentaT").val(cuenta);
    $("#mesesT").val(meses);
    $("#periodoT").val(periodo);
    $("#lecturaFacturadaT").val(lecturaFacturada);
    $("#fecha_vtoT").val(fecha_vto);
    $("#sumaTarifasT").val(sumaTarifas);
    $("#factorT").val(factor);
    $("#saldoAtrasoT").val(saldoAtraso);
    $("#saldoRezagoT").val(saldoRezago);
    $("#totalPeriodoT").val(totalPeriodo);
    $("#importeMensualT").val(importeMensual);
    $("#RecargosAcumuladosT").val(RecargosAcumulados);
})