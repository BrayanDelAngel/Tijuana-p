<?php

use App\Models\CatalogoDistrito;
use App\Models\cobranzaExternaHistoricos;
use Illuminate\Support\Facades\DB;

function webServiceDistrito($cuenta)
{

    ini_set('max_execution_time', 0);
    ini_set('memory_limit', '-1');
    //Ruta del API que se va a concectar esto esta en el archivo .env
    $baseUrl = env('API_ENDPOINT');

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $baseUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
      <soap:Body>
        <ConsultaCuenta xmlns="http://tempuri.org/">
          <pNoCta>' . $cuenta . '</pNoCta>
        </ConsultaCuenta>
      </soap:Body>
    </soap:Envelope>',
        CURLOPT_HTTPHEADER => array(
            'SOAPAction: http://tempuri.org/ConsultaCuenta',
            'Content-Type: text/xml; charset=utf-8'
        ),
    ));

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
    $historicos = $array['soapBody']['ConsultaCuentaResponse']['ConsultaCuentaResult'];
    //Si no recibe un mensaje de error por parte de la API (Por ejemplo cuenta no existe
    if ($historicos['Mensaje'] == 'CUENTA ASIGNADA') {
        if (count($historicos) > 0) {
            $Distrito = (is_array($historicos['Distrito'])) ? '' : $historicos['Distrito'];
            if (countDistrito($Distrito) == 0) {
                insertDistrito($Distrito);
            }
                $id_distrito= consultIdDistrito($Distrito);
            return $id_distrito['id_distrito'];
        }
    }
}
function countDistrito($distrito)
{
    $result = CatalogoDistrito::where('distrito', $distrito)->count('distrito', $distrito);
    return $result;
}
function consultIdDistrito($distrito)
{
    $result = CatalogoDistrito::select('id_distrito')->where('distrito', $distrito)->first();
    return $result;
}
function consultDistrito($cuenta)
{
    // $cuenta=addStrlCuenta($cuenta);
    $distrito=cobranzaExternaHistoricos::join('catalago_distrito as ct','cobranzaExternaHistoricosWS3.id_distrito','=','ct.id_distrito')->
    select('distrito','cobranzaExternaHistoricosWS3.id_distrito as id_distrito')->where('NoCta',$cuenta)->first();
    return $distrito;
}
function insertDistrito($Distrito)
{
    $insert = new CatalogoDistrito;
    $insert->distrito = $Distrito;
    $insert->save();
}
function addStrlCuenta($cuenta){
    $countCaracteres=strlen($cuenta);
    if($countCaracteres<=5){
        $cuenta=$cuenta.'00';
    }
    if($countCaracteres<=6){
        $cuenta=$cuenta.'0';
    }
    if($countCaracteres<=7){
        $cuenta=$cuenta;
    }
    return $cuenta;
}

