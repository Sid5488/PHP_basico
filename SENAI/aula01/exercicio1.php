<!--TAG PHP-->
<!-- Toda variavel se inicia com o simbolo de $ ~sifrão-->
<?php
    $nome = $_GET['txtnome'];
    echo($nome);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Aula 01 - PHP
        </title>
        <meta charset="utf-8">
    </head>
    <body>
        <!-- CRIANDO FORMULÁRIOS -->
        <!-- Name: nome do elemento no html
             Method: método de armazenar os dados
                get - recebe os dados digitados no formulário e os envia/guarda para/na url da págima ~visível p/ o usuário
                post - recebe e envia/guarda diretamente para/no cache do navegador ~oculto p/ o usuário
             Action: local que recebe/usa os dados
        -->
        <form name="frmexercicio1" method="get" action="exercicio1.php">
            Nome:
            <input type="text" name="txtnome" value="" size="50">
            <!-- Botão:    type:"button" ~só se usar javascript      -->
            <input type="submit" name="btnok" value="Ok">
        </form>
    </body>
</html>