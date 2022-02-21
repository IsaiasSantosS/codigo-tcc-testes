<?php

$palavra_certa = "CHIKUNGUNYA";
$palavras = ["CHICUNGUNHA", "XICUNGUNHA", "CHIKUHUYAN", "CHIGUNGUNHA", "CHIKGUNHA", "SHIKUNGUNIA", "CHICUGUNHA", "CHICOGUINHA", "CHICONGUNHA", "XICUGUNHA", "CHIGUNCUNHA"];

echo $palavra_certa, "<br><br>";
foreach ($palavras as $palavra) {
  //$pocentagem = levenshtein($palavra_certa, $palavra);
  //echo $palavra . " - " . $pocentagem . "<br>";
  similar_text($palavra_certa, $palavra, $pocentagem);
  echo $palavra . " - " . number_format($pocentagem, 2) . "%<br>";
}

//outro exemplo
$texto_um = "MATO MUITO ALTO AUMENTO DO NMERO DE MOSQUITOS E INSETOS NOS ARREDORES";
$texto_dois = "MATOS GRANDES E POSSVEL FOCOS DE DENGUE";
similar_text($texto_um, $texto_dois, $pocentagem_um);
similar_text($texto_dois, $texto_um, $pocentagem_dois);
echo "<br>";
echo number_format($pocentagem_um, 2) . "%<br>";
echo number_format($pocentagem_dois, 2) . "%<br>";
