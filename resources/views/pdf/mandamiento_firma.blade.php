<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mandamiento</title>
    <link href="C:/wamp64/www/Tijuana-p/public/css/pdf.css" rel="stylesheet">
    <link href="C:/wamp64/www/Tijuana-p/public/css/tablaResumen.css" rel="stylesheet">
</head>

<body>
    <header>
        <img class="imgHeader1" src="{{ public_path('img/pdf/logo_baja_blanco.png') }}">
        <span class="infoHeader">GOBIERNO DEL ESTADO DE BAJA CALIFORNIIA COMISION ESTATAL DE SERVICIOS PUBLICOS DE
            TIJUANA
            BLVD. FEDERICO BENITEZ #4057, COL. 20 DE NOVIEMBRE</span>
        <img class="imgHeader2" src="{{ public_path('img/pdf/cespt_blanco.png') }}">
    </header>
    {{-- <footer>
    </footer> --}}
    <main>
        @foreach ($items as $item)
            <h4 class="text-center">MANDAMIENTO DE EJECUCIÓN</h4>
            <div class="data">
                <div class="data-center">
                    <p>
                        Oficio: <span class="underline">CESPT/EDM/{{ $folio }}/{{ date('Y') }}</span>
                    </p>
                    <p>
                        Crédito número:<span
                            class="bold underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $item->folio }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </p>
                </div>
                <p>
                    Tijuana, Baja California a <span class="underline">{{ $item->fecham }}</span>
                </p>
            </div>
            <p class="text-justify">
                <span class="bold"> Nombre:</span> {{ $item->propietario }}, propietario y/o
                Usuario y/o Copropietario y/o Representante Legal y/o responsable Solidario y/o Legalmente Interesado.
                <br />
                <span class="bold">Del predio ubicado en:</span>{{ $item->domicilio }} de
                Tijuana, Baja California.
            </p>
            <p>
                <span class="bold"> Cuenta:</span> {{ $item->cuenta }}
            </p>
            <p id="right">
                <span class="bold"> Tipo de servicio:</span> <span>{{ $item->tipo_s }}</span>
            </p>
            <p>
                <span class="bold"> Clave catastral:</span> {{ $item->clavec }}
            </p>
            <p id="right">
                <span class="bold"> Serie medidor:</span> {{ $item->seriem }}
            </p>


            <p>
                <span class="bold">Autoridad Emisora: </span>
                <span>Subrecaudación de Rentas adscrita a la Comisión Estatal
                    de Servicios Públicos de Tijuana.</span>
            </p>
            <p class="text-justify">Tijuana, Baja California a <span class="bold">{{ $fechamanda }}</span>
                esta
                Subrecaudacion de
                Rentas adscrita a la Comisión Estatal de Servicios Públicos de Tijuana, da cuenta de la remisión del
                crédito
                fiscal determinado por la citada Comisión Estatal, de la que se desprende que la cuenta
                {{ $item->cuenta }}
                a nombre de {{ $item->propietario }} a la fecha no se ha cubierto el pago de la liquidación número
                {{ $item->folio }} de fecha {{ $item->fecham }}; esta autoridad en ejercicio de
                los
                artículos 6, 59 primer párrafo, fracción III, segundo párrafo del Reglamento Interno de la Secretaría de
                Hacienda del Estado de Baja California, así como con fundamento en los artículos 1,2 fracciones I, II,
                VIII,
                X; 3, 7, 13, 14 fracción VIII, IX; 17, 18, 19, 22, 23, 24, 25, 26, 27, 29, 43, 46 fracciones II, inciso
                F),
                VI, 47 fracción XII, 111, 112, 114, 115, 123 y demás aplicables del código fiscal del Estado de Baja
                California en vigor, y en base a los siguientes:</p>
            <div>
                <p class="text-center"><span class="bold">R E S U L T A N D O S</span></p>
                <ol style="list-style-type:upper-roman">
                    <li>
                        <p class="text-justify">Que están obligado a la contratación de los servicios de agua potable y
                            alcantarillado sanitario en los
                            lugares en que existan dichos servicios; los propietarios o poseedores de predios
                            edificados;
                            los
                            propietarios o poseedores de giros mercantiles e industriales y de cualquier otro
                            establecimiento que
                            por
                            naturaleza, o de acuerdo con las leyes y reglamentos, estén obligados al uso del agua; los
                            propietarios
                            o
                            poseedores de predios no edificados, en los que sea obligatorio conforme a las leyes y
                            reglamentos,
                            hacer
                            uso de agua; los poseedores de predios, cuando la posesión se derive de contratos de
                            compra-venta en que
                            los
                            propietarios se hubieren reservado el dominio del predio, conforme al artículo 3 de la Ley
                            que
                            Reglamenta el
                            Servicio de Agua Potable en el Estado de Baja California.</p>
                    </li>
                    <li>
                        <p class="text-justify">
                            Que es obligatorio para los usuarios la instalación de aparatos medidores para la
                            verificación del consumo de agua del servicio público en predios, giros o establecimientos,
                            Los
                            aparatos medidores sólo podrán ser instalados y retirados por personal del Organismo
                            encargado
                            del servicio o por el que este determine, previa la verificación de su correcto
                            funcionamiento,
                            y retirados por el mismo personal cuando hayan sufrido daños, funcionen defectuosamente o
                            exista
                            cualquiera otra causa justificada que amerite su retiro. Una vez instalado un aparato
                            medidor,
                            no podrá variarse su colocación o cambiarse de lugar, sin la previa autorización del
                            Organismo
                            encargado del servicio. Lo anterior con fundamento en los artículos 54, 55 de la Ley que
                            Reglamenta el Servicio de Agua Potable en el Estado de Baja California.
                        </p>
                    </li>
                    <li>
                        <p class="text-justify">
                            Que están obligados al pago de las cuotas por consumo de agua todas las personas físicas o
                            morales que sean propietarios, poseedores, particulares, dependencias de los Gobierno
                            Federal,
                            Estatal y Municipal, así como las dependencias Paraestatales, Paramunicipales, Educativas o
                            de
                            Asistencia Pública o Privada que estén conectados a la red hidráulica, así mismo y en forma
                            solidaria, los arrendadores y arrendatarios de predios locales que tengan instaladas tomas,
                            de
                            conformidad con los artículos 16 y 20 de la Ley que Reglamenta el Servicio de Agua Potable
                            en el
                            Estado de Baja California y artículo 9, sección V y Vl, de la Ley de Ingresos del Estado de
                            Baja
                            California para el ejercicio fiscal del año 2023 y demás leyes de ingresos aplicables al año
                            fiscal.
                        </p>
                    </li>
                    <li>
                        <p class="text-justify">
                            Los derechos por consumo de agua y alcantarillado se pagarán mensualmente en la Recaudación
                            Auxiliar de Rentas adscrita cada uno de los a Organismos que presten el servicio, en los
                            establecimientos y en las instituciones bancarias de la localidad autorizados para tal
                            efecto, y
                            están obligados al pago de derechos por consumo de agua las personas físicas, personas
                            morales,
                            dependencias de los Gobiernos Federal, Estatal y Municipal, así como las Entidades
                            Paraestatales, organismos autónomos, Paramunicipales, Educativas o de Asistencia Pública o
                            Privada, independientemente de que en otras Leyes no sean objeto, sujeto, no causen o estén
                            exentos de dichos derechos, lo anterior con fundamento en el artículo 9 sección V y Vl de la
                            Ley
                            de Ingresos del Estado de Baja California para el ejercicio fiscal del año 2023 y las
                            correspondientes al año fiscal aplicable
                        </p>
                    </li>
                    <li>
                        <p class="text-justify">
                            Que de conformidad con el artículo 59 y 60 de Ley que Reglamenta el Servicio de Agua Potable
                            en el Estado de Baja California; La lectura de los medidores para determinar la facturación
                            por
                            el consumo del servicio de agua potable en cada predio, giro o establecimiento, se hará por
                            períodos mensuales y por el personal del Organismo encargado del servicio o por el que éste
                            determine. La factura por el consumo de agua será entregada en el domicilio que corresponda
                            al
                            predio, giro o establecimiento de la cuenta respectiva, a través de cualquier medio que el
                            Organismo encargado del servicio determine. Los usuarios que por cualquier motivo no reciban
                            las
                            facturas a que se refiere este artículo, deberán solicitarlas en las oficinas recaudadoras
                            adscritas a los Organismos encargados del servicio.
                        </p>
                    </li>
                    <li>
                        <p class="text-justify">
                            Que el día {{ $fechadeterminacion }}, fue
                            debidamente notificada,
                            determinación y liquidación de crédito de los servicios de agua potable, con número de
                            crédito {{ $item->folio }}, de fecha {{ $item->fechad }} emitido por
                            la Comisión Estatal de Servicios Públicos de Tijuana, otorgándole un plazo de 6 días hábiles
                            siguientes para realizar el pago.
                        </p>
                    </li>
                    <li>
                        <p class="text-justify">
                            Que el día {{ $item->fechanr }} le fue debidamente notificado
                            Requerimiento de Pago y toda vez que vencido el plazo que le fue conferido por ley, sin que
                            hasta la presente fecha se haya registrado pago alguno a su favor y no obra en nuestros
                            registros recurso administrativo de inconformidad ni escrito que para sí convenga de acuerdo
                            a
                            su propio derecho, por consiguiente, el adeudo tiene el carácter de exigible mediante el
                            Procedimiento Administrativo de Ejecución, con fundamento en el artículo 109 al 145 del
                            Código
                            Fiscal del Estado de Baja California.
                        </p>
                    </li>
                </ol>
                <p class="text-center"><span class="bold">C O N S I D E R A N D O</span></p>
                <p class="text-justify">
                    <span class="bold">PRIMERO.</span>
                    Que la Subrecaudacion de Rentas adscrita a la Comisión Estatal de Servicios Públicos de Tijuana es
                    competente para ordenar el cobro coactivo del crédito fiscal mediante del procedimiento
                    administrativo de ejecución de conformidad con el artículo los artículos 19, 20 y 21, de la Ley de
                    las Comisiones Estatales de Servicios Públicos del Estado de Baja California; artículos 1, 2
                    fracciones I, II, VIII 3, 7, 13, 14 fracción VIII 17, 18, 19, 22, 23, 24, 25, 26, 27, 29, 43, 46, 47
                    fracción XII, 111, 112, 114 y 115 del Código Fiscal del Estado de Baja California.
                </p>
                <p class="text-justify">
                    <span class="bold">SEGUNDO.</span>
                    Que el objeto del presente mandamiento de ejecución es exigir el pago del crédito fiscal
                    número {{ $item->folio }} no satisfecho dentro del plazo que fue otorgado, a través Procedimiento
                    Administrativo de Ejecución, requiriendo al deudor el pago total de su adeudo con los accesorios
                    legales, apercibiéndole que en el caso de no hacerlo en el acto se le embargarán bienes suficientes
                    de
                    su propiedad para rematarlos, enajenarlos fuera de subasta o adjudicarlos fuera de subasta o
                    adjudicarlos a favor del fisco de conforme a lo que establece con el artículo 152, 153, 154, 155,
                    156,
                    157, 158, 159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176,
                    177,
                    178, 179 y 180 del Código Fiscal del Estado de Baja California.
                </p>
                @if ($ejecutores == 'none')
                    <p class="text-justify">
                        <span class="bold">TERCERO.</span>
                        Para dar cumplimiento del presente mandamiento en términos del artículo 50 fracción X del
                        Reglamento
                        Interno de la Comisión Estatal de Servicios Públicos de Tijuana se designan con el cargo de
                        verificador,
                        notificador y ejecutor por esta Subrecaudacion de Rentas Adscrita a la Comisión Estatal de
                        Servicios
                        Públicos de Tijuana, a los CC.
                        __________________________________________________________________________________________________________
                        para que de manera conjunta o separada den cumplimiento al presente mandamiento de ejecución,
                        quienes al inicio de la diligencia deberán identificarse al momento de la diligencia con la
                        constancia de identificación vigente
                        en la que aparece su fotografía y su firma y deberán levantar acta pormenorizada de la que se
                        entregará
                        copia a la persona con quien se entienda la misma.
                    </p>
                @endif
                @if ($ejecutores != 'none')
                    <p class="text-justify">
                        <span class="bold">TERCERO.</span>
                        Para dar cumplimiento del presente mandamiento en términos del artículo 50 fracción X del
                        Reglamento
                        Interno de la Comisión Estatal de Servicios Públicos de Tijuana se designan con el cargo de
                        verificador,
                        notificador y ejecutor por esta Subrecaudacion de Rentas Adscrita a la Comisión Estatal de
                        Servicios
                        Públicos de Tijuana, a los CC.
                        {{$ejecutores}}
                        para que de manera conjunta o separada den cumplimiento al presente mandamiento de ejecución,
                        quienes al inicio de la diligencia deberán identificarse al momento de la diligencia con la
                        constancia de identificación vigente
                        en la que aparece su fotografía y su firma y deberán levantar acta pormenorizada de la que se
                        entregará
                        copia a la persona con quien se entienda la misma.
                    </p>
                @endif
                <p class="text-justify">
                    Por lo reseñado, el C. {{ $item->sobrerecaudador }} Subrecaudador de Rentas adscrito a la
                    Comisión Estatal de Servicios Públicos de Tijuana, autoridad que:
                </p>
                <div class="ordena">
                    <p class="text-center"><span class="bold">O R D E N A</span></p>
                    <p class="text-justify">
                        <span class="bold">PRIMERO.</span>
                        Requiérase a {{ $item->propietario }}, titular el contrato número {{ $item->folio }},
                        ubicado en: {{ $item->domicilio }}, el pago del crédito fiscal a su
                        cargo,
                        que ya ha quedado precisado, actualizado junto con los gastos accesorios causados a la fecha de
                        emisión
                        del presente mandamiento de ejecución, apercibiéndolo que en caso de no acreditar haber
                        efectuado
                        pago
                        del crédito fiscal al momento de practicar la diligencia de requerimiento de pago, se procederá
                        de
                        inmediato al embargo de bienes suficientes para obtener el importe de (los) crédito (s) y sus
                        accesorios
                        a través del remate de los mismos o el embargo de las negociaciones con todo lo que de hecho y
                        por
                        derecho les corresponda, a fin de obtener mediante su intervención, los ingresos necesarios que
                        permitan
                        satisfacer el crédito fiscal y los accesorios legales, de acuerdo a la liquidación de adeudo que
                        en
                        seguida se detalla:
                    </p>
                    <p class="bold">I. LIQUIDACIÓN DE LOS SERVICIOS DE AGUA POTABLE. </p>
                    <p class="text-justify">
                        Considerando que el contribuyente no realizo el pago de los derechos de consumo de agua potable,
                        por
                        los
                        períodos del {{ $item->periodo }}, la cantidad que deberá cubrir por periodo será
                        de
                        acuerdo al tipo de servicio contratado y a las tarifas que le correspondan, según las leyes de
                        ingresos
                        para la municipalidad de Tijuana, publicadas en el Periódico Oficial del Gobierno de Estado de
                        Baja
                        California, como se detalla a continuación:
                    </p>
                    <table class="table">
                        <thead>
                            <tr class="tr">
                                <th class="th">
                                    <h6>Meses de adeudo</h6>
                                </th>
                                <th class="th">
                                    <h6>Periodo de consumo facturado</h6>
                                </th>
                                <th class="th">
                                    <h6>Fecha de vencimiento</h6>
                                </th>
                                <th class="th">
                                    <h6>Lectura facturada en m3</h6>
                                </th>
                                <th class="th">
                                    <h6>Tarifa art. 11 enciso a)</h6>
                                </th>
                                <th class="th">
                                    <h6>
                                        Tarifa art. 11 excedente del básico en m3 de la Ley de Ingresos del
                                        Estado de Baja
                                        <br />
                                        California ejercicios fiscales anteriores al 2020;
                                        actualmente art 10.
                                    </h6>
                                </th>
                                <th class="th">
                                    <h6>Suma de tarifas</h6>
                                </th>
                                <th class="th">
                                    <h6>
                                        Factor de actualización (capítulo I Ley de Ingresos vigente a la
                                        fecha de facturación)
                                    </h6>
                                </th>
                                <th class="th">
                                    <h6>Saldo Atraso</h6>
                                </th>
                                <th class="th">
                                    <h6>Saldo Rezago</h6>
                                </th>
                                <th class="th">
                                    <h6>
                                        Total del periodo facturado (ley de ingresos vigente a la
                                        <br />
                                        fecha de la facturación)
                                    </h6>
                                </th>
                                <th class="th">
                                    <h6>
                                        Tasa de interés por adeudo mensual vencido
                                        (artículo 37 ley de ingresos del estado)
                                    </h6>
                                </th>
                                <th class="th">
                                    <h6>
                                        Importe mensual por concepto de recargos (adeudo del periodo
                                        <br />
                                        facturado x tasa de interés por adeudo mensual vencido)
                                    </h6>
                                </th>
                                <th class="th">
                                    <h6>
                                        Recargos acumulados por mensualidades vencidas
                                        <br />
                                        (meses de adeudo x importe mensual por concepto de recargos )
                                        <br />este importe no puede ser mayor al adeudo del periodo facturado
                                    </h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            @foreach ($tabla as $item)
                                <tr class="tr">
                                    <td class="td">{{ $i+=1 }}</td>
                                    <td class="td">{{ $item->periodo }}</td>
                                    <td class="td">{{ $item->fecha_vto }}</td>
                                    <td class="td">{{ $item->lecturaFacturada }}</td>
                                    <td class="td">${{ number_format($item->tarifa1, 2) }}</td>
                                    <td class="td">${{ number_format($item->tarifa2, 2) }}</td>
                                    <td class="td">${{ number_format($item->sumaTarifas, 2) }}</td>
                                    <td class="td">{{ number_format($item->factor, 4) }}</td>
                                    <td class="td">${{ number_format($item->saldoAtraso, 2) }}</td>
                                    <td class="td">${{ number_format($item->saldoRezago, 2) }}</td>
                                    <td class="td">${{ number_format($item->totalPeriodo, 2) }}</td>
                                    <td class="td">2.25</td>
                                    <td class="td">${{ number_format($item->importeMensual, 2) }}</td>
                                    <td class="td">${{ number_format($item->RecargosAcumulados, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-justify">
                        Ahora bien, por la práctica de la diligencia de requerimiento de pago y embargo que aquí se
                        ordena
                        realizar el contribuyente deudor está obligado al pago de gastos de ejecución, de conformidad
                        con el
                        artículo 145 del Código Fiscal del Estado de Baja California, que señala lo siguiente:
                    </p>
                    <div class="article">
                        <p class="text-justify">
                            ARTICULO 145.- Los gastos de ejecución, por cada una de las siguientes diligencias, se
                            determinarán
                            y harán efectivos por las autoridades ejecutoras conjuntamente con el crédito fiscal, a
                            razón de
                            un
                            2% sobre el monto del crédito, y en ningún caso serán menores al equivalente a una Unidad de
                            Medida
                            y Actualización fiaría vigente.
                            <br />
                            I.- Por el requerimiento señalado en el último párrafo del Artículo 114, de éste Código.
                            <br />
                            II.- Por el Embargo.
                            <br />
                            III.- Por el remate, enajenación fuera de remate o adjudicación del Estado.
                            <br />
                            Los honorarios de los interventores con cargo a la caja y de los administradores se
                            determinarán
                            discrecionalmente por las autoridades fiscales, tomando en consideración el monto del
                            crédito
                            fiscal
                            adeudado y la situación económica del deudor.
                        </p>
                    </div>
                    <p class="text-justify">
                        Considerando lo anterior se hace el cálculo de los gastos de ejecución, quedando de la siguiente
                        manera:
                    </p>
                    <table>
                        <thead>
                            <tr>
                                <th>TIPO DE DILIGENCIA</th>
                                <th>IMPORTE DEL CREDITO Fiscal</th>
                                <th>PORCENTAJE POR GASTOS DE EJECUCIÓN</th>
                                <th>IMPORTE DE LOS GASTOS DE EJECUCIÓN CONSIDERANDO EL IMPORTE MÍNIMO.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Requerimiento de pago</td>
                                <td class="text-center">${{ number_format($pagor, 2) }}</td>
                                <td class="text-center">2%</td>
                                <td class="text-center">${{ number_format($totalr, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="text-center">Embargo</td>
                                <td class="text-center">${{ number_format($pagoe, 2) }}</td>
                                <td class="text-center">2%</td>
                                <td class="text-center">${{ number_format($totale, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="bold">TOTAL, DEL ADEUDO REQUERIDO</p>

                    <p>
                        De acuerdo con el cálculo detallado, el importe actualizado a la emisión del presente
                        instrumento
                        queda
                        integrado como se muestra a continuación:
                    </p>
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
                                <td>${{ number_format($t_adeudo_t->totalPeriodo, 2) }}</td>
                                <td>${{ number_format($t_adeudo_t->RecargosAcumulados, 2) }}</td>
                                <td>${{ number_format($multas, 2) }}</td>
                                <td>${{ number_format($gastos_ejecucion, 2) }}</td>
                                <td>${{ number_format($item->otros_gastos, 2) }}</td>
                                <td>${{ number_format($item->conv_vencido, 2) }}</td>
                                <td>${{ $total_ar }}</td>
                            </tr>
                            <tr>
                                <td class="text-center"> Total del adeudo requerido</td>
                                <td class="text-center font-weight-bold" colspan="7" style="font-weight: bold">
                                    ${{ $total_ar }} {{ $tar }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-justify">
                        <span class="bold">SEGUNDO.</span>
                        Se le informa al deudor que mientras no se finque el remate, podrá realizar el pago de las
                        cantidades
                        reclamadas, de los vencimientos ocurridos y de los gastos de ejecución en Blvd. Federico Benítez
                        López
                        4057, 20 de Noviembre, 22430 Tijuana, Baja California, en cuyo caso la Autoridad Fiscal dará por
                        terminado el procedimiento administrativo de ejecución y se levantará el embargo registrado de
                        conformidad con el artículo 169 del Código Fiscal del Estado de Baja California.
                    </p>
                    <p class="text-justify">
                        <span class="bold">TERCERO.</span>
                        En caso de que el contribuyente deudor o cualquier otra persona impidieran materialmente al
                        (los)
                        verificador (es), notificador (es), ejecutor (es) designado (s) el acceso al domicilio del
                        contribuyente
                        deudor para llevar adelante la diligencia antes indicada siempre que el caso lo requiera, el
                        ejecutor
                        solicitará el auxilio de la fuerza pública para llevar adelante el procedimiento de ejecución,
                        con
                        fundamento en el artículo 95 fracción X inciso “a” del Código Fiscal del Estado.
                    </p>
                    <p class="text-justify">
                        <span class="bold">CUARTO.</span>
                        En el caso de que la persona con quien se entienda la diligencia de embargo no abriere las
                        puertas
                        de
                        los inmuebles o construcciones señalados para la traba o donde se presuma que existen bienes
                        muebles
                        embargables, el ejecutor, previo acuerdo fundado del jefe de la oficina ejecutora, hará que,
                        ante
                        dos
                        testigos, sean rotas las cerraduras que fueren necesarias romper, según el caso, para que el
                        depositario
                        tome posesión del inmueble o para que siga adelante la diligencia, conforme el artículo 95 y
                        demás
                        aplicables del código fiscal del Estado de Baja California.
                    </p>
                    <p class="text-justify">
                        <span class="bold">QUINTO.</span>
                        Se le indica que el presente acto es susceptible de impugnarse mediante recurso de inconformidad
                        con
                        el
                        artículo 181 del Código Fiscal del Estado de Baja California, el recurso de revocación ante esta
                        autoridad o juicio contencioso administrativo en contra de la presente resolución, ante el
                        Tribunal
                        Estatal de Justicia Administrativa del Estado de Baja California, de conformidad con lo previsto
                        en
                        el
                        último párrafo del artículo 45 de la Ley del Tribunal Estatal de Justicia Administrativa de Baja
                        California, en tratándose de algunas de las materias a que se refiere el artículo 2º del citado
                        ordenamiento legal.
                    </p>
                    <div class="saltopagina"></div>
                    <p class="text-justify">
                        <span class="bold">SEXTO.</span>
                        Esta autoridad no omite manifestarle que el embargo podrá ampliarse en cualquier momento del
                        procedimiento administrativo de ejecución, cuando la oficina ejecutora estime que los bienes
                        embargados
                        son insuficientes para cubrir los créditos fiscales conforme al Código Fiscal del Estado de Baja
                        California.
                    </p>
                    <p>
                        <span class="bold">
                            Notifíquese y cúmplase.
                        </span>
                    </p>
                    <p>
                        <span class="bold">
                            Así lo acordó y firma el Subrecaudador de Rentas adscrito a la Comisión Estatal de
                            Servicios Públicos de
                            Tijuana.
                        </span>
                    </p>
                </div>
                <div class="firm">
                    <p class="text-center">
                        ______________________________________________
                        <br />
                        <span class="bold">
                            EL C. {{ $sobrerecaudador }} SUBRECAUDADOR DE RENTAS ADSCRITA A LA COMISIÓN
                            ESTATAL DE SERVICIOS PÚBLICOS DE TIJUANA
                        </span>
                    </p>
                </div>
            </div>
        @endforeach
    </main>
    {{-- <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "lighter");
                $pdf->text(270, 800, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 9);
            ');
        }
    </script> --}}
</body>

</html>