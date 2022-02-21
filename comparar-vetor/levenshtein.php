<?php

$arrayPalavras = ['TERRENO','LIXAO','NAO','MORA','LOCAL','CAPINS','LIXO','ACUMULADO','DENGUE'];
$arrayTexto = ['TERRENO','LIXAO','NAO','MORA','LOCAL','CAPINS'];


function levenshteinPalavras($arr1, $arr2)
{
   $tamanhoArrayA = count($arr1); 
   $tamanhoArrayB = count($arr2); 
   $matriz = array();

   if (($tamanhoArrayA === 0) || ($tamanhoArrayB === 0)) {
       return 0;
   }

    for ($i=0; $i <= $tamanhoArrayA; $i++) { 
        $matriz[$i][0] = $i;
    }

    for ($j=0; $j <= $tamanhoArrayB; $j++) { 
        $matriz[0][$j] = $j;
    }
    
    for ($i = 1; $i <= $tamanhoArrayA; $i++){
        for ($j = 1; $j <= $tamanhoArrayB; $j++){                   
            if($arr2[$j-1] === $arr1[$i-1])                        
                $custo = 0;
            else
                $custo = 1;
    
                $matriz[$i][$j] = min(min($matriz[$i-1][$j]+1,$matriz[$i][$j-1]+1),$matriz[$i-1][$j-1] + $custo);
        }
    }

    return $matriz[$tamanhoArrayA][$tamanhoArrayB];
}