<?php
// declaração de variáveis
$media = 0; 
$erro= "";

   //PEGA A FUNÇÃO QUE REALIZA OS CÁLCULOS
   if(!file_exists(require_once("../modulos/funcoes.php"))){
    require_once("../modulos/funcoes.php");
   }

//Verifica se o botão existe/foi clicado
if(isset($_GET['btncalc'])){
    $nota1 = $_GET['txtnota1'];
    $nota2 = $_GET['txtnota2'];
    $nota3 = $_GET['txtnota3'];
    $nota4 = $_GET['txtnota4']; 
    
   
    //tratamento de caixas vazias
    if($nota1=="" || $nota2=="" || $nota3=="" || $nota4==""){
        $erro= ERRO_CAIXA_VAZIA;
    }
    else{
        //tratamento para entrada de números
        if(is_numeric($nota1) && is_numeric($nota2) && is_numeric($nota3) && is_numeric($nota4)){
            // Calcula a média 
            $media = calculaMedia($nota1, $nota2, $nota3, $nota4);  
        }
        else{
             $erro = ERRO_CARACTER_INVALIDO; 
        }
    }   
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Média | PHP
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
                    <h1> Calcular média</h1>
                    <?php echo("<p>".MENSAGEM_INICIAL."</p>")?>
                </div>
                <!-- formulário  -->
                <div id="media_form">
                    <form method="get" action="media2.php" name="frmnotas">
                        <div id="media">
                            <!-- caixa de textos -->
                            <div class="media_notas">
                                Nota 1: <input type="text" name="txtnota1" value="<?php echo(@$nota1) ?>" size="40" maxlength="40">
                            </div>
                            <div class="media_notas">
                                Nota 2: <input type="text" name="txtnota2" value="<?php echo(@$nota2) ?>" size="40" maxlength="40">
                            </div>
                            <div class="media_notas">
                                Nota 3: <input type="text" name="txtnota3" value="<?=@$nota3?>" size="40" maxlength="40">
                            </div>
                            <div class="media_notas">
                                Nota 4: <input type="text" name="txtnota4" value="<?=@$nota4?>" size="40" maxlength="40">
                            </div>
                            <!-- botões  -->
                            <input class="botao" id="muda_media" type="submit" name="btncalc" value="calcular">
                            <div id="botao"><a href="media2.php" > Novo </a></div>
                        </div>
                        <!-- resultado -->
                        <h2>A média é: </h2>
                        <div id="resultado">
                            <?php print_r($media); ?>
                        </div>
                    </form> 
                </div>
                <!-- Mensagem de erro  -->
                <div id="erro">
                    <?php echo($erro) ?>
                </div>
            </div>
        </section>
    </body>
</html>