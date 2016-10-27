<?php
function MakeUrl($title){
    /*
     ###########################################
     title = é o título que será convertido em url
     qualquer caractere que não exista no alfabeto ou que não esteja no bloco do str_replace será substituído por nada
     exemplo û será subtituído por nada, para corrigir isso se for de seu interesse faça pelo str_replace
     exemplo, para transoformar û em u $ntitle = str_replace('û','u',$ntitle);
    */
    $alphabet = "a b c d e f g h i j k l m n o p q r s t u v w x y z";
    $ntitle = mb_strtolower($title);
    $ntitle = str_replace(array("ã",'á','à'),'a',$ntitle);
    $ntitle = str_replace("ç",'c',$ntitle);
    $ntitle = str_replace(array('é','è','ë','ê'),'e',$ntitle);
    $ntitle = str_replace(array('í','ì','ï','î'),'i',$ntitle);
    $ntitle = str_replace(array('ó','ò','ô','õ'),'o',$ntitle);
    $ntitle = str_replace(array('ú','ù','ü',),'u',$ntitle);
    $ntitle = str_replace('ñ','n',$ntitle);
     $tam = strlen($ntitle);
    $clear_title =null;
    $permiditos = explode(" ",$alphabet);
    for($i=0;$i<$tam;$i++){
        $caractere = substr($ntitle,$i,1);
        if($caractere == ' ' or in_array($caractere,$permiditos)){
            $clear_title .= $caractere;
        }else{
          ///  echo "Não permido [{$caractere}] <br>";
        }
    }
    $ntitle = str_replace(array("     ","    ","   ","  "," ","----","---","--"),"-",trim($clear_title)).'.html';
    return $ntitle;

}

// exemplo de uso
$url = MakeUrl("lasaña é úma comídà gostosa e eu amo caça bruxas");
echo $url;
?>
