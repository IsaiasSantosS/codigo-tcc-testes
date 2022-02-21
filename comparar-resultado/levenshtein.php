<?php

require_once 'docs_similar.php';

$denuncias = file_get_contents('resultado_2.json');

$objeto_denuncias = json_decode($denuncias);

$principal = $objeto_denuncias->response->docs[3]->observacao[0];

$docs0 = levenshtein($principal, $objeto_denuncias->response->docs[0]->observacao[0]);
$docs1 = levenshtein($principal, $objeto_denuncias->response->docs[1]->observacao[0]);
$docs2 = levenshtein($principal, $objeto_denuncias->response->docs[2]->observacao[0]);
$docs3 = levenshtein($principal, $objeto_denuncias->response->docs[3]->observacao[0]);
$docs4 = levenshtein($principal, $objeto_denuncias->response->docs[4]->observacao[0]);
$docs5 = levenshtein($principal, $objeto_denuncias->response->docs[5]->observacao[0]);

echo "{$objeto_denuncias->response->docs[0]->id} - {$docs0}<br>
{$objeto_denuncias->response->docs[1]->id} - {$docs1}<br>
{$objeto_denuncias->response->docs[2]->id} - {$docs2}<br>
{$objeto_denuncias->response->docs[3]->id} - {$docs3}<br>
{$objeto_denuncias->response->docs[4]->id} - {$docs4}<br>
{$objeto_denuncias->response->docs[5]->id} - {$docs5}";
