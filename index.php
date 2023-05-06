<?php
$options = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false
    )
);

$context = stream_context_create($options);

$url = "https://servicodados.ibge.gov.br/api/v2/censos/nomes/erasmo";

$resposta = file_get_contents($url, false, $context);

if ($resposta !== false) {
    $dados = json_decode($resposta, true);

    if ($dados !== null && is_array($dados)) {
        foreach ($dados as $item) {
            echo $item['nome'] . '  : ' . '<br>';

            if (isset($item['res'])) {
                foreach ($item['res'] as $res) {
                   echo   $res['periodo'] . ' - ' . $res['frequencia'] . '<br>';
                }
            } else {
                echo 'Dados ausentes para o nome ' . $item['nome'] . '<br>';
            }
        }
    } else {
        echo 'Erro na decodificação da resposta JSON ou dados ausentes.';
    }
} else {
    echo 'Erro ao obter os dados da API.';
}
?>
