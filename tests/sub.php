<?php
// Seu objeto original com valores 1 e 3
$seuObjeto = [
    (object) ['name' => 'perg0', 'outraPropriedade' => 'valor1'],
    (object) ['name' => 'perg2', 'outraPropriedade' => 'valor3']
];

// Determine o número máximo esperado na sequência
$maximoEsperado = 4; // Você pode ajustar isso conforme necessário

// Crie um array de valores existentes
$valoresExistentes = [];
foreach ($seuObjeto as $elemento) {
    $valoresExistentes[] = $elemento->name;
}

// Encontre os valores ausentes com base na sequência esperada
$valoresAusentes = [];
for ($i = 0; $i < $maximoEsperado; $i++) {
    $valorEsperado = 'perg' . $i;
    if (!in_array($valorEsperado, $valoresExistentes)) {
        $valoresAusentes[] = $valorEsperado;
    }
}

// Adicione os valores ausentes ao objeto
foreach ($valoresAusentes as $valorAusente) {
    $seuObjeto[] = (object) ['name' => $valorAusente, 'outraPropriedade' => 'valor' . substr($valorAusente, 4)];
}

// Ordene o objeto com base na propriedade "name"
usort($seuObjeto, function ($a, $b) {
    return strnatcmp($a->name, $b->name);
});

// Agora, $seuObjeto terá a sequência completa com name = perg0, perg1, perg2, perg3 (ou qualquer outra sequência máxima que você definir)
print_r($seuObjeto);
?>