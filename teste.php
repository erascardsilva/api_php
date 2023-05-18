<?php
    // entrada nome do vendedor
    $nomevendedor = readline("Digite seu nome vendedor :  \n" );
    $salariofixo = readline("Informe o valor de seu sálario fixo :  \n");
    $totaldevendas = readline("Informe o valor total de vendas em dinheiro : \n");
    
    $comissao = 0.15 * $totaldevendas ;
    $total = $salariofixo + $comissao ;
    $totalsalario = number_format($total , 2 , '.','');
    
    echo "O vendedor " . $nomevendedor . " vendeu o total neste mês de " . $totaldevendas ."\n";
    echo "e recebera o total de R$ ".$totalsalario ."\n";
    
    //Json implementação
    $resultado = [
        'nomevendedor' => $nomevendedor,
        'salariofixo' =>  $salariofixo,
        'totaldevendas' => $totaldevendas,
        'totalareceber' => $total
        ];
        
    //converter array para json
    
    $jsonresultado = json_encode($resultado);
    
    //Exibir JSON
    
    echo "Exibindo resultado JSON";
    echo $jsonresultado ;
    