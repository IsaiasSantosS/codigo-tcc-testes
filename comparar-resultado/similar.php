<?php

require_once 'docs_similar.php';

$denuncias = file_get_contents('resultado_2.json');
$objeto_denuncias = json_decode($denuncias);

$numDocs = $objeto_denuncias->response->numFound;
$principal = $objeto_denuncias->response->docs[2]->observacao[0];
$idDoc = $objeto_denuncias->response->docs[2]->id;

$resultado = array();
for ($i = 0; $i < $numDocs; $i++) {
  $denucia = $objeto_denuncias->response->docs[$i]->observacao[0];
  $key = $objeto_denuncias->response->docs[$i]->id;
  if($idDoc !== $key){
    similar_text($principal, $denucia, $pocentagem);
    $resultado[$key] = number_format($pocentagem, 2);
  }
}

arsort($resultado);
echo "<h4>Com a função similar_text</h4>";
echo "<table border='1'>";
echo "<tr> <td> Documentos </td> <td>Similaridade</td> </tr>";
foreach ($resultado as $key => $value) {
  echo "<tr> <td> {$key} </td> <td>{$value}%</td> </tr>";
  //echo "Similaridade do doc: {$idDoc} com {$key} é de {$value}%;<br>";
}
echo "</table>";


echo "<br><br>";
$resultado = array();
for ($i = 0; $i < $numDocs; $i++) {
  $denucia = $objeto_denuncias->response->docs[$i]->observacao[0];
  $key = $objeto_denuncias->response->docs[$i]->id;
  if($idDoc !== $key){
    $resultado[$key] = levenshtein($principal, $denucia);
    //echo "Levenshtein do doc: {$idDoc} com {$key} é de {$total};<br>";
  }
}

asort($resultado);
echo "<h4>Com a função levenshtein</h4>";
echo "<table border='1'>";
echo "<tr> <td> Documentos </td> <td>Similaridade</td> </tr>";
foreach ($resultado as $key => $value) {
  echo "<tr> <td> {$key} </td> <td>{$value}</td> </tr>";
  //echo "Levenshtein do doc: {$idDoc} com {$key} é de {$value};<br>";
}
echo "</table>";