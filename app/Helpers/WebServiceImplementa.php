<?php
function webServiceImplementa($cuenta)
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
        CURLOPT_POSTFIELDS =>'<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
        <soap:Body>
          <ConsultaCuenta xmlns="http://tempuri.org/">
            <pNoCta>'.$cuenta.'</pNoCta>
          </ConsultaCuenta>
        </soap:Body>
      </soap:Envelope>',
        CURLOPT_HTTPHEADER => array(
          'SOAPAction: http://tempuri.org/ConsultaCuenta',
          'Content-Type: text/xml; charset=utf-8'
        ),
      ));

    $response = curl_exec($curl);

    curl_close($curl);
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
        foreach($historicos as $historico){
            $Cuenta = (is_array($historico['NoCta'])) ? '' : $historico['NoCta'];
            $Clave = (is_array($historico['CveCata'])) ? '' : $historico['CveCata'];
            $Expediente = (is_array($historico[''])) ? '' : $historico[''];
            $Propietario = (is_array($historico['Nombre'])) ? '' : $historico['Nombre'];
            $Calle = (is_array($historico['Direccion'])) ? '' : $historico['Direccion'];
            $NumExt = (is_array($historico[''])) ? '' : $historico[''];
            $NumInt = (is_array($historico[''])) ? '' : $historico[''];
            $Colonia = (is_array($historico['Colonia'])) ? '' : $historico['Colonia'];
            $Poblacion = (is_array($historico['Dto'])) ? '' : $historico['Dto'];
            $CP = (is_array($historico[''])) ? '' : $historico[''];
            $TipoServicio = (is_array($historico['TipoServicio'])) ? '' : $historico['TipoServicio'];
            $Giro = (is_array($historico['Giro'])) ? '' : $historico['Giro'];
            $SerieMedidor = (is_array($historico['SerieMedidor'])) ? '' : $historico['SerieMedidor'];
            $DeudaTotal = (is_array($historico['DeudaTotal'])) ? '' : $historico['DeudaTotal'];
            $Rango = (is_array($historico[''])) ? '' : $historico[''];
            $IdAdeudo = (is_array($historico[''])) ? '' : $historico[''];
            $FechaUltimoPago = (is_array($historico['FechaUltimoPago'])) ? '' : $historico['FechaUltimoPago'];
            $IdEstatus = (is_array($historico[''])) ? '' : $historico[''];
            $IdTarea = (is_array($historico[''])) ? '' : $historico[''];
            $IdAspUser = (is_array($historico[''])) ? '' : $historico[''];
            $FechaAsignacion = (is_array($historico[''])) ? '' : $historico[''];
            $FechaVencimiento = (is_array($historico['FechaVencimiento'])) ? '' : $historico['FechaVencimiento'];
            $FechaActualizacion = (is_array($historico[''])) ? '' : $historico[''];
            $CuentaUnificada = (is_array($historico[''])) ? '' : $historico[''];
            $Latitud = (is_array($historico[''])) ? '' : $historico[''];
            $Longitud = (is_array($historico[''])) ? '' : $historico[''];
            $PosicionX = (is_array($historico[''])) ? '' : $historico[''];
            $PosicionY = (is_array($historico[''])) ? '' : $historico[''];
            $TotalPagado = (is_array($historico[''])) ? '' : $historico[''];
            $Manzana = (is_array($historico[''])) ? '' : $historico[''];
            $Lote = (is_array($historico[''])) ? '' : $historico[''];
            $EntreCalle1 = (is_array($historico[''])) ? '' : $historico[''];
            $EntreCalle2 = (is_array($historico[''])) ? '' : $historico[''];
            $Referencia = (is_array($historico[''])) ? '' : $historico[''];
            $RazonSocial = (is_array($historico[''])) ? '' : $historico[''];
            $Estatus = (is_array($historico[''])) ? '' : $historico[''];
            $cont_diametro = (is_array($historico[''])) ? '' : $historico[''];
            $EstatusZona = (is_array($historico[''])) ? '' : $historico[''];
            $mesesAdeudo = (is_array($historico[''])) ? '' : $historico[''];
        }
    } else {
        //Si manda un mensaje es por que la cuenta no esta registrada
        return 'Cuenta no registrada';
    }
}
