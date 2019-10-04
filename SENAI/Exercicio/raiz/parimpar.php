<?php
   //Declaração de variáveis
   $pares = 0;
   $impares = 0;
   $quantimpar = 0;
   $quantpar = 0;

   //PEGA A FUNÇÃO QUE REALIZA OS CÁLCULOS
   if(!file_exists(require_once("../modulos/funcoes.php"))){
    require_once("../modulos/funcoes.php");
   }
   //Verifica se o botão foi acionado
   if(isset($_GET['btncalc']))
   {
      // resgata os valores selecionados pelo o usuário
      $inicio = $_GET['sltinicial'];
      $final = $_GET['sltfinal'];
       
      //verifica se as caixas estão vazias
      if($inicio == "" || $final == ""){
         $erro = ERRO_CAIXA_VAZIA ;
      }
      //verifica se o valor inicial é maior do que o final
      elseif($inicio > $final){
         $erro = ERRO_INICIAL_MAIOR;
      }
       //verifica se os valores são iguais
      elseif($inicio == $final){
         $erro = ERRO_CARACTER_IGUAL;
      }
      //chamada das funções de pares e impares
      else{
         $pares = par($inicio, $final);
         $impares = impar($inicio, $final);
      }
   }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Par e Impar | PHP
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
                    <h1> Par e Impar </h1>
                    <?php echo("<p>".MENSAGEM_INICIAL."</p>")?>
                </div>
                <!-- Formulário  -->
               <form method="get" action="" name="frmparimpar">
                  <div id="opcoes">
                      <!-- Número inicial (de 0 a 500) -->
                     <p>Número Inicial:</p>
                     <select name="sltinicial" class="parimpar_txt">
                        <option value="">Por favor selecione um número.</option>
                          <!-- Laço para exibir as opções -->
                        <?php for($i = 0; $i <= 500; $i++){ ?>
                            <option value="<?=$i?>"> <?php echo($i) ?> </option>
                        <?php  }?>
                     </select>
                      <!-- Número final (de 100 a 1000) -->
                     <p>Número Final:</p>
                      <select name="sltfinal" class="parimpar_txt">
                        <option value=""> Por favor selecione um número.</option>
                          <!-- Laço para exibir as opções -->
                        <?php for($i = 100; $i <= 1000; $i++){ ?>
                            <option value="<?=$i?>"> <?php echo($i) ?> </option>
                        <?php  }?>
                      </select>
                  </div>
                   <!-- Botões -->
                  <input class="botao" id="muda_tab" type="submit" name="btncalc" value="calcular">
                  <div id="botao"><a href="parimpar.php" > Novo </a></div>
                   <!-- resultados -->
                  <div id="par_resultados">
                     <div class="par_resultado">
                           Pares:
                           <?php echo("<br>".$pares."<br> Quantidade: ".$quantpar);?>
                       </div> 
                       <div class="par_resultado">
                          Impares:
                           <?php echo("<br>".$impares."<br> Quantidade: ".$quantimpar);?>
                       </div> 
                  </div>         
                </form>
                <!-- Mensagem de erro -->
               <div id="erro">
                    <?php echo(@$erro) ?>
                </div>
            </div>
        </section>
    </body>
</html>