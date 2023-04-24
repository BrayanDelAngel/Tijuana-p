<?php
use App\Models\interesesCuentaModel;
function webServiceInteresesCuenta($cuenta)
{
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
        CURLOPT_POSTFIELDS => '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"
            xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
            <soap:Body>
                <ConsultaCuenta xmlns="http://tempuri.org/">
                    <pNoCta>'.$cuenta.'</pNoCta>
                </ConsultaCuenta>
            </soap:Body>
        </soap:Envelope>',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: text/xml; charset=utf-8',
            'SOAPAction: http://tempuri.org/ConsultaCuenta',
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
    $array = json_decode(json_encode((array) $xml), true);
    //Se genera un arreglo del nivel mas bajo de la respuesta que es Historicos Cuenta
    $historicos = $array['soapBody']['ConsultaCuentaResponse']['ConsultaCuentaResult'];
    // print_r($historicos);
    //Si no recibe un mensaje de error por parte de la API (Por ejemplo cuenta no existe)
    if ($historicos['Mensaje']=='CUENTA ASIGNADA') {
      if (consultCuentaIntereses($cuenta) != 0) {
        deleteCuentaIntereses($cuenta);
      }
      //Se condiciona que si Historicos es mayor a 0 se realice el recorrido
        if (count($historicos) > 0) {
                //Convertirmos el numero en un dato de tipo flotante para la base de datos ya que desde el 
                //web service viene de tipo de string
                //La funcion remove proviene del helper WebServiceCobranzaExterna
                $Cuenta = (is_array($historicos['NoCta'])) ? '' : remove($historicos['NoCta']);
                $SdoConvAgua = (is_array($historicos['SdoConvAgua'])) ? '' : convertFloat($historicos['SdoConvAgua']);
                $RecargosConvenio = (is_array($historicos['RecargosConvenio'])) ? '' : convertFloat($historicos['RecargosConvenio']);
                $SaldoConvObra = (is_array($historicos['SaldoConvObra'])) ? '' : convertFloat($historicos['SaldoConvObra']);
                $RecargosContrato = (is_array($historicos['RecargosContrato'])) ? '' : convertFloat($historicos['RecargosContrato']);
                $GastosEjec = (is_array($historicos['GastosEjec'])) ? '' : convertFloat($historicos['GastosEjec']);
                $Multas = (is_array($historicos['Multas'])) ? '' : convertFloat($historicos['Multas']);
                //Capturamos errores si hay en la insercion
                try {

                    $insert = new interesesCuentaModel();
                    $insert->NoCta = $Cuenta;
                    $insert->RecargosConvenio = $RecargosConvenio;
                    $insert->SaldoConvObra = $SaldoConvObra;
                    $insert->RecargosContrato = $RecargosContrato;
                    $insert->SdoConvAgua = $SdoConvAgua;
                    $insert->GastosEjec = $GastosEjec;
                    $insert->Multas = $Multas;
                    $insert->save();
                } catch (Exception $e) {
                    return 'Error al insertar intereses';
                }
            return 'Registrado intereses';
        }
    } else {
        //Si manda un mensaje es por que la cuenta no esta registrada
        return 'Cuenta no registrada intereses';
    }
}
function consultCuentaIntereses($cuenta)
{
    $consult = interesesCuentaModel::where('NoCta', $cuenta)->count();
    return $consult;
}
function deleteCuentaIntereses($cuenta)
{
    $delete = interesesCuentaModel::where('NoCta', $cuenta)->delete();
}
function convertFloat($str)
{
    $str = str_replace('$', '', $str);
    $str = str_replace(',', '', $str);
    return $str;
}
