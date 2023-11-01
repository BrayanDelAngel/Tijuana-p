<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mandamiento</title>
    <link href="../../../public/css/pdf.css" rel="stylesheet">
    <link href="../../../public/css/pdf.css" rel="stylesheet">

    <link href="D:/Plesk/Vhosts/gallant-driscoll.198-71-62-113.plesk.page/httpdocs/implementta/modulos/Tijuana-p/public/css/pdf.css" rel="stylesheet">
    <link href="D:/Plesk/Vhosts/gallant-driscoll.198-71-62-113.plesk.page/httpdocs/implementta/modulos/Tijuana-p/public/css/tablaResumen.css" rel="stylesheet">
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
                        Crédito fiscal número: <span
                            class="">CESPT/EDM/{{ $folio }}/{{ date('Y') }}</span>
                    </p>
                </div>
            </div>
            <p class="text-justify">
                <span class="bold"> Nombre:</span> {{ $item->propietario }}
            </p>
            <p class="text-justify">
                <span class="bold"> Domicilio:</span> {{ $item->domicilio }}
            </p>
            <p>
                <span class="bold"> Cuenta:</span> {{ $item->cuenta }}
            </p>
            <p>
                <span class="bold"> Clave catastral:</span> {{ $item->clavec }} con la que fue contratado el servicio.
            </p>
            <p>
                <span class="bold">Autoridad Emisora: </span>
                <span>Subrecaudación de Rentas adscrita a la Comisión Estatal de Servicios Públicos de Tijuana.</span>
            </p>
            <p class="text-justify">
                En la ciudad de Tijuana, Baja California a los {{ $fechamanda }}; esta Subrecaudacion de Rentas
                adscrita a la Comisión Estatal de Servicios Públicos de
                Tijuana, da cuenta del estado que guarda el crédito fiscal <span
                    class="">CESPT/EDM/{{ $folio }}/{{ date('Y') }}</span> determinado en cantidad
                líquida y notificado al deudor por la citada Comisión; así como del requerimiento de pago
                numero {{ $folio }} emitido por esta autoridad y su notificación; de los cuales se advierte que
                a
                la fecha no ha realizado el pago del mismo; por lo que, en ejercicio de las atribuciones y facultades
                conferidas en los artículos 1, fracciones l, ll y V y 3 del Acuerdo Delegatorio de Facultades en materia
                fiscal publicado en el diario oficial del estado de Baja California el día 04 de marzo del 2005, en
                relación con lo preceptuado en el artículo 21 párrafo segundo de la Ley de las Comisiones Estatales de
                Servicios Públicos del Estado de Baja California; 14 BIS,109, 111,112,114 segundo párrafo y demás
                relativos y aplicables del Código Fiscal del Estado de Baja California; artículo 59, fracción lll,
                primero y segundo párrafo del Reglamento Interno de la Secretaria de Hacienda del Estado de Baja
                California, <span class="bold">se ordena</span> requerir el pago del crédito fiscal referido, tomando
                en cuenta las siguientes
                consideraciones:
            </p>
            <ol>
                <li>
                    <p class="text-justify">Que el artículo 2 de la Ley de las Comisiones Estatales de Servicios
                        Públicos del Estado de Baja California, en su fracción V, prevé, como función de la misma (entre
                        otras), la determinación de créditos fiscales y recaudación de los derechos, aprovechamientos y
                        contribuciones de mejoras que conforme a las Leyes aplicables y a los Convenios que celebren,
                        les correspondan. Por su parte, su correlativo 21, precisa que la obligación de pago de las
                        cuotas por consumo de agua y por realización de las obras que ejecute la Comisión y sus
                        accesorios, tendrá el carácter de fiscal; que corresponde a la Comisión la determinación de los
                        créditos y de las bases para su liquidación, la fijación de la cantidad líquida y su percepción
                        y que, respecto de las cantidades que no hubieren sido cubiertas directamente a la Comisión, el
                        cobro se realizará por conducto de las Oficinas Subrecaudadoras de Rentas adscritas a la
                        Comisión, conforme al Código Fiscal del Estado, las que podrán hacer uso del procedimiento
                        económico-coactivo.</p>
                </li>
                <li>
                    <p class="text-justify">
                        Que el artículo 17 de la Ley que Reglamenta el Servicio de Agua Potable en el Estado de Baja
                        California, precisa que, cuando no se cubran los derechos en el plazo otorgado, su pago y el de
                        los accesorios legales respectivos, se hará efectivo en las condiciones y términos que
                        establezcan la Ley de las Comisiones Estatales de Servicios Públicos del Estado de Baja
                        California y la legislación fiscal del Estado de Baja California.
                    </p>
                </li>
                <li>
                    <p class="text-justify">
                        Que el artículo 22 del Código Fiscal del Estado de Baja California precisa que la obligación
                        nace cuando se realizan las situaciones jurídicas o de hecho, previstas en las leyes fiscales y
                        que dicha obligación se determinará y liquidará conforme a las disposiciones vigentes en el
                        momento de su nacimiento, pero le serán aplicables las normas sobre procedimientos que se
                        expidan con posterioridad. Por su parte, el correlativo 23 define al crédito fiscal como la
                        obligación determinada en cantidad líquida que tiene derecho a percibir el Estado o sus
                        organismos descentralizados que provengan de contribuciones o de sus accesorios.
                    </p>
                </li>
                <li>
                    <p class="text-justify">
                        Que la Comisión remitió a esta Subrecaudacion para su cobro, el crédito fiscal
                        numero {{ $folio }}; así como su notificación realizada el día
                        {{ $fechadeterminacion }}; en virtud de que el deudor incumplió con la obligación de pago
                        dentro del plazo que le fuera concedido.
                    </p>
                </li>
                <li>
                    <p class="text-justify">
                        Que el día {{ $fecharequi }}, esta autoridad emitió requerimiento de pago
                        numero {{ $folio }}; en relación al crédito fiscal aludido, en términos de los artículos
                        111 y 114 primer párrafo del Código Fiscal del Estado de Baja California; otorgándole plazo de
                        seis días hábiles para el pago del adeudo; ordenando su notificación y apercibimiento,
                        consistente en que para el caso de no realizar dicho pago, se iniciaría el procedimiento
                        administrativo de ejecución en su contra.
                    </p>
                </li>
                <div class="saltopagina"></div>
                <li>
                    <p class="text-justify">
                        Que del acta de notificación remitida por el notificador designado en el requerimiento de pago
                        que nos ocupa, se desprende que en fecha {{ $fechanr }} le fué notificado el
                        requerimiento en cuestión y atendido el apercibimiento ahí contenido; siendo el caso que, a la
                        fecha, han transcurrido en exceso el plazo de seis días que le fuere otorgado sin que hubiese
                        realizado el pago total o celebrado convenio; por lo que, se le hace efectivo el apercibimiento
                        de marras, dando inicio al procedimiento administrativo de ejecución en su contra.
                    </p>
                </li>
                <li>
                    <p class="text-justify">
                        Que el artículo 109 del Código Fiscal del Estado de Baja California define al Procedimiento
                        Administrativo de Ejecución como el conjunto de normas que regulan el ejercicio de la facultad
                        económica-coactiva y que este, es preferente a las acciones de cualesquiera otras personas
                        físicas o morales.
                    </p>
                </li>
                <li>
                    <p class="text-justify">
                        Que el artículo 144 del Código Fiscal del Estado de Baja California, en su fracción I, establece
                        como gastos de ejecución, los honorarios de los notificadores, ejecutores, depositarios,
                        peritos, interventores con cargo a la caja y administradores y su correlativo 145 precisa que
                        los gastos de ejecución se determinaran y harán efectivos por las autoridades ejecutoras
                        conjuntamente con el crédito fiscal, a razón del 2% sobre el monto del crédito y que en ningún
                        caso, estos pueden ser menores al equivalente a una Unidad de Medida y Actualización vigente.
                    </p>
                </li>
                <li>
                    <p class="text-justify">
                        Así entonces, al actualizarse el supuesto contenido en el párrafo segundo del artículo 114 del
                        Código Fiscal del Estado de Baja California, consistente en que si el deudor no efectúa el pago
                        dentro del término de seis días, esta autoridad fiscal se encuentra facultada para dictar
                        mandamiento de ejecución en el que de nueva cuenta se requiera al deudor de pago, y que para el
                        caso de no hacerlo en el momento de la diligencia, se proceda al embargo de bienes suficientes
                        para garantizar el importe del crédito requerido, gastos de ejecución y demás accesorios; por lo
                        que, resulta procedente:
                    </p>
                </li>
            </ol>
            <p class="text-justify">
                <span class="bold">PRIMERO.</span>
                Con la facultad prevista en la fracción V del artículo 1º. del Acuerdo Delegatorio de Facultades
                publicado en el periódico oficial del Estado de fecha 04 de marzo de 2005 y para dar cumplimiento a lo
                anteriormente señalado, se designa como NOTIFICADOR(ES)-EJECUTOR(ES) del presente mandamiento, al (los)
                C.C.______________________________________
                y _____________________________________________; con nombramiento(s) de fecha _________________________, para
                que de manera conjunta o separada, den cumplimiento a la presente orden; quien(es) al inicio de la
                diligencia deberá(n) identificarse con la constancia de nombramiento vigente en la que aparece su
                fotografía y su firma y que lo(s) acredita como notificadores-ejecutores adscritos a esta Subrecaudacion
                de la Comisión Estatal de Servicios Públicos de Tijuana.

            </p>
            <p class="text-justify">
                <span class="bold">SEGUNDO.</span>
                Constitúyanse pues, en el domicilio indicado del deudor; requiriéndole en el acto de la diligencia por
                el pago del crédito fiscal determinado en cantidad líquida por la Comisión Estatal de Servicios Públicos
                de Tijuana y que corresponde a:
            </p>
            <table class="text-center">
                <thead>
                    <tr>
                        <th>
                            CONCEPTO
                        </th>
                        <th>
                            ADEUDO POR
                            CONSUMO
                            DE AGUA
                            (Período 11-febrero-2004 al 21-octubre-2022
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
                            ${{ $total_ar }}
                            <br />
                            {{ $tar }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <p class="text-justify">
                <span class="bold">TERCERO.</span>
                Apercíbale al deudor que de no pagar el crédito fiscal liquidado en el momento de la diligencia,
                procederá a embargar bienes suficientes para garantizar el importe del crédito fiscal requerido, gastos
                de ejecución y demás accesorios; debiéndose ajustar para ello, a lo indicado por los artículos
                121,122,123,124,125,126,127,128,129,130,131,132 y 138 del Código Fiscal del Estado.
            </p>
            <p class="text-justify">
                Por otra parte, esta autoridad no omite manifestar al deudor:
            </p>
            <p class="text-justify">
                a)
                .-Que, de acuerdo a lo previsto en el artículo 139 del Código Fiscal del Estado de Baja California, el
                embargo podrá ampliarse en cualquier momento del procedimiento de ejecución, cuando del avalúo resulte
                que los bienes embargados son insuficientes para garantizar las prestaciones fiscales insolutas y los
                vencimientos inmediatos.
            </p>
            <p class="text-justify">
                b).-Que con fundamento en lo previsto en el artículo 140 del Código Fiscal, se hace del conocimiento del
                deudor, y/o atendiente, y/o, cualesquier persona que impidan materialmente al ejecutor el acceso al
                domicilio o al lugar en que se encuentren bienes susceptibles de embargo, este se encuentra facultado
                para solicitar el auxilio de la fuerza pública, a fin de llevar adelante la diligencia de ejecución y
                con apoyo en el correlativo 141, se le hace saber al deudor que si durante el secuestro administrativo,
                la persona con quien se entienda la diligencia no abre las puertas de las construcciones, edificios o
                casas que se embarguen o donde existen bienes muebles embargables; el (los) ejecutor(es) aquí
                designado(s), previo acuerdo dictado por esta autoridad, se encuentra facultado para que, ante dos
                testigos, proceda a romper las cerraduras, a fin de que el depositario que designe tome posesión de los
                bienes y prosiga la diligencia. De igual modo procederá el ejecutor, cuando la persona con quien se
                entienda la diligencia no abriere los muebles que aquel suponga guarden dinero, alhajas, objetos de arte
                y otros bienes embargables. Si no fuere factible romper o forzar las cerraduras, la traba del embargo se
                realizara en términos del segundo párrafo del artículo 141 en cuestión.
            </p>
            <div class="saltopagina"></div>
            <br/>
            <br/>
            <p class="text-justify">
                c).- Con base a lo previsto en el artículo 152 del Código en cita, se le comunica que una vez
                transcurridos quince días hábiles posteriores a la práctica del embargo, se procederá al remate de los
                bienes embargados; no obstante, mientras no se finque el remate, el deudor podrá realizar el pago de las
                cantidades reclamadas, de los vencimientos ocurridos y de los gastos de ejecución, en Boulevard Federico
                Benítez López 4057, Colonia 20 de Noviembre, C.P.22430, Tijuana, Baja California; en cuyo caso, esta
                autoridad fiscal dará por terminado el procedimiento administrativo de ejecución y levantará el embargo
                trabado, de conformidad con el artículo 169 del Código Fiscal del Estado de Baja California.
            </p>
            <p class="text-justify">
                d).- Por el presente, queda enterado que, de manera optativa, podrá interponer de conformidad con el
                artículo 181 del Código Fiscal del Estado de Baja California, el recurso administrativo de revocación
                ante la Procuraduría Fiscal del Estado o bien, juicio, ante el Tribunal Estatal de Justicia
                Administrativa del Estado de Baja California.
            </p>
            <p class="text-justify">
                <span class="bold">NOTIFIQUESE PERSONALMENTE Y CUMPLASE,</span> en términos de los artículos 68
                fracción I, 68 BIS, 69,
                70,71,72,73,74,75, 76 y 121 todos, del Código Fiscal del Estado de Baja California.
            </p>
            <p class="text-justify">
                Así lo resolvió la C. Subrecaudadora de Rentas adscrita a la Comisión Estatal de Servicios Públicos de
                Tijuana a los {{$item->fecham}}; con nombramiento bajo oficio 0000282, de
                fecha 27 de febrero de 2023; realizado por el Secretario de Hacienda del Estado de Baja California, en
                el ejercicio de sus facultades conferidas en los artículos 32 fracciones XX y XXXI de la Ley Orgánica
                del Poder Ejecutivo; 2,9 y 11 fracción XIV, del Reglamento Interno de la Secretaria de Hacienda; 45
                octies, fracción III del Reglamento del Servicio de Administración Tributaria, todos del Estado de Baja
                California.
            </p>

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
