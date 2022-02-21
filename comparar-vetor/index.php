<?php

require_once "lista.php";
require_once "levenshtein.php";

$denucias = array();

$resultado = file_get_contents('resultado_2.json');
$objeto_denuncias = json_decode($resultado);

$numDocs = $objeto_denuncias->response->numFound;
for ($i = 0; $i < $numDocs; $i++) {
  $id = $objeto_denuncias->response->docs[$i]->id;
  $observacao = explode(' ', $objeto_denuncias->response->docs[$i]->observacao[0]);
  $denucias[$id] = implode(' ', array_intersect($observacao, $palavras));
}

$idDoc = 22056468;
$texto_similar = $denucias[$idDoc];

echo "Denuncia:<b> {$idDoc} - {$texto_similar}</b><br><br>";
foreach ($denucias as $key => $value) {
  if ($key == $idDoc) continue;
  echo "Denuncia: {$key} - {$value}<br>";
}
echo "<br><br>";



$resultado = array();
foreach ($denucias as $key => $denucia) {
  if ($key == $idDoc) continue;
  similar_text($texto_similar, $denucia, $pocentagem);
  $pocentagem = number_format($pocentagem, 2);

  $resultado[$key] = $pocentagem;
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
foreach ($denucias as $key => $denucia) {
  if ($key == $idDoc) continue;

  $total = levenshteinPalavras(explode(' ',$texto_similar), explode(' ',$denucia));
  $resultado[$key] = $total;

  //echo "Levenshtein do doc: {$idDoc} com {$key} é de {$total};<br>";
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