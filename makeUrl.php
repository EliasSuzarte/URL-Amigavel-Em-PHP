<?php
function makeUrl($title){
    /*
    A vantagem nesse script é que ele remove qualquer caractere que não foi adicionado como permitido(todo o alfabeto sem acentos)
    e que não foi adicionado para substituição (ex: ú -> u)
    
   Uso em projetos pessoais e não vejo necessidade em implmentar outras substiuições como  û para u, uma vez que considero que nunca utilizarei tal letra com tal acento
   mas considero que tais implementações seria válida em muitos caso.
    
    ###########################################
     title = é o título que será convertido em url
     qualquer caractere que não exista no alfabeto ou que não esteja no bloco do str_replace será substituído por nada
     exemplo û será subtituído por nada, para corrigir isso se for de seu interesse faça pelo str_replace
     exemplo, para transoformar û em u $ntitle = str_replace('û','u',$ntitle);
    */
    $alphabet = "a b c d e f g h i j k l m n o p q r s t u v w x y z 0 1 2 3 4 5 6 7 8 9 -";
    $ntitle = mb_strtolower($title);
    $ntitle = str_replace(array("ã",'á','à','â'),'a',$ntitle);
    $ntitle = str_replace("ç",'c',$ntitle);
    $ntitle = str_replace(array('é','è','ë','ê'),'e',$ntitle);
    $ntitle = str_replace(array('í','ì','ï','î'),'i',$ntitle);
    $ntitle = str_replace(array('ó','ò','ô','õ'),'o',$ntitle);
    $ntitle = str_replace(array('ú','ù','ü'),'u',$ntitle);
    $ntitle = str_replace('ñ','n',$ntitle);
     $tam = strlen($ntitle);
    $clear_title =null;
    $permitidos = explode(" ",$alphabet);
    for($i=0;$i<$tam;$i++){
        $caractere = substr($ntitle,$i,1);
        if($caractere == ' ' or in_array($caractere,$permitidos)){
            $clear_title .= $caractere;
        }else{
          ///  echo "O seguinte caractere não é permitido [{$caractere}] <br>";
        }
    }
    $ntitle = str_replace(array("     ","    ","   ","  "," ","----","---","--"),"-",trim($clear_title)).'.html';
    return $ntitle;

}

// exemplo de uso
$url = makeUrl("lasaña é úma comídà gostosa ó vira o e ú vira u :) ");
echo $url;
?>
