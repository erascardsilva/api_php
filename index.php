<!DOCTYPE html>
<html>

<head>
    <title>Busca IBGE por nome</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            font-family: Arial, sans-serif;
        }

        form {
            width: 300px;
        }

        .resultado {
            margin-top: 20px;
            border-top: 1px solid #000;
            padding-top: 20px;
        }

        .resultado-item {
            margin-bottom: 10px;
            padding-left: 10px;
        }

        .resultado-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background-color: #000;
        }
    </style>
</head>

<body>
    <div>
       <h1> <center>Busca por nome IBGE</center></h1>
       <h3> Retorna quantidade de registro por ano </h3> 
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            <br><br>
            <input type="submit" value="Enviar">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verifica se o campo "nome" foi preenchido
            if (isset($_POST['nome']) && !empty($_POST['nome'])) {
                $nome = $_POST['nome'];

                $options = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false
                    )
                );

                $context = stream_context_create($options);
                $linknome = "https://servicodados.ibge.gov.br/api/v2/censos/nomes/" . $nome;

                $resposta = file_get_contents($linknome, false, $context);

                if ($resposta !== false) {
                    $dados = json_decode($resposta, true);

                    if ($dados !== null && is_array($dados)) {
                        echo '<div class="resultado">';
                        foreach ($dados as $item) {
                            echo '<div class="resultado-item">';
                            echo '<br>';
                            echo $item['nome'] . '  : ' . '<br>';

                            if (isset($item['res'])) {
                                foreach ($item['res'] as $res) {
                                    echo '<hr>';
                                    echo $res['periodo'] . ' - ' . $res['frequencia'] . '<br>';
                                }
                            } else {
                                echo 'Dados ausentes para o nome ' . $item['nome'] . '<br>';
                            }
                            echo '</div>';
                        }
                        echo '</div>';
                    } else {
                        echo 'Erro na decodificação da resposta JSON ou dados ausentes.';
                    }
                } else {
                    echo 'Erro ao obter os dados da API.';
                }
            } else {
                echo "O campo nome é obrigatório.";
            }
        }
        ?>
    </div>
</body>

</html>