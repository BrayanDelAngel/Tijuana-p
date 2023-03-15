export class search {
    //Construtor donde se reciben los parametros de busqueda
    constructor(mysearchc, ul_add_lic) {
        this.mysearch = mysearchc;
        this.ul_add_li = ul_add_lic;
        this.idli = "mylist";
        this.Ccantidad = document.querySelector("#Ccantidad");
    }
    //Funcion de buscar en bae al input definido
    InputSearch() {
        //Escuchando el evento del input
        this.mysearch.addEventListener("input", (e) => {
            e.preventDefault();
            try {
                //Extraemos el token generado en el front
                let token = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content");
                //Declaracion del minimo de letras
                let minino_letras = 0;
                //Extraccion del valor en el input
                let valor = this.mysearch.value;
                //Condicion a ejecutar si los valores son mayores a 0 ejecutar
                if (valor.length > minino_letras) {
                    let datasearch = new FormData();
                    //Conversion del valor para enviar
                    datasearch.append("valor", valor);
                    //Envio por fetch a la ruta mediante el puglin ziggy laravel
                    fetch(route("search"), {
                        //Envio al header el token para la validacion que necesita laravel
                        headers: {
                            "X-CSRF-TOKEN": token,
                        },
                        method: "post",
                        //Envio del dato a buscar
                        body: datasearch,
                    })
                        //Recibimos el datoc como json
                        .then((data) => data.json())
                        //Mostramos en pantalla mediante la funcion showlist
                        .then((data) => {
                            this.Showlist(data, valor);
                        })
                        .catch(function (error) {
                            console.log("Error");
                        });
                }
                //si no que mande nada
                else {
                    this.ul_add_li.style.display = "";
                }
            } catch (error) {
                console.log("Error en:".error);
            }
        });
    }
    //Funcion showlist con parametro de la informacion para mostrarlo
    Showlist(data, valor) {
        //Monstramos en el apartado correspondiente y lo hacemos visible
        this.ul_add_li.style.display = "block";
        //Si el estado es igual a 1 que lo muestre (Proviene del controlador Componente)
        if (data.estado == 1) {
            //Si hay datos en la respuesta
            if (data.result != "") {
                //Muestre en pantalla el resultado
                let arrayc = data.result;
                this.ul_add_li.innerHTML = `
                <table class="table table-hover table-sm table-dark my-2">
                <thead class="table-dark">
                    <tr>
                        <td scope="col" style="text-align:center; width:12%;">Cuenta Predial</td>
                        <td scope="col" style="text-align:center; width:35%;">Propietario</td>
                        <td scope="col" style="text-align:center;">Opciones</td>
                    </tr>
                </thead>
                </table>`;
                let n = 0;
                //Llamamos la funcion show_list_each_data para listar los datos
                this.Show_list_each_data(arrayc, valor, n);
            }
            //Si no que mande mensaje que no se encontro la cuenta
            else {
                this.ul_add_li.innerHTML = "";
                this.ul_add_li.innerHTML += `
                <div class="alert alert-danger mt-2 text-danger" role="alert">
                No se encontro la cuenta
                </div>`;
            }
        }
    }
    //Funcion de enlistar
    Show_list_each_data(arrayc, valor, n) {
        for (let item of arrayc) {
            n++;
            //Estraemos datos y hacemos comparacion de que no en nulos
            let cuenta = item.Clave;
            let propietario = item.p.replace("¥", "Ñ");
            //Enlistar los datos
            this.ul_add_li.innerHTML += `
            <table class="table table-hover table-sm">
                <tbody>
                    <tr>
                        <td scope="col" class="table-light" style="text-align:center;width:12%;">${cuenta}</td>
                        <td scope="col" class="table-light" style="text-align:center;width:35%;">
                            ${propietario}
                        </td>
                        <td class="table-light" style="text-align:center;">
                        <a class="btn btn-outline-dark btn-sm" onClick="determinacion('${cuenta}')"
                        style="padding:0%;border:0px;" data-toggle="tooltip" data-placement="left"
                        title="Determinacion"><img
                            src="https://img.icons8.com/color/30/7950F2/signing-a-document.png" /> Determinacion</a>
                        <a class="btn btn-outline-dark btn-sm" onClick="requerimiento('${cuenta}')"
                        style="padding:0%;border:0px;" data-toggle="tooltip" data-placement="bottom"
                        title="Requerimiento" name="requerimiento"><img
                            src="https://img.icons8.com/color/30/000000/scale-tool.png" />
                        Requerimiento</a>
                        <a class="btn btn-outline-dark btn-sm" onClick="mandamiento('${cuenta}')"
                        style="padding:0%;border:0px;" data-toggle="tooltip" data-placement="right"
                        title="Madamiento" name="mandamiento"><img
                            src="https://img.icons8.com/fluency/30/000000/general-ledger.png" />
                        Mandamiento</a>
                        <a class="btn btn-outline-dark btn-sm" onClick="pdf('${cuenta}')"
                        style="padding:0%;border:0px;" data-toggle="tooltip"
                        data-placement="right" title="Pdf generados" name="pdf">
                        <img src="https://img.icons8.com/fluency/30/null/pdf.png"/>
                        PDF Generados</a>
                        </td> 
                    </tr>
                </tbody>
            </table>
            `;
        }
    }
}
