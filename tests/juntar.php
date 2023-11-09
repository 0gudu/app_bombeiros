<?php 
    require_once "../src/includes/api.php";
    //$draw->juntarpergs();

    $dados = [];

    // Caminhos dos arquivos JSON
    $caminhos = [
        "../src/json/perguntas1.json",
        "../src/json/perguntas2.json",
        "../src/json/perguntas3.json",
        "../src/json/perguntas4.json",
        "../src/json/perguntas5.json",
        "../src/json/perguntas6.json"
    ];

    foreach ($caminhos as $caminho) {
        $dados[] = json_decode(file_get_contents($caminho), true);
    }

    $mergedArray = array_merge(...$dados);
    $jsCode = "var mergedArray = " . json_encode($mergedArray) . ";";

    file_put_contents("merged.js", $jsCode);

    echo "Arquivo merged.js criado com sucesso.";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<script src="merged.js"></script>
<script>
   console.log(mergedArray);
</script>
</html>