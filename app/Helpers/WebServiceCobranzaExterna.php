<?php

use App\Models\cobranzaExternaHistoricos;
use Illuminate\Support\Facades\DB;
use \Staudenmeir\EloquentParamLimitFix\ParamLimitFix;

function webServiceCobranzaExterna($cuenta)
{
    ini_set('max_execution_time', 0);
    ini_set('memory_limit', '-1');
    //Ruta del API que se va a concectar esto esta en el archivo .env
    $baseUrl = env('API_ENDPOINT');
    //Inicializa el CURL
    $curl = curl_init();
    //Configuraciones del curl para la peticion
    curl_setopt_array($curl, array(
        CURLOPT_URL => $baseUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //Se define el metodo de envio
        CURLOPT_CUSTOMREQUEST => 'POST',
        //Cuerpo del body a enviar mediante la cuenta 
        CURLOPT_POSTFIELDS => '<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <ConsultaCuentaHistorico xmlns="http://tempuri.org/">
                    <pNoCta>' . $cuenta . '</pNoCta>
                    </ConsultaCuentaHistorico>
                </soap:Body>
                </soap:Envelope>',
        //Header que se enviaran 
        CURLOPT_HTTPHEADER => array(
            'SOAPAction: http://tempuri.org/ConsultaCuentaHistorico',
            'Content-Type: text/xml; charset=utf-8'
        ),
    ));
    //Se recibe un response del enpoint
    $response = curl_exec($curl);
    //Se cierra la peticion
    curl_close($curl);
    //Se hace un remplazo de caracteres de la respuesta 
    $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
    //Se comvierte en un archivo XML simple
    $xml = new \SimpleXMLElement($response);
    //Se decofica a un archivo JSON y se vuelve a codificar
    $array = json_decode(json_encode((array)$xml), TRUE);
    //Se genera un arreglo del nivel mas bajo de la respuesta que es Historicos Cuenta 
    $historicos = $array['soapBody']['ConsultaCuentaHistoricoResponse']['ConsultaCuentaHistoricoResult']['HistoricoCuenta'];
    //Si no recibe un mensaje de error por parte de la API (Por ejemplo cuenta no existe)
    if (!isset($historicos['Mensaje'])) {
        //Se condiciona que si Historicos es mayor a 0 se realice el recorrido 
        if (consultCuenta($cuenta) != 0) {
            deleteCuenta($cuenta);
        }
        if (count($historicos) > 0) {
            foreach ($historicos as $historico) {
                //Se extrae el dato del arreglo y condiciona que si no hay un dato entonces sea null ''
                //En caso de las fechas se les convierte a na fecha aceptada a sql server ya que espera un dato de tipo Date Time
                $NoCta = (is_array($historico['NoCta'])) ? '' : remove($historico['NoCta']);
                $NoFactura = (is_array($historico['NoFactura'])) ? '' : $historico['NoFactura'];
                $FechaFact = (is_array($historico['FechaFact'])) ? '' : convertDate($historico['FechaFact']);
                $Anio = (is_array($historico['Anio'])) ? '' : $historico['Anio'];
                $Mes = (is_array($historico['Mes'])) ? '' : $historico['Mes'];
                $FechaLecturaAnterior = (is_array($historico['FechaLecturaAnterior'])) ? '' : convertDate($historico['FechaLecturaAnterior']);
                $FechaLecturaActual = (is_array($historico['FechaLecturaActual'])) ? '' : convertDate($historico['FechaLecturaActual']);
                $Concal = (is_array($historico['Concal'])) ? '' : $historico['Concal'];
                $SaldoCorriente = (is_array($historico['SaldoCorriente'])) ? '' : $historico['SaldoCorriente'];
                $SaldoIvaCor = (is_array($historico['SaldoIvaCor'])) ? '' : $historico['SaldoIvaCor'];
                $SaldoAtraso = (is_array($historico['SaldoAtraso'])) ? '' : $historico['SaldoAtraso'];
                $SaldoRezago = (is_array($historico['SaldoRezago'])) ? '' : $historico['SaldoRezago'];
                $RecargosAcum = (is_array($historico['RecargosAcum'])) ? '' : $historico['RecargosAcum'];
                $IvaReacum = (is_array($historico['IvaReacum'])) ? '' : $historico['IvaReacum'];
                $Fecha_vto = (is_array($historico['Fecha_vto'])) ? '' : convertDate($historico['Fecha_vto']);
                //Se llama al helper de distrito ya que abra diferentes formatos dependiendo del tipo de distrito que sea
                $id_distrito=webServiceDistrito($NoCta);
                //Capturamos errores si hay en la insercion
                try {
                    $insert = new cobranzaExternaHistoricos();
                    $insert->NoCta = $NoCta;
                    $insert->noFact = $NoFactura;
                    $insert->fechaFact = $FechaFact;
                    $insert->anio = $Anio;
                    $insert->mes = $Mes;
                    $insert->fechaLecturaAnterior = $FechaLecturaAnterior;
                    $insert->fechaLecturaActual = $FechaLecturaActual;
                    $insert->conCal = $Concal;
                    $insert->saldoCorriente = $SaldoCorriente;
                    $insert->saldoIvaCor = $SaldoIvaCor;
                    $insert->saldoAtraso = $SaldoAtraso;
                    $insert->saldoRezago = $SaldoRezago;
                    $insert->recargosAcum = $RecargosAcum;
                    $insert->ivaReacum = $IvaReacum;
                    $insert->cuentaImplementta = $NoCta;
                    $insert->fechavto = $Fecha_vto;
                    $insert->id_distrito = $id_distrito;
                    $insert->save();
                } catch (Exception $e) {
                    return 'Error al insertar';
                }
            }
            return 'Registrado';
        }
    } else {
        //Si manda un mensaje es por que la cuenta no esta registrada
        return 'Cuenta no registrada';
    }
}
function consultCuenta($cuenta)
{
    $consult = cobranzaExternaHistoricos::where('NoCta',$cuenta)->count();
    return $consult;
}
function deleteCuenta($cuenta)
{
    $delete = cobranzaExternaHistoricos::where('NoCta',$cuenta)->delete();
}
function convertDate($fecha)
{
        $date = str_replace(' 12:00:00 a. m.', '', $fecha);
        $date = str_replace('/', '-', $date);
        $date = date("Y-m-d H:i:s", strtotime($date));
   
    return $date;
}
function remove($cuenta){
    $char = substr($cuenta, 0, 1);
    $char2 = substr($cuenta, 0, 2);
    if ($char2 == '00') {
        $cuenta = substr($cuenta, 2);
    }
    else if ($char == '0') {
        $cuenta = substr($cuenta, 1);
    } 
    return $cuenta;
}