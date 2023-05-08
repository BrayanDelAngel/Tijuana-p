<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Determinación</title>
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
        <img src="{{ public_path('img/pdf/logo_BC_escudo.png') }}" width="100%" height="100%" />
    </footer> --}}
    <main>
        <p class="align-right mr-50 bold">FOLIO: CESPT/EDM/{{ $folio }}/{{ date('Y') }}</p>
        <p class="align-right"><span class="bold">Tijuana B.C,</span> {{ $data->fechad }}</p>
        <p class="">
            <span class="bold"> CUENTA:</span> {{ $data->cuenta }}
            <br />
            <span class="bold"> USUARIO:</span> {{ $data->propietario }}
            <br />
            <span class="bold"> DIRECCIÓN:</span> {{ $data->domicilio }}
            <br />
            <span class="bold">CLAVE CATASTRAL:</span> {{ $data->clavec }}
            <br />
            <span class="bold"> TIPO DE SERVICIO:</span> {{ $data->tipo_s }}
            <br />
            <span class="bold"> NÚMERO DE MEDIDOR:</span> {{ $data->seriem }}
            <br />
            <span class="bold"> RAZON SOCIAL:</span>{{ $data->razons }}
            <br />
            <span class="bold">PRESENTE. -</span>
        </p>
        @if ($data->tipo_s == 'NO DOMESTICO')
            @if ($IDdistrito == '1')
                <p class="text-justify">
                    El suscrito Dr. <span class="bold">Víctor Daniel Amador Barragán</span> Director General de la
                    Comisión Estatal de Servicios
                    Públicos de Tijuana, con fundamento en los artículos 16 y 31 fracción IV de la Constitución Política
                    de los Estados Unidos Mexicanos; artículo 22, fracción II de la Ley de las Entidades Paraestatales
                    del Estado de Baja California; los artículos 1, 2 fracción V, 16 fracción I, II, y VII , 21 de la
                    Ley de las Comisiones Estatales de Servicios Públicos del Estado de Baja California, en relación con
                    lo dispuesto por el primer párrafo del artículo 17 de la Ley que Reglamenta el Servicio de Agua
                    Potable en el Estado de Baja California, y el acuerdo número SE/004/14-07-22 aprobado en la séptima
                    sesión extraordinaria del consejo de administración de la Comisión Estatal de Servicios Públicos de
                    Tijuana celebrado en la fecha 14 de julio de 2022, donde se otorga el nombramiento de Director
                    General y de representación de la Comisión Estatal Servicios Públicos de Tijuana, de conformidad al
                    artículo 4-1 de la Ley de Hacienda del Estado de Baja California; artículo 14 BIS del Codigo Fiscal
                    para el Estado de Baja California; artículo 3 fracciones I, II, lll, IV, 15 y 16 fracción l,ll,
                    inciso a), b) y lll de la Ley que Reglamenta el Servicio de Agua Potable en el Estado de Baja
                    California; artículo 11, sección lll, inciso A), numeral 2, subinciso a), b), c) y d) de la Ley de
                    Ingresos para los ejercicios fiscales de los años <span class="bold">2004;</span> artículo 11,
                    sección lV, inciso A), numeral
                    2, subinciso a), b), c) y d) de la Ley de Ingresos para los ejercicios fiscales de los años <span
                        class="bold">2005,
                        2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018 Y 2019;</span>
                    artículo 10,
                    sección lV, inciso A), numeral 2, subinciso a), b), c) y d) de la Ley de Ingresos para el ejercicio
                    fiscal <span class="bold">2020;</span> artículo 9, sección V , inciso A), numeral 2, subinciso a),
                    b), c) y d) de la Ley de
                    Ingresos para el ejercicio fiscal <span class="bold">2021;</span> artículo 9, sección Vl, inciso
                    A), numeral 2, subinciso a),
                    b), c) y d) de la Ley de Ingresos para el ejercicio fiscal <span class="bold">2022,2023;</span> se procede a determinar
                    crédito fiscal por la omisión del pago de derechos por consumo de agua; lo cual queda contenido en
                    la presente, de conformidad a lo siguiente:
                </p>
            @endif
            @if ($IDdistrito != '1')
            <p class="text-justify">
                El suscrito Dr. <span class="bold">Víctor Daniel Amador Barragán</span> Director General de la
                Comisión Estatal de Servicios
                Públicos de Tijuana, con fundamento en los artículos 16 y 31 fracción IV de la Constitución Política de
                los Estados Unidos Mexicanos; artículo 22, fracción II de la Ley de las Entidades Paraestatales del
                Estado de Baja California; los artículos 1, 2 fracción V, 16 fracción I, II, y VII , 21 de la Ley de las
                Comisiones Estatales de Servicios Públicos del Estado de Baja California, en relación con lo dispuesto
                por el primer párrafo del artículo 17 de la Ley que Reglamenta el Servicio de Agua Potable en el Estado
                de Baja California, y el acuerdo número SE/004/14-07-22 aprobado en la séptima sesión extraordinaria del
                consejo de administración de la Comisión Estatal de Servicios Públicos de Tijuana celebrado en la fecha
                14 de julio de 2022, donde se otorga el nombramiento de Director General y de representación de la
                Comisión Estatal Servicios Públicos de Tijuana, de conformidad al artículo 4-1 de la Ley de Hacienda del
                Estado de Baja California; artículo 14 BIS del Codigo Fiscal para el Estado de Baja California; artículo
                3 fracciones I, II, lll, IV, 15 y 16 fracción l,ll, inciso a), b) y lll de la Ley que Reglamenta el
                Servicio de Agua Potable en el Estado de Baja California; artículo 11, sección lll, inciso A), numeral
                2, subinciso a), b), c) y d) de la Ley de Ingresos para los ejercicios fiscales de los años <span
                    class="bold">2004;</span>
                artículo 11, sección lll , inciso A), numeral 2, subinciso a), b), c) y d) de la Ley de Ingresos para
                los ejercicios fiscales de los años <span class="bold">2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012,
                    2013, 2014, 2015,
                    2016, 2017, 2018 Y 2019;</span> artículo 10, sección lll, inciso A), numeral 2, subinciso a), b), c)
                y d) de la
                Ley de Ingresos para el ejercicio fiscal <span class="bold">2020;</span> artículo 9, sección lV ,
                inciso A), numeral 2, subinciso
                a), b), c) y d) de la Ley de Ingresos para el ejercicio fiscal <span class="bold">2021;</span>
                artículo 9, sección V, inciso A),
                numeral 2, subinciso a), b), c) y d) de la Ley de Ingresos para el ejercicio fiscal <span
                    class="bold">2022,2023;</span> se
                procede a determinar crédito fiscal por la omisión del pago de derechos por consumo de agua; lo cual
                queda contenido en la presente, de conformidad a lo siguiente:
            </p>
            @endif
        @endif
        @if ($data->tipo_s == 'DOMESTICO')
            @if ($IDdistrito == '1')
                <p class="text-justify">
                    El suscrito Dr. <span class="bold">Víctor Daniel Amador Barragán</span> Director General de la
                    Comisión Estatal de Servicios
                    Públicos de Tijuana, con fundamento en los artículos 16 y 31 fracción IV de la Constitución Política
                    de los Estados Unidos Mexicanos; artículo 22, fracción II de la Ley de las Entidades Paraestatales
                    del Estado de Baja California; los artículos 1, 2 fracción V, 16 fracción I, II, y VII , 21 de la
                    Ley de las Comisiones Estatales de Servicios Públicos del Estado de Baja California, en relación con
                    lo dispuesto por el primer párrafo del artículo 17 de la Ley que Reglamenta el Servicio de Agua
                    Potable en el Estado de Baja California, y el acuerdo número SE/004/14-07-22 aprobado en la séptima
                    sesión extraordinaria del consejo de administración de la Comisión Estatal de Servicios Públicos de
                    Tijuana celebrado en la fecha 14 de julio de 2022, donde se otorga el nombramiento de Director
                    General y de representación de la Comisión Estatal Servicios Públicos de Tijuana, de conformidad al
                    artículo 4-1 de la Ley de Hacienda del Estado de Baja California; artículo 14 BIS del Codigo Fiscal
                    para el Estado de Baja California; artículo 3 fracciones I, II ll, IV, 15 y 16 fracción l, ll,
                    inciso a), b) y lll de la Ley que Reglamenta el Servicio de Agua Potable en el Estado de Baja
                    California; artículo 11, sección lll, inciso A), numeral 1, subinciso a), b), c), d), e), f), g),
                    h), i), j), k) y l) de la Ley de Ingresos para los ejercicios fiscales de los años <span class="bold">2004;</span> artículo
                    11, sección lV, inciso A), numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de
                    la Ley de Ingresos para los ejercicios fiscales de los años <span class="bold">2005, 2006, 2007,
                        2008, 2009, 2010,
                        2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018 Y 2019;</span> artículo 10, sección lV, inciso
                    A), numeral
                    1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de Ingresos para el ejercicio
                    fiscal <span class="bold">2020;</span> artículo 9, sección V, inciso A), numeral 1, subinciso a),
                    b), c), d), e), f), g), h),
                    i), j), k) y l) de la Ley de Ingresos para el ejercicio fiscal <span class="bold">2021</span>
                    artículo 9, sección Vl, inciso
                    A), numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de Ingresos para
                    el ejercicio fiscal <span class="bold">2022,2023;</span> se procede a determinar crédito fiscal
                    por la omisión del pago de
                    derechos por consumo de agua; lo cual queda contenido en la presente, de conformidad lo siguiente:
                </p>
            @endif
            @if ($IDdistrito != '1')
                <p class="text-justify">
                    El suscrito Dr. <span class="bold">Víctor Daniel Amador Barragán</span> Director General de la
                    Comisión Estatal de Servicios
                    Públicos de Tijuana, con fundamento en los artículos 16 y 31 fracción IV de la Constitución Política
                    de los Estados Unidos Mexicanos; artículo 22, fracción II de la Ley de las Entidades Paraestatales
                    del Estado de Baja California; los artículos 1, 2 fracción V, 16 fracción I, II, y VII , 21 de la
                    Ley de las Comisiones Estatales de Servicios Públicos del Estado de Baja California, en relación con
                    lo dispuesto por el primer párrafo del artículo 17 de la Ley que Reglamenta el Servicio de Agua
                    Potable en el Estado de Baja California, y el acuerdo número SE/004/14-07-22 aprobado en la séptima
                    sesión extraordinaria del consejo de administración de la Comisión Estatal de Servicios Públicos de
                    Tijuana celebrado en la fecha 14 de julio de 2022, donde se otorga el nombramiento de Director
                    General y de representación de la Comisión Estatal Servicios Públicos de Tijuana, de conformidad al
                    artículo 4-1 de la Ley de Hacienda del Estado de Baja California; artículo 14 BIS del Codigo Fiscal
                    para el Estado de Baja California; artículo 3 fracciones I, II ll, IV, 15 y 16 fraccion l, ll,
                    inciso a), b) y lll de la Ley que Reglamenta el Servicio de Agua Potable en el Estado de Baja
                    California; artículo 11, sección lll, inciso A), numeral 1, subinciso a), b), c), d), e), f), g),
                    h), i), j), k) y l) de la Ley de Ingresos para los ejercicios fiscales de los años <span class="bold">2004;</span> artículo
                    11, sección lll, inciso A), numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de
                    la Ley de Ingresos para los ejercicios fiscales de los años <span class="bold">2005, 2006, 2007,
                        2008, 2009, 2010,
                        2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018 Y 2019;</span> artículo 10, sección lll, inciso
                    A), numeral
                    1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de Ingresos para el ejercicio
                    fiscal <span class="bold">2020</span>; artículo 9, sección lV, inciso A), numeral 1, subinciso a),
                    b), c), d), e), f), g), h),
                    i), j), k) y l) de la Ley de Ingresos para el ejercicio fiscal <span class="bold">2021</span>
                    artículo 9, sección V, inciso
                    A), numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de Ingresos para
                    el ejercicio fiscal <span class="bold">2022,2023;</span> se procede a determinar crédito fiscal
                    por la omisión del pago de
                    derechos por consumo de agua; lo cual queda contenido en la presente, de conformidad lo siguiente:
                </p>
            @endif

        @endif
        <p class="text-center bold">CONSIDERANDO ÚNICO:</p>
        <p class="text-justify">
            En virtud que de acuerdo a la información registrada en los archivos digitales del sistema electrónico de la
            Comisión Estatal de Servicios Públicos de Tijuana a cargo de la usuaria <span
                class="bold">{{ $data->propietario }}</span>, quien se
            encuentra
            registrada como Titular de la cuenta número <span class="bold">{{ $data->cuenta }}</span>, con número de
            medidor
            <span class="bold">{{ $data->seriem }}</span>, de uso <span class="bold">{{ $data->tipo_s }}</span>,
            del domicilio ubicado en <span class="bold">{{ $data->domicilio }}</span> de esta ciudad de Tijuana, Baja California, con clave
            catastral número
            <span class="bold">{{ $data->clavec }}</span> se desprende que ha omitido cubrir las contribuciones
            generadas por
            los derechos
            relativos al
            servicio de consumo agua potable por los diversos periodos consecutivos facturados que comprenden del
            <span class="bold">{{ $data->periodo }}</span>, toda vez que los
            referidos derechos no fueron cubiertos de
            conformidad con lo
            establecido por el artículo 16 último párrafo de la Ley que Reglamenta el Servicio de Agua Potable en el
            Estado de Baja California. Por lo que se procede a la determinación del crédito por cuotas de consumo de
            agua y sus accesorios en cantidad liquida, conforme lo previsto por el artículo 21 de la Ley de las
            Comisiones Estatales de Servicios Públicos del Estado de Baja California en relación con lo previsto por el
            primer párrafo del artículo 17 de la Ley que Reglamenta el Servicio de Agua Potable en el Estado de Baja
            California, de subsiguiente inserción:
        </p>
        <div class="article2">
            <p class="bold">Ley de las Comisiones Estatales de Servicios Públicos del Estado de Baja California</p>
            <p class="text-justify">
                <span class="bold"> “ARTÍCULO 21.-</span> La obligación de pago de las cuotas por consumo de agua y
                por realización de las obras
                que ejecute la Comisión y sus accesorios, tendrá el carácter de fiscal, correspondiendo a la Comisión la
                determinación de los créditos y de las bases para su liquidación, la fijación de la cantidad líquida y
                su percepción y cobro. Respecto de las cantidades que no hubieren sido cubiertas directamente a la
                Comisión, el cobro se realizará por conducto de las Oficinas Recaudadoras del Estado, conforme al Código
                Fiscal del mismo, las que podrán hacer uso del procedimiento económico-coactivo. Obtenido el pago, las
                Oficinas Ejecutoras entregarán a la Comisión las sumas recaudadas.”
                <br />
                <br />
                <span class="bold"> Ley que Reglamenta el Servicio de Agua Potable en el Estado de Baja
                    California</span>
                <br />
                <span class="bold"> “ARTICULO 16.-</span> Están obligados al pago de los derechos por servicio de
                agua:
                <br />
                …………..
                <br />
                Las personas obligadas a pagar los derechos por servicios de agua, deberán cubrirlos en las oficinas
                recaudadoras o en establecimientos autorizados por las autoridades fiscales, dentro de los quince días
                naturales posteriores al periodo facturado.”
                <br />
                <br />
                <span class="bold"> “ARTICULO 17.- </span> Cuando no se cubran los derechos a que se refiere el
                artículo 15, en el plazo que señala
                el artículo anterior, su pago y el de los accesorios legales respectivos, se hará efectivo en las
                condiciones y términos que establezca la Legislación fiscal del Estado de Baja California. Sin embargo,
                el suministro de agua potable y alcantarillado sanitario que se preste en los inmuebles en los que el
                Gobierno del Estado brinde educación básica y servicios de salud pública, no podrán reducirse ni
                suspenderse.
            </p>
        </div>
        <p class="text-justify">
            Por lo que, con fundamento en lo dispuesto por los artículos 7, 23, primer párrafo, 27, primer párrafo
            del Código Fiscal del Estado de Baja California, reformado mediante el decreto 58 publicado en el
            Periódico Oficial del Estado de Baja California el día 27 de junio de 2008; el artículo 36 de la Ley de
            Ingresos para el Estado de Baja California para los Ejercicio Fiscales <span class="bold">2004,
                2005</span>; el artículo 36 de la
            Ley de Ingresos para el Estado de Baja California para los Ejercicio Fiscales <span class="bold">2006,
                2007, 2008, 2009,
                2010, 2015 y 2022;</span> el artículo 37 de la Ley de Ingresos para el Estado de Baja California para
            los
            Ejercicio Fiscales <span class="bold">2011, 2012, 2013, 2014, 2016, 2017, 2018 y 2019;</span> el artículo
            35 de la Ley de Ingresos
            para el Estado de Baja California para el Ejercicio Fiscal <span class="bold">2020, 2021, 2022 y
                2023;</span> el artículo 21 de la Ley de las
            Comisiones Estatales de Servicios Públicos del Estado de Baja California, se procede a establecer el
            monto total del crédito de acuerdo al desglose de los periodos facturados comprendidos del
            <span class="bold">{{ $data->periodo }}</span> asimismo, se procede a determinar el importe de los
            recargos
            generados por concepto de
            indemnización al fisco estatal por la falta de pago oportuno de las contribuciones a su cargo, los que
            se obtienen de multiplicar las contribuciones omitidas determinadas, por las tasas de recargos, para lo
            cual se multiplican las tasas de recargos obtenidas, sumando las vigentes por los meses transcurridos
            desde la fecha de su exigibilidad y hasta la fecha de la presente determinación.
        </p>
        <div class="article2">
            <p class="text-justify">
                <span class="bold">“ARTÍCULO 7o.-</span> Son Derechos las contraprestaciones establecidas en las leyes
                fiscales, por los servicios que presta el Estado, en su función de derecho público, incluso cuando se
                presten por organismos
                públicos descentralizados, así como por el uso o aprovechamiento de los bienes del dominio público,
                siempre que en este último caso, se encuentren previstos como tales en la Ley de Ingresos del Estado.”
            </p>
            <p class="text-justify">
                <span class="bold">“ARTÍCULO 23.-</span> Son créditos fiscales las obligaciones
                determinadas en cantidad líquida que tiene derecho a percibir el Estado o sus organismos
                descentralizados que provengan de contribuciones o de sus accesorios, incluyendo los que deriven de
                responsabilidades que el Estado tenga derecho a exigir de sus servidores públicos o de los particulares,
                así como aquellos a los que las leyes les den ese carácter y el Estado tenga derecho a percibir por
                cuenta propia o ajena.”
            </p>
            <p class="text-justify">
                <span class="bold">“ARTÍCULO 27.-</span> Cuando no se paguen las contribuciones en la
                fecha límite o dentro del plazo fijado por las disposiciones fiscales, o cuando el pago hubiere sido
                menor al que corresponda; deberán pagarse recargos sobre los montos no cubiertos oportunamente, que se
                calcularán por cada mes transcurrido o fracción de este, desde la fecha de su exigibilidad hasta el día
                en que se paguen. Los recargos se causarán hasta por cinco años y se calcularán sobre el total del
                crédito fiscal, excluyendo los recargos, gastos de ejecución y multas por infracción a las disposiciones
                fiscales, conforme a la tasa que anualmente disponga la Ley de Ingresos del Estado.”
            </p>
            <p class="text-justify">
                <span class="bold"> “ARTÍCULO 35.- …………. </span>
                <br/>
                Cuando no se cubran las contribuciones dentro de los plazos señalados en las disposiciones fiscales o no
                se cubran las parcialidades en los plazos convenidos, se pagarán recargos por concepto de indemnización
                al fisco estatal a la tasa del 2.25% mensual.”
            </p>
        </div>
        <p class="text-justify">
            Las tasas de recargos mensuales vigentes en los ejercicios <span class="bold">{{ $anioformat }}</span>;
            aplicables en la presente
            resolución
            liquidatoria, fueron publicadas en el Periódico Oficial del Estado, según el análisis que a continuación se
            detalla:
        </p>
        @foreach ($años as $item)
            @if ($item->anio == 2004)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2004.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 34 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2004,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2003, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2005)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2005.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 35 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2005,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2004, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2006)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2006.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 36 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2006,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2005, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2007)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2007.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 36 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2006,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2005, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2008)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2008.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 36 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2008,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2007, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2009)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2009.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 36 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2009,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2008, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2010)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2010.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 36 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2010,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2009, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2011)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2011.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 37 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2011,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2010, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2012)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2012.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 37 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2012,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2011, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2013)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2013.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 37 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2013,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2012, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2014)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2014.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 37 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2014,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja California
                    de fecha 31 de diciembre de 2013, la tasa de recargos por el mes de enero fue de 2.25%, febrero del
                    2.25%,
                    marzo
                    de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de 2.25%, septiembre
                    de
                    2.25%,
                    octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2015)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2015.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 37 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2015,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2014, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2016)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2016.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 37 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2016,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2015, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2017)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2017.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 37 segundo párrafo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2017,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2016, la tasa de recargos por el mes de enero de 2.25%,
                    febrero de
                    2.25%, marzo de 2.25% abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2018)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2018.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 37 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2018,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2017, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2019)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2019.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 37 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2019,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2018, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2020)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2020.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 35 párrafo segundo de la Ley de Ingresos del Estado
                    de Baja
                    California <span class="bold">para el ejercicio fiscal de 2020,</span> fue publicada en el
                    Periódico
                    Oficial del Estado de Baja
                    California de fecha 31 de diciembre de 2019, la tasa de recargos por el mes de enero fue de 2.25%,
                    febrero
                    del 2.25%, marzo de 2.25%, abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de
                    2.25%,
                    septiembre de 2.25%, octubre de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2021)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2021.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 35 Ley de Ingresos del Estado de Baja California
                    <span class="bold">para el
                        ejercicio fiscal de 2021,</span> fue publicada en el Periódico Oficial del Estado de Baja
                    California de
                    fecha 28 de
                    diciembre de 2020, la tasa de recargos por el mes de enero fue de 2.25%, febrero del 2.25%, marzo de
                    2.25%,
                    abril de 2.25%, mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de 2.25%, septiembre de 2.25%,
                    octubre
                    de 2.25%, noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2022)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2022</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 37 Ley de Ingresos del Estado de Baja California
                    <span class="bold">para el
                        ejercicio fiscal de 2022,</span> fue publicada en el Periódico Oficial del Estado de Baja
                    California de
                    fecha 31 de
                    diciembre de 2021,
                    la tasa de recargos por el mes de enero fue de 2.25%, febrero del 2.25%, marzo de 2.25%, abril de
                    2.25%,
                    mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de 2.25%, septiembre de 2.25%, octubre de
                    2.25%,
                    noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
            @if ($item->anio == 2023)
                <p class="text-justify">
                    <span class="bold">Recargos para el año 2023.</span>
                    <br />
                    De conformidad con lo dispuesto por el artículo 36 de la Ley de Ingresos del Estado de Baja
                    California <span class="bold">para
                        el ejercicio fiscal de 2023,</span> publicada en el Periódico Oficial del Estado de Baja
                    California de
                    fecha 21 de
                    diciembre de 2022, cuando no se cubran las contribuciones dentro de los plazos señalados en las
                    disposiciones fiscales, se pagarán recargos por concepto de indemnización al fisco la tasa de 2.25%
                    mensual,
                    la tasa de recargos por el mes de enero fue de 2.25%, febrero del 2.25%, marzo de 2.25%, abril de
                    2.25%,
                    mayo de 2.25%, junio de 2.25%, julio de 2.25%, agosto de 2.25%, septiembre de 2.25%, octubre de
                    2.25%,
                    noviembre de 2.25% y diciembre de 2.25%.
                </p>
            @endif
        @endforeach
        <p class="bold text-justify">Suma de las tasas de recargos calculados en forma mensual para los derechos por
            periodos
            facturados vencidos</p>
        <p class="text-justify">En lo que concierne a los periodos facturados vencidos para efectos del pago de consumo
            de agua potable, la
            suma de las tasas de recargos será desde el vencimiento del plazo para el pago a que se refiere el último
            párrafo del artículo 16 de la Ley que Reglamenta el Servicio de Agua Potable en el Estado de Baja
            California, correspondiente al periodo comprendido <span class="bold">{{ $data->periodo }}</span>,
            en que se haya incurrido en
            mora para cada uno de los periodos facturados vencidos y hasta la fecha de la presente resolución
            liquidatoria, misma que se determinó de la forma siguiente:</p>
        <p class="bold text-justify">DOSGLOCE DE LOS PERIODOS FACTURADOS VENCIDOS Y RECARGOS QUE CONFORMAN EL MONTO
            TOTAL DEL
            CRÉDITO FISCAL</p>

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
                @foreach ($items as $item)
                    <tr class="tr">
                        <td class="td">{{ $i += 1 }}</td>
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
        <br />
        <br />
        <p>TOTAL, A PAGAR POR CONCEPTO DE CONSUMO DE AGUA POTABLE <span class="bold">{{ $tp }}</span>
        </p>
        @if ($data->tipo_s == 'DOMESTICO')
            @if ($IDdistrito != '1')
                <p class="text-justify">
                    De acuerdo al artículo artículo 11, sección lll, inciso A), numeral 1, subinciso a), b), c), d), e),
                    f), g), h), i), j), k) y l) de la Ley de Ingresos para los ejercicios fiscales de los años <span class="bold">2004;</span>
                    artículo 11, sección lll, inciso A), numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k)
                    y l) de la Ley de Ingresos para los ejercicios fiscales de los años <span class="bold">2005,
                        2006, 2007, 2008, 2009,
                        2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018 Y 2019;</span> artículo 10, sección lll,
                    inciso A),
                    numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de Ingresos para el
                    ejercicio fiscal <span class="bold">2020</span>; artículo 9, sección lV, inciso A), numeral 1,
                    subinciso a), b), c), d), e),
                    f), g), h), i), j), k) y l) de la Ley de Ingresos para el ejercicio fiscal <span
                        class="bold">2021</span> artículo 9, sección
                    V, inciso A), numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de
                    Ingresos para el ejercicio fiscal <span class="bold">2022,2023</span> vigente en cada año las
                    Tarifas y Cuotas contenidas en
                    cada una de las secciones del Capítulo I “Servicios de Agua”, se actualizarán mensualmente, a partir
                    del mes de febrero, con el factor que se obtenga de dividir el Índice Nacional de Precios al
                    Consumidor, que se publique en el Diario Oficial de la Federación por el Instituto Nacional de
                    Estadística y Geografía, o por la dependencia federal que en sustitución de ésta lo publique, del
                    último mes inmediato anterior al mes por el cual se hace el ajuste, entre el citado índice del
                    penúltimo mes inmediato anterior al del mismo mes que se actualiza. Los Índices Nacionales de
                    Precios al Consumidor se publicarán los días 10 de cada mes en el Diario Oficial de la Federación o
                    por la dependencia correspondiente. En caso de que a la fecha de la actualización no se haya
                    publicado el índice citado, se tomarán los últimos publicados.
                </p>
            @endif
            @if ($IDdistrito == '1')
                <p class="text-justify">
                    De acuerdo al artículo artículo 11, sección lll, inciso A), numeral 1, subinciso a), b), c), d), e),
                    f), g), h), i), j), k) y l) de la Ley de Ingresos para los ejercicios fiscales de los años <span
                        class="bold">2004</span>;
                    artículo 11, sección lV, inciso A), numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k)
                    y l) de la Ley de Ingresos para los ejercicios fiscales de los años <span class="bold">2005,
                        2006, 2007, 2008, 2009,
                        2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018 Y 2019;</span> artículo 10, sección lV,
                    inciso A),
                    numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de Ingresos para el
                    ejercicio fiscal <span class="bold">2020</span>; artículo 9, sección V, inciso A), numeral 1,
                    subinciso a), b), c), d), e),
                    f), g), h), i), j), k) y l) de la Ley de Ingresos para el ejercicio fiscal 2021 artículo 9, sección
                    Vl, inciso A), numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de
                    Ingresos para el ejercicio fiscal <span class="bold">2022,2023</span> vigente en cada año las
                    Tarifas y Cuotas contenidas en
                    cada una de las secciones del Capítulo I “Servicios de Agua”, se actualizarán mensualmente, a partir
                    del mes de febrero, con el factor que se obtenga de dividir el Índice Nacional de Precios al
                    Consumidor, que se publique en el Diario Oficial de la Federación por el Instituto Nacional de
                    Estadística y Geografía, o por la dependencia federal que en sustitución de ésta lo publique, del
                    último mes inmediato anterior al mes por el cual se hace el ajuste, entre el citado índice del
                    penúltimo mes inmediato anterior al del mismo mes que se actualiza. Los Índices Nacionales de
                    Precios al Consumidor se publicarán los días 10 de cada mes en el Diario Oficial de la Federación o
                    por la dependencia correspondiente. En caso de que a la fecha de la actualización no se haya
                    publicado el índice citado, se tomarán los últimos publicados.
                </p>
            @endif
        @endif
        @if ($data->tipo_s == 'NO DOMESTICO')
            @if ($IDdistrito == '1')
                <p class="text-justify">
                    De acuerdo al artículo 11, sección lll, inciso A), numeral 2, subinciso a), b), c) y d) de la Ley de
                    Ingresos para los ejercicios fiscales de los años <span class="bold">2004;</span> artículo 11,
                    sección lV, inciso A), numeral
                    2, subinciso a), b), c) y d) de la Ley de Ingresos para los ejercicios fiscales de los años <span
                        class="bold">2005,
                        2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018 Y 2019;</span>
                    artículo 10,
                    sección lV, inciso A), numeral 2, subinciso a), b), c) y d) de la Ley de Ingresos para el ejercicio
                    fiscal <span class="bold">2020;</span> artículo 9, sección V, inciso A), numeral 2, subinciso a),
                    b), c) y d) de la Ley de
                    Ingresos para el ejercicio fiscal 2021; artículo 9, sección Vl, inciso A), numeral 2, subinciso a),
                    b), c) y d) de la Ley de Ingresos para el ejercicio fiscal <span class="bold">2022,2023;</span>
                    vigente en cada año las
                    Tarifas y Cuotas contenidas en cada una de las secciones del Capítulo I “Servicios de Agua”, se
                    actualizarán mensualmente, a partir del mes de febrero, con el factor que se obtenga de dividir el
                    Índice Nacional de Precios al Consumidor, que se publique en el Diario Oficial de la Federación por
                    el Instituto Nacional de Estadística y Geografía, o por la dependencia federal que en sustitución de
                    ésta lo publique, del último mes inmediato anterior al mes por el cual se hace el ajuste, entre el
                    citado índice del penúltimo mes inmediato anterior al del mismo mes que se actualiza. Los Índices
                    Nacionales de Precios al Consumidor se publicarán los días 10 de cada mes en el Diario Oficial de la
                    Federación o por la dependencia correspondiente. En caso de que a la fecha de la actualización no se
                    haya publicado el índice citado, se tomarán los últimos publicados.
                </p>
            @endif
            @if ($IDdistrito == '1')
                <p class="text-justify">
                    De acuerdo al artículo 11, sección lll, inciso A), numeral 2, subinciso a), b), c) y d) de la Ley de
                    Ingresos para los ejercicios fiscales de los años <span class="bold">2004;</span> artículo 11,
                    sección lll , inciso A),
                    numeral 2, subinciso a), b), c) y d) de la Ley de Ingresos para los ejercicios fiscales de los años
                    <span class="bold">2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017,
                        2018 Y 2019;</span> artículo
                    10, sección lll, inciso A), numeral 2, subinciso a), b), c) y d) de la Ley de Ingresos para el
                    ejercicio fiscal 2020; artículo 9, sección lV, inciso A), numeral 2, subinciso a), b), c) y d) de la
                    Ley de Ingresos para el ejercicio fiscal 2021; artículo 9, sección V, inciso A), numeral 2,
                    subinciso a), b), c) y d) de la Ley de Ingresos para el ejercicio fiscal <span
                        class="bold">2022,2023;</span> vigente en cada
                    año las Tarifas y Cuotas contenidas en cada una de las secciones del Capítulo I “Servicios de Agua”,
                    se actualizarán mensualmente, a partir del mes de febrero, con el factor que se obtenga de dividir
                    el Índice Nacional de Precios al Consumidor, que se publique en el Diario Oficial de la Federación
                    por el Instituto Nacional de Estadística y Geografía, o por la dependencia federal que en
                    sustitución de ésta lo publique, del último mes inmediato anterior al mes por el cual se hace el
                    ajuste, entre el citado índice del penúltimo mes inmediato anterior al del mismo mes que se
                    actualiza. Los Índices Nacionales de Precios al Consumidor se publicarán los días 10 de cada mes en
                    el Diario Oficial de la Federación o por la dependencia correspondiente. En caso de que a la fecha
                    de la actualización no se haya publicado el índice citado, se tomarán los últimos publicados.
                </p>
            @endif
        @endif

        <p class="text-justify bold">Fórmula para determinar factor de actualización mensual</p>
        <p class="text-justify">
            INPC del último mes inmediato anterior al mes por el cual se hace el ajuste
            <br />
            INPC del penúltimo mes inmediato anterior al del mismo mes que se actualiza
        </p>

        <p class="bold">Para el año 2022 se agregará al factor de actualización un 0.5% acumulable cada mes</p>
        <p class="bold">Para el año 2023 se agregará al factor de actualización un 1% acumulable cada mes</p>

        @if ($data->tipo_s == 'NO DOMESTICO')
            @if ($IDdistrito == '1')
                <p class="text-justify">
                    Lo anterior, en virtud de que el contribuyente no dio cumplimiento a lo dispuesto en el último
                    párrafo del artículo 16 de la Ley que Reglamenta el Servicio de Agua Potable en el Estado de Baja
                    California, en relación con lo previsto por el artículo al artículo 11, sección lll, inciso A),
                    numeral 2, subinciso a), b), c) y d) de la Ley de Ingresos para los ejercicios fiscales de los años
                    2004; artículo 11, sección lV inciso A), numeral 2, subinciso a), b), c) y d) de la Ley de Ingresos
                    para los ejercicios fiscales de los años <span class="bold">2005, 2006, 2007, 2008, 2009, 2010,
                        2011, 2012, 2013, 2014,
                        2015, 2016, 2017, 2018 Y 2019;</span> artículo 10, sección lV, inciso A), numeral 2, subinciso
                    a), b), c) y
                    d) de la Ley de Ingresos para el ejercicio fiscal <span class="bold">2020;</span> artículo 9,
                    sección V, inciso A), numeral 2,
                    subinciso a), b), c) y d) de la Ley de Ingresos para el ejercicio fiscal <span
                        class="bold">2021;</span> artículo 9, sección
                    Vl, inciso A), numeral 2, subinciso a), b), c) y d) de la Ley de Ingresos para el ejercicio fiscal
                    <span class="bold">2022,2023</span> toda vez que omitió efectuar el pago de los derechos
                    generados por consumo de agua potable
                    que le fueron facturados por periodo mensual dentro del plazo a que se refiere el primer dispositivo
                    legal aludido en este párrafo, generando en suma por concepto de recargos acumulados la cantidad de
                    <span class="bold">{{ $ra }}</span>
                </p>
            @endif
            @if ($IDdistrito != '1')
                <p class="text-justify">
                    Lo anterior, en virtud de que el contribuyente no dio cumplimiento a lo dispuesto en el último
                    párrafo del artículo 16 de la Ley que Reglamenta el Servicio de Agua Potable en el Estado de Baja
                    California, en relación con lo previsto por el artículo al artículo 11, sección lll, inciso A),
                    numeral 2, subinciso a), b), c) y d) de la Ley de Ingresos para los ejercicios fiscales de los años
                    <span class="bold">2004;</span> artículo 11, sección lll inciso A), numeral 2, subinciso a), b),
                    c) y d) de la Ley de Ingresos
                    para los ejercicios fiscales de los años <span class="bold">2005, 2006, 2007, 2008, 2009, 2010,
                        2011, 2012, 2013, 2014,
                        2015, 2016, 2017, 2018 Y 2019;</span> artículo 10, sección lll , inciso A), numeral 2, subinciso
                    a), b), c)
                    y d) de la Ley de Ingresos para el ejercicio fiscal <span class="bold">2020;</span> artículo 9,
                    sección lV, inciso A), numeral
                    2, subinciso a), b), c) y d) de la Ley de Ingresos para el ejercicio fiscal <span
                        class="bold">2021;</span> artículo 9,
                    sección V, inciso A), numeral 2, subinciso a), b), c) y d) de la Ley de Ingresos para el ejercicio
                    fiscal <span class="bold">2022,2023</span> toda vez que omitió efectuar el pago de los derechos
                    generados por consumo de agua
                    potable que le fueron facturados por periodo mensual dentro del plazo a que se refiere el primer
                    dispositivo legal aludido en este párrafo, generando en suma por concepto de recargos acumulados la
                    cantidad de <span class="bold">{{ $ra }}</span>
                </p>
            @endif
        @endif
        @if ($data->tipo_s == 'DOMESTICO')
            @if ($IDdistrito != '1')
                <p class="text-justify">
                    Lo anterior, en virtud de que el contribuyente no dio cumplimiento a lo dispuesto en el último
                    párrafo del artículo 16 de la Ley que Reglamenta el Servicio de Agua Potable en el Estado de Baja
                    California, en relación con lo previsto por artículo 11, sección lll, inciso A), numeral 1,
                    subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de Ingresos para los ejercicios
                    fiscales de los años <span class="bold">2004</span>; artículo 11, sección lll, inciso A), numeral
                    1, subinciso a), b), c), d),
                    e), f), g), h), i), j), k) y l) de la Ley de Ingresos para los ejercicios fiscales de los años <span
                        class="bold">2005,
                        2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018 Y 2019;</span>
                    artículo 10,
                    sección lll, inciso A), numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la
                    Ley de Ingresos para el ejercicio fiscal <span class="bold">2020</span>; artículo 9, sección lV,
                    inciso A), numeral 1,
                    subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de Ingresos para el ejercicio
                    fiscal <span class="bold">2021</span> artículo 9, sección V, inciso A), numeral 1, subinciso a),
                    b), c), d), e), f), g), h),
                    i), j), k) y l) de la Ley de Ingresos para el ejercicio fiscal <span
                        class="bold">2022,2023;</span> toda vez que omitió
                    efectuar el pago de los derechos generados por consumo de agua potable que le fueron facturados por
                    periodo mensual dentro del plazo a que se refiere el primer dispositivo legal aludido en este
                    párrafo, generando en suma por concepto de recargos acumulados la cantidad de
                    <span class="bold">{{ $ra }}</span>
                </p>
            @endif
            @if ($IDdistrito == '1')
                <p class="text-justify">
                    Lo anterior, en virtud de que el contribuyente no dio cumplimiento a lo dispuesto en el último
                    párrafo del artículo 16 de la Ley que Reglamenta el Servicio de Agua Potable en el Estado de Baja
                    California, en relación con lo previsto por artículo 11, sección lll, inciso A), numeral 1,
                    subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de Ingresos para los ejercicios
                    fiscales de los años <span class="bold">2004</span>; artículo 11, sección lV, inciso A), numeral
                    1, subinciso a), b), c), d),
                    e), f), g), h), i), j), k) y l) de la Ley de Ingresos para los ejercicios fiscales de los años <span
                        class="bold">2005,
                        2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018 Y 2019;</span>
                    artículo 10,
                    sección lV, inciso A), numeral 1, subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la
                    Ley de Ingresos para el ejercicio fiscal <span class="bold">2020</span>; artículo 9, sección V,
                    inciso A), numeral 1,
                    subinciso a), b), c), d), e), f), g), h), i), j), k) y l) de la Ley de Ingresos para el ejercicio
                    fiscal <span class="bold">2021</span> artículo 9, sección Vl, inciso A), numeral 1, subinciso a),
                    b), c), d), e), f), g), h),
                    i), j), k) y l) de la Ley de Ingresos para el ejercicio fiscal <span
                        class="bold">2022,2023;</span> toda vez que omitió
                    efectuar el pago de los derechos generados por consumo de agua potable que le fueron facturados por
                    periodo mensual dentro del plazo a que se refiere el primer dispositivo legal aludido en este
                    párrafo, generando en suma por concepto de recargos acumulados la cantidad de
                    <span class="bold">{{ $ra }}</span>
                </p>
            @endif
        @endif
        </p>
        <p>En resumen, resulta a su cargo un <span class="bold">CRÉDITO FISCAL</span> relativo a la cuenta número
            <span class="bold">{{ $data->cuenta }}</span>, por la suma de
            <span class="bold">${{ $total_ar }} {{ $tar }} </span>, integrado de la siguiente forma:
        </p>
        <br />
        <table class="table2">
            <thead>
                <tr>
                    <th>Concepto
                    </th>
                    <th>Importe
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Corriente</td>
                    <td>${{ number_format($t_adeudo->sumaTarifas, 2) }}</td>
                </tr>
                <tr>
                    <td>IVA Corriente</td>
                    <td>${{ number_format($t_adeudo->saldoIvaCor, 2) }}</td>
                </tr>
                <tr>
                    <td>Atraso</td>
                    <td>${{ number_format($t_adeudo->saldoAtraso, 2) }}</td>
                </tr>
                <tr>
                    <td>Rezago</td>
                    <td>${{ number_format($t_adeudo->saldoRezago, 2) }}</td>
                </tr>
                <tr>
                    <td>Recargos Consumo</td>
                    <td>${{ number_format($t_adeudo->RecargosAcumulados, 2) }}</td>
                </tr>
                <tr>
                    <td>Convenio De Agua</td>
                    <td>${{ number_format($data->convenio_agua, 2) }}</td>
                </tr>
                <tr>
                    <td>Recargos Convenio De Agua</td>
                    <td>${{ number_format($data->recargos_convenio_agua, 2) }}</td>
                </tr>
                <tr>
                    <td>Convenio De Obra</td>
                    <td>${{ number_format($data->convenio_obra, 2) }}</td>
                </tr>
                <tr>
                    <td>Recargos Convenio De Obra</td>
                    <td>${{ number_format($data->recargos_convenio_obra, 2) }}</td>
                </tr>
                <tr>
                    <td>Gastos De Ejecución</td>
                    <td>${{ number_format($data->gastos_ejecución, 2) }}</td>
                </tr>
                <tr>
                    <td>Otros Servicios</td>
                    <td>${{ number_format($data->otros_servicios, 2) }}</td>
                </tr>
                <tr>
                    <td>Saldo Total</td>
                    <td>${{ number_format($total_ar, 2) }}</td>
                </tr>
            </tbody>
        </table>
        <div class="saltopagina"></div>
        <p class="text-justify">
            La cantidad anterior y los recargos causados sobre las contribuciones omitidas, deberán ser enteradas en las
            oficinas de Recaudación de la Comisión Estatal de Servicios Públicos de Tijuana, dentro de los quince días
            siguientes a aquel en que haya surtido efecto la notificación de la presente determinación, de conformidad
            con lo dispuesto por el artículo 16 último párrafo de la Ley que Reglamenta el Servicio de Agua Potable en
            el Estado de Baja California en relación con el artículo 23 primer párrafo, fracción I, y 24 del Código
            Fiscal del Estado de Baja California vigente, en caso de que sea omiso en su pago, el crédito fiscal
            determinado en el presente documento, será turnado para su cobro a la Sub Recaudación de Rentas adscrita a
            la Comisión Estatal de Servicios Públicos de Tijuana a través del procedimiento económico-coactivo.
        </p>
        <div style="max-height: 30px; margin-top:-2%">
            <p class="text-justify">
                Queda enterado de conformidad con el artículo 62 de la Ley del Tribunal Estatal de Justicia
                Administrativa del Estado de Baja California, en contra de la presente resolución podrá interponer
                demanda de nulidad, ante el Tribunal Estatal de Justicia Administrativa del Estado de Baja California,
                dentro del plazo de <span class="bold">QUINCE DIAS</span> hábiles siguientes a la fecha en que surta
                efectos su notificación.
            </p>
            <p class="bold">Notifíquese personalmente.</p>
            <p class="text-center bold">
                A T E N T A M E N T E
            </p>
            <p class="firm bold text-center">
                _____________________________________________
                <br />
                Dr. Víctor Daniel Amador Barragán
                Director General de la Comisión Estatal de Servicios Públicos de Tijuana.

            </p>
        </div>
    </main>
</body>

</html>