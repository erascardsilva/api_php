<?php

    echo " Painel João ";
    
    // função painel
    
    function calculaleds($leds){
        $digitos = str_split($leds);
        $quantidadeleds = 0;
        
        $configleds = [
            1 => 2 , // 1
            2 => 5 , // 2
            3 => 5 , // 3
            4 => 4 , // 4
            5 => 5 , // 5
            6 => 6 , // 6
            7 => 3 , // 7
            8 => 7 , // 8
            9 => 6 , // 9
            0 => 6 , // 0
            ];
    
foreach ( $digitos as $digitos){
    $quantidadeleds += $configleds[$digitos];
    
};

return $quantidadeleds ;

}

$leds = 12345 ;
$quantidade = calculaleds($leds);
echo "Quantidade de Leds necessarios = " . $quantidade ;

?>