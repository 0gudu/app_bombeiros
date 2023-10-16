<?php
require("../../includes/api.php");
$user = $_SESSION['user'];
$cat = $_GET['cat'];
$quest = $_GET['quest'];
$answers = $_GET['answers'];
$inputnum = $_GET['inputnum'];
$prox = $quest + 1;
$q = json_decode($answers);
$n = count($q);

echo 'o quanto que tem é: ' . $n . 'o quanto que falaram que tem é:' . $inputnum . "<br>";

// Determine o número máximo esperado na sequência
$maximoEsperado = $inputnum; 

// Crie um array de valores existentes
$valoresExistentes = [];
foreach ($q as $elemento) {
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
    $q[] = (object) ['name' => $valorAusente, 'value' => 'off'];
}

// Ordene o objeto com base na propriedade "name"
usort($q, function ($a, $b) {
    return strnatcmp($a->name, $b->name);
});
print_r($q);

$catp = $cat + 1;
$q = json_encode($q);
$db->svquests("$user", "$cat", "$quest", "$q");


$db->proxcat($user, $catp);
header("Location: ../ocorrencia.php");
?>