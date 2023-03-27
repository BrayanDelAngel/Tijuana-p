//Función que realizar la suma
function Porcentaje() {
    /*Se extrae los datos que se ingresan en pantalla */
    let ingreso1 = document.getElementById("pagor").value;
    let ingreso2 = document.getElementById("pagoe").value;
    let importeRequeriminento;
    let importeEmbargo;
    /*Desformateamos los datos ingresados en este caso se les quita el $ */
    ingreso1 = desformatear(ingreso1);
    ingreso2 = desformatear(ingreso2);
    try {
        //Calculamos el número escrito:
        /*Para los datos ingresados por el usuario se le hace un parseo y se valida si es vacio o no */
        let valor1 = (isNaN(parseFloat(ingreso1))) ? 0 : parseFloat(ingreso1);
        let valor2 = (isNaN(parseFloat(ingreso2))) ? 0 : parseFloat(ingreso2);
        /*Se suman los datos */
        importeRequeriminento = (valor1 * 0.02)+valor1;
        importeEmbargo = (valor2 * 0.02)+valor2 ;
        //Se retorna el valor que ingreso el usuario haciendo un format al dato de moneda
        $('#pagor').val('$' + valor1)
        $('#totalr').val('$' + importeRequeriminento)
        $('#pagoe').val('$' + valor2)
        $('#totale').val('$' + importeEmbargo)
    }
    //Si se produce un error lo mandamos en consola
    catch (e) {
        console.log('Error en suma'.e);
    }
}
/*La funcion formatear recibe como parametro un valor en el cual lo formatea 
 moneda de estados unidos y retorna ese formato*/
function formatear(valor) {
    const formateado = valor.toLocaleString("en", {
        style: "currency",
        currency: "USD"
    });
    return formateado;
}
/* Para desformaatear se le remplaza el signo $ y retorna */
function desformatear(valor) {
    let desformatear = valor.replace('$', '');
    return desformatear;
}