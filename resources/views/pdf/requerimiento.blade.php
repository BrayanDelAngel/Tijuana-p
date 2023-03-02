<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        @page {
            margin: 0px;
        }

        header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 100px;
            /** Extra personal styles **/
            background-color: #952F57;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        .imgHeader1 {
            float: left;
            width: 4cm;
            height: 2cm;
            background-color: #952F57;
            margin-top: 15px;
            margin-left: 15px;
        }

        .imgHeader2 {
            float: right;
            width: 4.52cm;
            height: 1.76cm;
            background-color: #952F57;
            margin-top: 15px;
            margin-right: 15px;
        }

        .infoHeader {
            position: absolute;
            text-align: center;
            margin: auto;
            right: 40px;
            left: 30px;
            top: 60px;
            height: 100px;
            width: 400px;
            font-size: 0.8em;
            line-height: 12px;
            font: serif;
            font-weight: 800;
        }

        body {
            margin-top: 2.8cm;
            margin-left: 1.7cm;
            margin-right: 1.3cm;
            margin-bottom: 2cm;
            font-family: Arial, Helvetica, sans-serif;
        }

        .text-justify {
            text-align: justify;
        }

        .text-center {
            text-align: center;
        }

        .bold {
            font-weight: 800;
            font-weight: bold;
        }

        p {
            font-size: 11.5px !important;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: normal !important;
        }

        ol,
        li {
            font-size: 12px;
            font-weight: bold;
        }

        .data {
            position: relative;
            top: -5px;
            margin-left: 360px;
            line-height: 10px !important;
        }

        .data-center {
            margin-left: 22%;
        }

        h4 {
            text-align: center;
            font-weight: bold;
        }

        .align-right {
            text-align: right;
        }

        #right {
            position: relative;
            margin-left: 50%;
            margin-top: -5%;
        }

        table,
        th,
        td {
            border: 1px solid #273746;
            border-collapse: collapse;
        }

        table {
            width: 680px;
        }

        th {
            font-weight: normal;
            font-size: 12px;
        }

        td {
            min-width: 50px;
            max-width: 100px;
            font-weight: normal;
            font-size: 12px;
        }

        .article {
            position: relative;
            margin-left: 200px;
            margin-right: 50px;
        }

        .ordena {
            margin-top: 32%;
        }

        .firm {
            margin-top: 50px;
            margin-left: 150px;
            margin-right: 150px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <header>
        <img class="imgHeader1" src="{{ public_path('img/pdf/logo_BC_escudo.png') }}">
        <span class="infoHeader">GOBIERNO DEL ESTADO DE BAJA CALIFORNIIA COMISION ESTATAL DE SERVICIOS PUBLICOS DE
            TIJUANA
            BLVD. FEDERICO BENITEZ #4057, COL. 20 DE NOVIEMBRE</span>
        <img class="imgHeader2" src="{{ public_path('img/pdf/cespt_blanco.png') }}">
    </header>
    {{-- <footer>
        <img src="{{ public_path('img/pdf/logo_BC_escudo.png') }}" width="100%" height="100%" />
    </footer> --}}
    <main>
        <h4 class="text-center">REQUERIMIENTO DE PAGO</h4>
        <div class="data">
            <div class="data-center">
                <p>
                    Crédito número: ________
                </p>
                <p>
                    Oficio: _______ /_______ /20____
                </p>
            </div>
            <p>
                Tijuana, Baja California a __________ de________ de 20___
            </p>
        </div>
        <p class="text-justify">
            <span class="bold"> Nombre:</span> _______________________________________________, propietario y/o
            Usuario y/o Copropietario y/o Representante Legal y/o responsable Solidario y/o Legalmente Interesado.
            <br />
            <span class="bold">Del predio ubicado en:</span> ________________________________________________de
            Tijuana, Baja California.
        </p>
        <p>
            <span class="bold"> Cuenta:</span> _______________
        </p>
        <p id="right">
            <span class="bold"> Tipo de servicio:</span> ________________
        </p>
        <p>
            <span class="bold"> Clave catastral:</span> _______________
        </p>
        <p id="right">
            <span class="bold"> Serie medidor:</span> __________________
        </p>


        <p>
            <span class="bold">Autoridad Emisora: </span>
            <span>Subrecaudación de Rentas adscrita a la Comisión Estatal
                de Servicios Públicos de Tijuana.</span>
        </p>
        <p class="text-justify">La Subrecaudación de Rentas adscrita a la Comisión Estatal de Servicios Públicos de
            Tijuana, hace constar de la remisión del crédito fiscal número ________ de fecha _______________, emitida
            por la
            Comisión Estatal de Servicios Públicos de Tijuana, derivado que el usuario no realizo el pago de los
            derechos de consumo de agua potable, de los períodos del ________________ al ________________ con el objeto
            de que se inicie el procedimiento administrativo de ejecución para obtener la satisfacción del crédito
            fiscal, conforme a las atribuciones y facultades conferidas por los artículos 19, 20 y 21, de la Ley de las
            Comisiones Estatales de Servicios Públicos del Estado de Baja California; artículos 1, 2 fracciones I, II,
            VIII, 3, 7, 13, 14 fracción VIII, 17, 18, 19, 22, 23, 24, 25, 26, 27, 29, 43, 46, 47 fracción XII, 111, 112
            y 114 del Código Fiscal del Estado de Baja California, y en base a: </p>
        <div>
            <ol>
                <li>
                    <p class="text-justify">Que están obligados al pago de las cuotas por consumo de agua todas las
                        personas físicas o morales que sean propietarios, poseedores, particulares, dependencias de los
                        Gobierno Federal, Estatal y Municipal, así como las dependencias Paraestatales, Paramunicipales,
                        Educativas o de Asistencia Pública o Privada que estén conectados a le red hidráulica, así mismo
                        y en forma solidaria, los arrendadores y arrendatarios de predios locales que tengan instaladas
                        tomas, de conformidad con el articulo 9 sección V y Vl de la Ley de Ingresos del Estado de Baja
                        California para el ejercicio fiscal 2023, 16 y 20 de la Ley que Reglamenta el Servicio de Agua
                        Potable en el Estado de Baja California y demás leyes de ingresos aplicables.</p>
                </li>
                <li>
                    <p class="text-justify">
                        Que los derechos por consumo de agua se pagarán mensualmente en la Recaudación Auxiliar de
                        Rentas adscrita a cada uno de los Organismos que presten el servicio, en los establecimientos y
                        en las instituciones bancarias de la localidad autorizados para tal efecto, y están obligados al
                        pago de derechos por consumo de agua las personas físicas, personas morales, dependencias de los
                        Gobiernos Federal, Estatal y Municipal, así como las Entidades Paraestatales, organismos
                        autónomos, Paramunicipales, Educativas o de Asistencia Pública o Privada, independientemente de
                        que en otras Leyes no sean objeto, sujeto, no causen o estén exentos de dichos derechos, lo
                        anterior con fundamento en el artículo 9, Sección V y Vl de la Ley de Ingresos del Estado de
                        Baja California para el ejercicio fiscal del año 2023 y las leyes aplicables de año
                        correspondiente.
                    </p>
                </li>
                <li>
                    <p class="text-justify">
                        Que de conformidad con el artículo 59 y 60 de Ley que Reglamenta el Servicio de Agua Potable
                        en el Estado de Baja California; la lectura de los medidores para determinar la facturación por
                        el consumo del servicio de agua potable en cada predio, giro o establecimiento se hará por
                        períodos mensuales y por el personal del Organismo encargado del servicio o por el que éste
                        determine. La factura por el consumo de agua será entregada en el domicilio que corresponda al
                        predio, giro o establecimiento de la cuenta respectiva, a través de cualquier medio que el
                        Organismo encargado del servicio determine. Los usuarios que por cualquier motivo no reciban las
                        facturas a que se refiere este artículo, deberán solicitarlas en las oficinas recaudadoras
                        adscritas a los Organismos encargados del servicio.
                    </p>
                </li>
                <li>
                    <p class="text-justify">
                        Que el día de _______________ del dos mil_____________, le fue debidamente notificada,
                        determinación y liquidación de crédito de los servicios de agua potable, con número de crédito
                        16 y toda vez que vencido el plazo que le fue conferido por ley, sin que hasta la presente fecha
                        se haya registrado pago alguno a su favor y no obra en nuestros registros recurso administrativo
                        de inconformidad ni escrito para que así convenga de acuerdo a su propio derecho, por
                        consiguiente, el adeudo tiene el carácter de exigible mediante el Procedimiento Administrativo
                        de Ejecución, con fundamento en el artículo 109, 111, 116 y 121 del Código Fiscal del Estado de
                        Baja California.
                    </p>
                </li>
                <li>
                    <p class="text-justify">
                        Que el adeudo actualizado a la fecha de emisión del presente documento se conforma de la
                        siguiente manera:
                    </p>
                </li>
            </ol>
            <table class="text-center">
                <thead>
                    <tr>
                        <th>DESCRIPCIÓN DE
                            CONCEPTO
                        </th>
                        <th>ADEUDO CONSUMO
                            DE AGUA Y ALCANTARILLADO
                        </th>
                        <th>RECARGOS
                        </th>
                        <th>MULTAS</th>
                        <th>GASTOS
                            DE EJECUCIÓN
                        </th>
                        <th>SUSP. DEL SERVICIO
                            OTROS GASTOS
                        </th>
                        <th>CONV.
                            VENCIDOS
                        </th>
                        <th>IMPORTE TOTAL DEL ADEUDO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Totales</td>
                        <td>$</td>
                        <td>$</td>
                        <td>$</td>
                        <td>$</td>
                        <td>$</td>
                        <td>$</td>
                        <td>$</td>
                    </tr>
                    <tr>
                        <td>Total, del adeudo requerido</td>
                        <td>$</td>
                        <td>$</td>
                        <td colspan="5">$</td>
                    </tr>
                </tbody>
            </table>
            <p class="text-justify">
                Por lo reseñado, el C.ELVIA ROSARIO LUQUE BAEZ Subrecaudador de Rentas Adscrita a la Comisión Estatal de
                Servicios Públicos de Tijuana, autoridad que:
            </p>
            <p class="text-center"><span class="bold">O R D E N A</span></p>
            <p class="text-justify">
                <span class="bold">PRIMERO.</span>
                Requiérase a ________________ titular el contrato número _________, ubicado en: ____________,
                __________________, el pago del crédito fiscal a su cargo, que ya ha quedado precisado,
                actualizado junto con los gastos accesorios causados a la fecha de emisión del presente requerimiento de
                pago, otorgándole un plazo de seis días hábiles para que efectué el pago, apercibiéndolo que en caso de
                no realizar el pago se iniciara el procedimiento económico coactivo en su contra, embargando bienes
                suficientes para garantizar el importe del crédito requerido, gastos de ejecución y demás accesorios de
                conformidad con el artículo 114 del Código Fiscal del Estado de Baja California.
            </p>
            <p class="text-justify">
                <span class="bold">SEGUNDO.</span>
                Se designa en términos del artículo 50 fracción X del Reglamento Interno de la Comisión Estatal de
                Servicios Públicos de Tijuana, como notificadores y ejecutores fiscales adscritos a la Comisión Estatal
                de Servicios Públicos de Tijuana, a los CC.
                __________________________________________________________________________________________________________
                __________________________________________________________________________________________________________;
                para que de manera conjunta o separada den cumplimiento a la presente orden, quienes al inicio de la
                diligencia deberán identificarse con la constancia de identificación vigente en la que aparece su
                fotografía y su firma.
            </p>
            <p class="text-justify">
                <span class="bold">TERCERO.</span>
                En el caso de que el titular y/o usuario y/o poseedor y/o representante legal y/o persona
                distinta impidieran materialmente al notificador (es), ejecutor (es) fiscal (es) designado (s) el
                cumplimiento de la presente, podrán solicitar el auxilio de la fuerza pública para llevar a cabo, con
                fundamento en el artículo 95 fracción X inciso a) del Código Fiscal del Estado de Baja California.
            </p>
            <p class="text-justify">
                Así lo resolvió el C. Subrecaudador de Rentas adscrito a la Comisión Estatal de Servicios Públicos de
                Tijuana dependientemente de la Secretaria de Hacienda del Estado de Baja california, con las facultades
                establecidas en el artículo 59 fracción III y párrafo quinto del reglamento interno de la Secretaria de
                Hacienda del Estado de Baja california.
            </p>
            <div class="firm">
                <p class="text-center">
                    ______________________________________________
                    <br />
                    <span class="bold">
                        EL SUBRECAUDADOR DE RENTAS DEL ESTADO ADSCRITO A LA
                        COMISIÓN ESTATAL DE SERVICIOS PÚBLICOS DE TIJUANA.
                    </span>
                </p>
            </div>
        </div>
    </main>

</body>

</html>