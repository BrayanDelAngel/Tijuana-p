//Función que realizar la suma
function Suma() {
    /*Se extrae los datos que se ingresan en pantalla */
    let ingreso1 = document.getElementById("corriente").value;
    let ingreso2 = document.getElementById("icorriente").value;
    let ingreso3 = document.getElementById("atraso").value;
    let ingreso4 = document.getElementById("rezago").value;
    let ingreso5 = document.getElementById("r_consumo").value;
    let ingreso6 = document.getElementById("c_agua").value;
    let ingreso7 = document.getElementById("r_agua").value;
    let ingreso8 = document.getElementById("c_obra").value;
    let ingreso9 = document.getElementById("r_obra").value;
    let ingreso10 = document.getElementById("g_ejecucion").value;
    let ingreso11 = document.getElementById("o_servicios").value;
    let total;
    /*Desformateamos los datos ingresados en este caso se les quita el $ */
    ingreso1 = desformatear(ingreso1);
    ingreso2 = desformatear(ingreso2);
    ingreso3 = desformatear(ingreso3);
    ingreso4 = desformatear(ingreso4);
    ingreso5 = desformatear(ingreso5);
    ingreso6 = desformatear(ingreso6);
    ingreso7 = desformatear(ingreso7);
    ingreso8 = desformatear(ingreso8);
    ingreso9 = desformatear(ingreso9);
    ingreso10 = desformatear(ingreso10);
    ingreso11 = desformatear(ingreso11);
    try {
        //Calculamos el número escrito:
        /* En donde se valida en cuestion de las consultas quitarle caracteres especiales
        como $ , . el cual no puede dar un formato el float y se valida si es vacio se le 
        asigna un valor de 0 y si no se parsea haciendo el remplazo */
        let valor1 = (isNaN(parseFloat(remplazo(ingreso1)))) ? 0 : parseFloat(remplazo(ingreso1));
        let valor2 = (isNaN(parseFloat(remplazo(ingreso2)))) ? 0 : parseFloat(remplazo(ingreso2));
        let valor3 = (isNaN(parseFloat(remplazo(ingreso3)))) ? 0 : parseFloat(remplazo(ingreso3));
        let valor4 = (isNaN(parseFloat(remplazo(ingreso4)))) ? 0 : parseFloat(remplazo(ingreso4));
        let valor5 = (isNaN(parseFloat(remplazo(ingreso5)))) ? 0 : parseFloat(remplazo(ingreso5));
        /*Para los datos ingresados por el usuario se le hace un parseo y se valida si es vacio o no */
        let valor6 = (isNaN(parseFloat(ingreso6))) ? 0 : parseFloat(ingreso6);
        let valor7 = (isNaN(parseFloat(ingreso7))) ? 0 : parseFloat(ingreso7);
        let valor8 = (isNaN(parseFloat(ingreso8))) ? 0 : parseFloat(ingreso8);
        let valor9 = (isNaN(parseFloat(ingreso9))) ? 0 : parseFloat(ingreso9);
        let valor10 = (isNaN(parseFloat(ingreso10))) ? 0 : parseFloat(ingreso10);
        let valor11 = (isNaN(parseFloat(ingreso11))) ? 0 : parseFloat(ingreso11);
        /*Se suman los datos */
        total = valor1 + valor2 + valor3 + valor4 + valor5 + valor6 + valor7 + valor8 + valor9 + valor10 + valor11;
        //Se retorna el valor que ingreso el usuario haciendo un format al dato de moneda
        $('#corriente').val('$' + valor1)
        $('#icorriente').val('$' + valor2)
        $('#atraso').val('$' + valor3)
        $('#rezago').val('$' + valor4)
        $('#r_consumo').val('$' + valor5)
        $('#c_agua').val(formatear(valor6))
        $('#r_agua').val(formatear(valor7))
        $('#c_obra').val(formatear(valor8))
        $('#r_obra').val(formatear(valor9))
        $('#g_ejecucion').val(formatear(valor10))
        $('#o_servicios').val(formatear(valor11))
        $("#total").val(formatear(total));
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
/*Para el rempazo de caracteres es para los datos que vienen consultados en la base de datos
se les hace un remplace al , ya que la funcion float no lo formatea correctamente con los decimales */
function remplazo(valor){
    let remplazo = valor.replace(',', '');
    return remplazo;
}