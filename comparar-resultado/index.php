<?php

require_once 'docs_similar.php';

$denuncias = file_get_contents('resultado_2.json');
$objeto_denuncias = json_decode($denuncias);
var_dump(
  [
    $objeto_denuncias->response->docs[0]->id => $objeto_denuncias->response->docs[0]->observacao[0],
    $objeto_denuncias->response->docs[1]->id => $objeto_denuncias->response->docs[1]->observacao[0],
    $objeto_denuncias->response->docs[2]->id => $objeto_denuncias->response->docs[2]->observacao[0],
    $objeto_denuncias->response->docs[3]->id => $objeto_denuncias->response->docs[3]->observacao[0],
    $objeto_denuncias->response->docs[4]->id => $objeto_denuncias->response->docs[4]->observacao[0],
    $objeto_denuncias->response->docs[5]->id => $objeto_denuncias->response->docs[5]->observacao[0],
  ]
);

$query = $objeto_denuncias->response->docs[3]->observacao[0];
$corpus = [
  $objeto_denuncias->response->docs[0]->id => $objeto_denuncias->response->docs[0]->observacao[0],
  $objeto_denuncias->response->docs[1]->id => $objeto_denuncias->response->docs[1]->observacao[0],
  $objeto_denuncias->response->docs[2]->id => $objeto_denuncias->response->docs[2]->observacao[0],
  $objeto_denuncias->response->docs[3]->id => $objeto_denuncias->response->docs[3]->observacao[0],
  $objeto_denuncias->response->docs[4]->id => $objeto_denuncias->response->docs[4]->observacao[0],
  $objeto_denuncias->response->docs[5]->id => $objeto_denuncias->response->docs[4]->observacao[0],
];

$match_results = get_similar_documents($query, $corpus);
echo '<pre>';
print_r($match_results);
echo '</pre>';
