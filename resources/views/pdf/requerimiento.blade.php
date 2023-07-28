<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Requerimiento</title>
    <link href="C:/wamp64/www/Tijuana-p/public/css/pdf.css" rel="stylesheet">
    <style>
        br {
            display: block;
            /* Cambiar el comportamiento predeterminado a un elemento en bloque */
            margin: 1em 0;
            /* Espacio vertical antes y después del <br/> */
            content: " ";
            /* Añadir un espacio en el contenido para asegurar que se muestre */
        }
    </style>
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
        <img src="{{ public_path('img/pdf/logo_BC_escudo.png') }}" width="100%" height="100%" />
    </footer> --}}
    <main>
        @foreach ($items as $item)
            <h4 class="text-center">REQUERIMIENTO DE PAGO</h4>
            <div class="data">
                <div class="data-center">
                    <p>
                        Crédito fiscal número:
                        <span class="underline bold">CESPT/EDM/{{ $folio }}/{{ date('Y') }}</span>
                    </p>
                </div>
                <p class="relative-right">En la ciudad de Tijuana, Baja California al día {{ $item->fechar }}</p>
            </div>
            <p>
                <span class="bold">
                    Nombre:
                </span>
                {{ $item->propietario }}
                <br />
                POR CONDUCTO DE QUIEN LEGALMENTE LO REPRESENTE.
                <br />
                <span class="bold">
                    Domicilio:
                </span>
                {{ $item->domicilio }} de la ciudad de Tijuana, Baja California.
            </p>
            <p>
                <span class="bold"> Cuenta:</span> <span>{{ $item->cuenta }}</span>
            </p>
            <p id="right">
                <span class="bold"> Tipo de servicio:</span> <span>{{ $item->tipo_s }}</span>
            </p>
            <p>
                <span class="bold">Clave catastral con la que se contrató: </span> <span>{{ $item->clavec }}</span>
            </p>
            <p id="right">
                <span class="bold"> Serie medidor:</span> <span>{{ $item->seriem }}</span>
            </p>
            <p>
                <span class="bold">Autoridad Emisora: </span>
                <span>Subrecaudación de Rentas adscrita a la Comisión Estatal de Servicios Públicos de Tijuana.</span>
            </p>
            <p class="text-justify">
                La Subrecaudación de Rentas adscrita a la Comisión Estatal de Servicios Públicos de Tijuana, hace
                constar la remisión del crédito fiscal número <span
                    class=" bold">CESPT/EDM/{{ $folio }}/{{ date('Y') }}</span>,
                de fecha <span class="bold">{{ $item->fechar }}</span>, emitido por
                la Comisión Estatal de Servicios Públicos de Tijuana, debido que el usuario del servicio no realizó el
                pago de los derechos de consumo de agua potable y alcantarillado, correspondiente a los períodos
                comprendidos del <span class="bold">{{ $item->periodo }}</span>, dentro del plazo que indica la Ley
                que Reglamenta
                el Servicio de Agua Potable en el Estado de Baja California; ello, con el objeto de que se inicie el
                procedimiento administrativo de ejecución para obtener la satisfacción del crédito fiscal de referencia.
                <br />
                Por lo que, en ejercicio de las atribuciones y facultades conferidas en los artículos 1, fracciones l,
                ll y V y 3 del Acuerdo Delegatorio de Facultades en materia fiscal publicado en el diario oficial del
                Estado de Baja California el día 04 de marzo del 2005, en relación con lo preceptuado en el artículo 21
                párrafo segundo de la Ley de las Comisiones Estatales de Servicios Públicos del Estado de Baja
                California; 14 BIS,109, 111,112,114 y 115 del Código Fiscal del Estado de Baja California; artículo 59,
                fracción lll, primero y segundo párrafo del Reglamento Interno de la Secretaria de Hacienda del Estado
                de Baja California, se ordena requerir el pago del crédito fiscal referido, tomando en cuenta las
                siguientes consideraciones:
            </p>
            <ol>
                <li>
                    <p class="text-justify">
                        Que el artículo 2 de la Ley de las Comisiones Estatales de Servicios Públicos del Estado
                        de Baja
                        California, en su fracción V, prevé, como función de la misma (entre otras), la
                        determinación de
                        créditos fiscales y recaudación de los derechos, aprovechamientos y contribuciones de
                        mejoras que
                        conforme a las Leyes aplicables y a los Convenios que celebren, les correspondan. Por su
                        parte, su
                        correlativo 21, precisa que la obligación de pago de las cuotas por consumo de agua y por
                        realización de
                        las obras que ejecute la Comisión y sus accesorios, tendrá el carácter de fiscal; que
                        corresponde a la
                        Comisión la determinación de los créditos y de las bases para su liquidación, la fijación de
                        la cantidad
                        líquida y su percepción y que, respecto de las cantidades que no hubieren sido cubiertas
                        directamente a
                        la Comisión, el cobro se realizará por conducto de las Oficinas Subrecaudadoras de Rentas
                        adscritas a la
                        Comisión, conforme al Código Fiscal del Estado de Baja California, las que podrán hacer uso
                        del
                        procedimiento económico-coactivo.
                    </p>
                </li>
                <li>
                    <p class="text-justify">
                        Que el último párrafo del artículo 16 de la Ley que Reglamenta el Servicio de Agua Potable en
                        el Estado de Baja California, establece que las personas obligadas a pagar los derechos por
                        servicios de agua, deberán cubrirlos en las oficinas recaudadoras o en establecimientos
                        autorizados dentro de los quince (15) días naturales posteriores al periodo facturado; y su
                        correlativo 17, precisa que, cuando no se cubran los derechos en el plazo otorgado, su pago y el
                        de los accesorios legales respectivos, se hará efectivo en las condiciones y términos que
                        establezcan la Ley de las Comisiones Estatales de Servicios Públicos del Estado de Baja
                        California y la legislación fiscal del Estado de Baja California
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
                        Que el día de {{ $fechaNotiDeter }}, le fué debidamente notificada por la Comisión Estatal de
                        Servicios Públicos de Tijuana, determinación y liquidación de crédito fiscal de los servicios de
                        agua potable y alcantarillado, con número
                        <span>CESPT/EDM/{{ $folio }}/{{ date('Y') }}</span>;
                        sin que a la fecha lo hubiese
                        pagado o convenido dentro del plazo de quince días que le fue otorgado; por lo que, se actualiza
                        el supuesto contenido en el artículo 24 del Código Fiscal del Estado de Baja California, el cual
                        establece que la falta de pago de un crédito fiscal en la fecha o plazos establecidos en las
                        disposiciones respectivas, determina que el crédito sea exigible.
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
                        Que el artículo 111 del Código Fiscal del Estado de Baja California, obliga a las autoridades
                        fiscales el exigir el pago de los créditos fiscales que no hubieren sido cubiertos o
                        garantizados dentro de los plazos previstos en la ley, mediante el Procedimiento Administrativo
                        de Ejecución; por su parte, el diverso 112, establece que los vencimientos que ocurran durante
                        el procedimiento de referencia, incluso, recargos, gastos de ejecución y cualesquiera otros, se
                        harán efectivos con el crédito inicial, sin necesidad de nuevos requerimientos ni de otras
                        formalidades especiales
                    </p>
                </li>
                <li>
                    <p class="text-justify">
                        Que el artículo 144 del Código Fiscal del Estado de Baja California, en su fracción I,
                        establece como gastos de ejecución, los honorarios de los notificadores, ejecutores,
                        depositarios, peritos, interventores con cargo a la caja y administradores y su correlativo 145
                        precisa que los gastos de ejecución se determinaran y harán efectivos por las autoridades
                        ejecutoras conjuntamente con el crédito fiscal, a razón del 2% sobre el monto del crédito y que
                        en ningún caso, estos pueden ser menores al equivalente a una Unidad de Medida y Actualización
                        vigente.
                    </p>
                </li>
            </ol>
            <p class="text-justify">
                Así entonces, con fundamento en lo previsto en el primer párrafo del artículo 114 del Código Fiscal del
                Estado de Baja California, procédase a requerir al sujeto obligado por el pago del adeudo que aquí se
                precisa y que de manera líquida y puntual se encuentra contenida en la determinación del crédito fiscal
                con número <span>CESPT/EDM/{{ $folio }}/{{ date('Y') }}</span>, efectuada por la Comisión
                Estatal de Servicios Públicos de Tijuana y
                notificada con la fecha señalada con antelación al deudor; misma que al no haberse combatida en el plazo
                legal que le fuera concedido, constituye una resolución firme para los efectos legales procedentes; por
                lo que, déjesele el presente requerimiento con firma autógrafa; conminándolo a que efectúe dicho pago
                dentro del plazo de seis (6) días siguientes contados a partir del día hábil siguiente en que surta
                efectos la notificación del presente, en términos de los artículos 72 fracción I Y 74 del Código Fiscal
                del Estado de Baja California; apercibiéndolo que de no hacerlo, se iniciará el procedimiento
                administrativo de ejecución en su contra. <span class="bold">En consecuencia, requiérase al deudor por
                    el importe líquido
                    que aquí se precisa:</span>
            </p>
            <br />
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
                        <td>${{ number_format($item->multas, 2) }}</td>
                        <td>${{ number_format($item->gastos_ejecucion, 2) }}</td>
                        <td>${{ number_format($item->otros_gastos, 2) }}</td>
                        <td>${{ number_format($item->conv_vencido, 2) }}</td>
                        <td>${{ $total }}</td>
                    </tr>
                    <tr>
                        <td>Total, del adeudo requerido</td>

                        <td class="text-center bold" colspan="7">
                            ${{ $total }}
                            <br />
                            {{ $tar }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <br />
            <br />
            <p class="text-justify">
                Por lo que, con la facultad prevista en la fracción V del artículo 1 del Acuerdo Delegatorio de
                Facultades publicado en el periódico oficial del Estado de baja California de fecha 04 de marzo de 2005
                y para dar cumplimiento a lo anteriormente determinado, se designa como NOTIFICADOR(ES) del presente, al
                (los) C.C.___________________________________ y ___________
                __________________________________con nombramiento(s) de fecha_____________________, para que de manera
                conjunta o separada den cumplimiento a la presente orden, quien(es) al inicio de la diligencia deberá(n)
                identificarse con la constancia de nombramiento vigente en la que aparece su fotografía y su firma y que
                los acredita como notificadores adscritos a esta Subrecaudacion de la Comisión Estatal de Servicios
                Públicos de Tijuana.
            </p>
            <br />
            <p class="text-justify">
                Se hace del conocimiento del deudor y/o atendiente, que, para el caso que impida materialmente al (los)
                notificador(es) designado(s) el cumplimiento del presente, oponiéndose u obstaculizando la diligencia;
                este se encuentra facultado en términos de la fracción X del artículo 95 del Código Fiscal del Estado de
                Baja California, a emplear cualquiera de los medios de apremio ahí consignados.
            </p>
            <br />
              {{-- Salto de linea p --}}
              <div class="saltopagina"></div>
            <p class="text-justify">
                Se le informa al deudor que podrá realizar el pago de las cantidades reclamadas, de los vencimientos
                ocurridos y de los gastos de ejecución en Boulevard Federico Benítez López 4057, Colonia 20 de
                Noviembre, C.P.22430, Tijuana, Baja California; en cuyo caso la Autoridad Fiscal dará por terminado el
                procedimiento administrativo de ejecución.
            </p>
            <br />
            <p class="text-justify">
                Queda enterado que, de manera optativa, podrá interponer de conformidad con el artículo 181 del Código
                Fiscal del Estado de Baja California, el recurso administrativo de revocación ante la Procuraduría
                Fiscal del Estado o bien, juicio, ante el Tribunal Estatal de Justicia Administrativa del Estado de Baja
                California.
            </p>
            <br />
            <p class="text-justify">
                NOTIFIQUESE PERSONALMENTE en términos de los artículos 68 fracción I,69, 70,71,72,73,74,75 y 76, todos,
                del Código Fiscal del Estado de Baja California
            </p>
            <br />
            <p class="text-justify">
                Así lo resolvió la C. Subrecaudadora de Rentas adscrita a la Comisión Estatal de Servicios Públicos de
                Tijuana a los {{ $fechar2 }}; con nombramiento bajo oficio {{ $folio }}, de
                fecha {{ $fechar }}; realizado por el Secretario de Hacienda del Estado de Baja California, en
                el
                ejercicio de sus facultades conferidas en los artículos 32 fracciones XX y XXXI de la Ley Orgánica del
                Poder
                Ejecutivo; 2,9 y 11 fracción XIV, del Reglamento Interno de la Secretaria de Hacienda; 45 octies,
                fracción
                III del Reglamento del Servicio de Administración Tributaria, todos del Estado de Baja California.
            </p>
            <div class="firm">
                <p class="text-center">
                    ______________________________________________
                    <br />
                    <span class="bold">
                        EL C. {{ $item->sobrerecaudador }} SUBRECAUDADOR DE RENTAS DEL ESTADO ADSCRITO A LA
                        COMISIÓN ESTATAL DE SERVICIOS PÚBLICOS DE TIJUANA.
                    </span>
                </p>
            </div>
        @endforeach
    </main>
</body>

</html>
