<?php
//PEGA A FUNÇÃO QUE REALIZA OS CÁLCULOS
   if(!file_exists(require_once("../modulos/funcoes.php"))){
    require_once("../modulos/funcoes.php");
   }    
//DECLARANDO AS VARIAVEIS
$resultado = (float) 0;
$valor1 = (float) 0;
$valor2 = (float) 0;
$operacao = (string) "";
$chksomar = (string) "";
$chksubtrair = (string) "";
$chkmultiplicar = (string) "";
$chkdividir = (string) "";
$erro = "";

//TESTE SE O BOTÃO FOI ACIONADO
if(isset($_POST['btncalc']))
{
    
    //RESGATE DOS VALORES DIGITADOS/SELECIONADOS
    $valor1 = str_replace(",",".",$_POST['txtv1']);
    $valor2 = str_replace(",",".",$_POST['txtv2']);
    
    //TESTE SE OS VALORES FORAM DIGITADOS //SE OPÇÃO FOI SELECIONADA
    if($valor1 == "" || $valor2 == "" || isset($_POST['rdocalc'])==false)
        $erro = ERRO_CAIXA_VAZIA ;
    
    //TESTE SE OS VALORES DIGITADOS SÃO NUMÉRICOS
    elseif(!is_numeric($valor1) || !is_numeric($valor2))
       $erro = ERRO_CARACTER_INVALIDO;
    else
    {
        $operacao = strtoupper($_POST['rdocalc']); 
        // CHAMA A FUNÇÃO CALCULAR
        $resultado = calculadoraSwitch($valor1, $valor2, $operacao);
    }           
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Calculadora Simples | PHP
        </title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
       <link rel="stylesheet" type="text/css" href="../css/default.css">
    </head>
    <body>
        <!-- CABEÇALHO  -->
        <?php 
            if(!file_exists(require_once("header.php")))
                 require_once("header.php");
        ?>
        <!-- CONTEÚDO       -->
        <section id="main">
            <div class="conteudo center">
                <div id="titulos"> 
                    <h1> Calculadora Simples (com Switch) </h1>
                    <?php echo("<p>".MENSAGEM_INICIAL."</p>")?>
                </div>
                <form method="post" action="calculadorasw.php" name="frmcalc">
                     <!-- Caixa de textos  -->
                    <div id="valores">
                        <div class="valor_item"> Valor 1: <input type="text" name="txtv1" maxlength="20" size="20" value="<?php echo($valor1)?>"></div>
                        <div class="valor_item"> Valor 2: <input type="text" name="txtv2" maxlength="20" size="20" value="<?php echo($valor2)?>"> </div>
                    </div>
                    <!-- Tipo de operação -->
                    <div id="tipo">
                        <div class="caixa_tipo">
                        <input class="input" type="radio" name="rdocalc" value="somar" <?php echo($chksomar); ?> ><span> Somar</span>
                        <br>
                        <input class="input" type="radio" name="rdocalc" value="subtrair" <?php echo($chksubtrair); ?> ><span> Subtrair</span>
                        <br>
                        </div>
                        <div class="caixa_tipo">
                        <input  class="input"type="radio" name="rdocalc" value="multiplicar" <?php echo($chkmultiplicar); ?> ><span> Multiplicar </span>
                        <br>
                        <input class="input" type="radio" name="rdocalc" value="dividir" <?php echo($chkdividir); ?> ><span> Dividir </span>
                        <br>
                        </div>
                        <input class="botao" type="submit" name="btncalc" value="Calcular">
                       <div id="botao"><a href="calculadorasw.php" > Novo </a></div>
                    </div>
                    <!-- Resultado  -->
                   <h2>O Resultado é: </h2>
                        <div id="resultado">
                            <?php echo(number_format($resultado, 2, ',', ' ')); ?>
                        </div>
                </form>
               <div id="erro">
                    <?php echo($erro) ?>
                </div>
            </div>
        </section>
    </body>
</html>