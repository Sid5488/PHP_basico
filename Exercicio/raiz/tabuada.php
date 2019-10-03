<?php
    //
    $resultado ="";

    $erro = "";
    
    
   //PEGA A FUNÇÃO QUE REALIZA OS CÁLCULOS
   if(!file_exists(require_once("../modulos/funcoes.php"))){
    require_once("../modulos/funcoes.php");
   }

    if(isset($_GET['btncalc']))
{
    
    //RESGATE DOS VALORES DIGITADOS/SELECIONADOS
    $numero = str_replace(",",".",$_GET['txttabuada']);
    $contador = str_replace(",",".",$_GET['txtcontador']);
    
    //TESTE SE OS VALORES FORAM DIGITADOS //SE OPÇÃO FOI SELECIONADA
    if($numero == "" || $contador == "")
        $erro = ERRO_CAIXA_VAZIA;
    
    //TESTE SE OS VALORES DIGITADOS SÃO NUMÉRICOS
    elseif(!is_numeric($numero) || !is_numeric($contador))
       $erro = ERRO_CARACTER_INVALIDO;
    elseif($numero == 0)
    {
       $erro = ERRO_NUMERO_ZERO; 
    }  
    else
    {
       $resultado = calculaTabuada($numero, $contador);
    }
        
       
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Tabuada | PHP
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
        <!-- CONTEÚDO  -->
        <section id="main">
            <div class="conteudo center">
                <div id="titulos"> 
                    <h1> Tabuada </h1>
                    <?php echo("<p>".MENSAGEM_INICIAL."</p>")?>
                </div>
                <!-- formulário  -->
               <form method="get" action="tabuada.php" name="frmtabuada">
                   <!-- caixas de texto  -->
                   <div class="tabuada_txt" class="tab_txt"> 
                    Tabuada: <input type="text" name="txttabuada" size="40" maxlength="5" value="<?php echo(@$numero)?>">
                   </div>
                   <div class="tabuada_txt" class="tab_txt"> 
                    Contador: <input type="text" name="txtcontador" size="40" maxlength="40" value="<?php echo(@$contador)?>">
                   </div>
                   <!-- botões -->
                   <input class="botao" id="muda_tab" type="submit" name="btncalc" value="calcular">
                   <div id="botao"><a href="tabuada.php" > Novo </a></div>
                   <div id="teste">
                       <div id="tab_resul">
                            <?=$resultado?>
                       </div> 
                   </div>
               </form>
                <!-- mensagem de erro -->
                <div id="erro">
                    <?php echo($erro) ?>
                </div>
            </div>
        </section>
    </body>
</html>