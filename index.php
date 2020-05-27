<?php
// Autor: gabrielrtl
// Tratamento da variavel que ira fazer a requisição para API
$termo = "";
if(isset($_POST['termo'])){
    $termo = $_POST['termo'];
    $termo = preg_replace("/[^0-9]/", "", $termo);
}
// -----------------------------------------------------------

// Conexão e recebimento da resposta da API
$url = "https://www.receitaws.com.br/v1/cnpj/{$termo}";
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
ob_start();
curl_exec($ch); 
curl_close($ch);
$file_contents = "";
$file_contents = ob_get_contents();
ob_end_clean();
// ----------------------------------------------------------
?>

<!-- Configurações basica com formulario de envio-->
<html>
<head>
    <title>Ranstech</title>
</head>
<body>
    <style>
    #arte {
        text-align: center;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    </style>
    <div id="arte">
    <h3>Consultar Empresas</h3>
    <form action="index.php" method="post">
    criado por <a href="https://github.com/gabrielrtl" target="_blank">gabrielrtl</a> <br>
    CNPJ: <input type=text name=termo><input type=submit value="Enviar">
    </form> </br>
<!-- -------------------------------------------------- -->

    <?php
        // Codigo PHP formatando e exibindo os dados recebidos pela API

    if ($obj = json_decode($file_contents)) {
        echo "cnpj: $obj->cnpj<br>"; 
        echo "tipo: $obj->tipo<br>"; 
        echo "abertura: $obj->abertura<br>"; 
        echo "nome: $obj->nome<br>"; 
        echo "nome fantasia: $obj->fantasia<br>";
        echo "natureza juridica: $obj->natureza_juridica <br>";
        echo "logradouro: $obj->logradouro<br>";
        echo "numero: $obj->numero<br>";
        echo "complemento: $obj->complemento<br>";
        echo "cep: $obj->cep<br>";
        echo "bairro: $obj->bairro<br>";
        echo "municipio: $obj->municipio<br>";
        echo "uf: $obj->uf<br>";
        echo "email: $obj->email<br>";
        echo "telefone: $obj->telefone<br>";
        echo "uf: $obj->uf<br>";
        echo "situacao: $obj->situacao<br>";
        echo "data situação: $obj->data_situacao<br>";
        echo "motivo situação: $obj->motivo_situacao<br>";
        echo "capital social: $obj->capital_social<br>";
        }

        // ------------------------------------------------------------
    ?>
        
    </div>
</body>
<!-- Autor: gabrielrtl -->
</html>