<?php

//dados da api
$urlBase  = "https://nominatim.openstreetmap.org/search?format=json&city=recife&";
$context = stream_context_create(
  array(
    "http" => array(
      "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
    )
  )
);

$denuncias = file_get_contents('PDA_LATITUDE_NEGATIVO_ESPACIAL.json');
$objeto_denuncias = json_decode($denuncias);

foreach ($objeto_denuncias as $key => $denuncia) {
  $localidade = explode(',', $objeto_denuncias[$key]->localidade);

  $latitude = floatval($localidade[0]);
  $longitude = floatval($localidade[1]);

  if (($latitude === 0.0) || ($longitude === 0.0)) {
    $bairro = urlencode($objeto_denuncias[$key]->bairro);
    $logradouro = urlencode($objeto_denuncias[$key]->logradouro);
    $url = $urlBase . "street={$logradouro}&county={$bairro}";

    $html = json_decode(file_get_contents($url, false, $context));
    if ($html) {
      $objeto_denuncias[$key]->localidade = $html[0]->lat . ',' . $html[0]->lon;
    }
  }
}

file_put_contents('PDA_NOVO.json', json_encode($objeto_denuncias));
