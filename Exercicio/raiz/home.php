<?php
   //PEGA A FUNÇÃO QUE REALIZA OS CÁLCULOS
   if(!file_exists(require_once("../modulos/funcoes.php"))){
    require_once("../modulos/funcoes.php");
   }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            HOME | PHP
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
        <!-- CONTEÚDO   -->
        <section id="main">
            <div class="conteudo center">
               <div id="titulos"> 
                    <h1> Bem Vindo !!</h1>
                  <p> Aproveite os nossos recursos!</p>
                </div>
               <div class="home">
                  <h1> Calcule a sua média!</h1>
                  <div class="home_img" id="media_img"></div>
                  <a href="media2.php" id="botao"> Média</a>
               </div>
               <div class="home">
                  <h1> Faça calculos simples!</h1>
                  <div class="home_img" id="calcif_img"></div>
                  <a href="calculadoraif.php" id="botao"> Calculadora</a>
               </div>
               <div class="home">
                  <h1> Teste outra calculadora!</h1>
                  <div class="home_img" id="calcsw_img"></div>
                  <a href="calculadorasw.php" id="botao"> Calculadora </a>
               </div>
               <div class="home">
                  <h1> Calcule uma tabuada!</h1>
                  <div class="home_img" id="tabuada_img"></div>
                  <a href="tabuada.php" id="botao"> Tabuada </a>
               </div>
               <div class="home">
                  <h1> Par ou Impar?</h1>
                  <div class="home_img" id="par_img"></div>
                  <a href="parimpar.php" id="botao"> Par ou impar</a>
               </div>
            </div>
        </section>
    </body>
</html>>