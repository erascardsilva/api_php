<?php

function calcularQuantidadeLEDs($numero) {
    $digitos = str_split($numero);
    $quantidadeLEDs = 0;
  
    $configLEDS = [
      1 => 2,  // LED para o dígito 1
      2 => 5,  // LED para o dígito 2
      3 => 5,  // LED para o dígito 3
      4 => 4,  // LED para o dígito 4
      5 => 5,  // LED para o dígito 5
      6 => 6,  // LED para o dígito 6
      7 => 3,  // LED para o dígito 7
      8 => 7,  // LED para o dígito 8
      9 => 6,  // LED para o dígito 9
      0 => 6,  // LED para o dígito 0
    ];
  
    foreach ($digitos as $digito) {
      $quantidadeLEDs += $configLEDS[$digito];
    }
  
    return $quantidadeLEDs;

  }
  $numero = 12345;
  $quantidade = calcularQuantidadeLEDs($numero);
  echo "Quantidade de LEDs necessários: " . $quantidade;

  