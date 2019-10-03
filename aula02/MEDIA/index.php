<?php
//Criamos essa variavel para existir na abertura da tela e n dar erro no html
// Poderiamos testar dando o isset ou colocar o @ na frente da variavel (ocultando a msg de erro mas nao corrige o problema)
$media = 0; 

   #comentário
   //comentário
   /* comentários em blocos */
    /* $_GET[''] // $_POST[''] - Resgata os dados enviado pelo formulário via get/post 
       isset() - verifica se existe o elemento, variavel...      
    */

//Verifca a existencia do botao calcular no get do formulário (URL)
if(isset($_GET['btncalc'])){
   // Resgatando os dados digitados pelo usuário
    $nota1 = $_GET['txtnota1'];
    $nota2 = $_GET['txtnota2'];
    $nota3 = $_GET['txtnota3'];
    $nota4 = $_GET['txtnota4']; 
   
    //tratamento de caixas vazias
    if($nota1=="" || $nota2=="" || $nota3=="" || $nota4==""){
        echo("Erro: digite todos os valores");
    }
    else{
        //tratamento para entrada de números
        if(is_numeric($nota1) && is_numeric($nota2) && is_numeric($nota3) && is_numeric($nota4)){
            // Calcula a média 
            $media = ($nota1 + $nota2 + $nota3 + $nota4)/4;  
            // = Atribuição ; == Comparação ; === Compara o conteudo e o tipo de dado; != diferente
            /* Operadores lógicos:
                E - &&            
                OU - ||
                NÃO - !
            */

           /* Comandos para exibir na tela 
             echo() 
             print_r()
             var_dump() - mostra as informações técnicas da variável
           */
            // para pular linha print_r("<br>" . $media);
        }
        else{
            //colocando um comando html no php
              /* echo("
                     <font color='red'>
                         Erro: Digite apenas números
                      </font>
                "); 
               */
            //colocando um comando HTML e CSS no php
              echo("
                      <span style='color:red;'> 
                           Erro: Digite apenas números
                      </span>
                 ");
           
            //JavaScript
            /*echo(
                " <script>
                    alert('Erro: Digite apenas números');
                  </script>
                "
            ); */
        }
    }   
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Aula de Formulários
        </title>
        <style>
            *{
                padding: 0px;
                margin: 0px;
            }
            #caixa{
              height: 305px;
              width: 500px;
              margin-left: auto;
              margin-right: auto;
              border: solid 1px black;
            }
            h1{
                margin-bottom: 30px;
            }
            h1, h2{
                height: 50px;
                width: inherit;
                background-color: black;
                color: white;
                text-align: center;
                box-sizing: border-box;
                padding-top: 5px;
            }
            h2{ 
              background-color: grey;
              padding-top: 10px;
              margin-top: 0px;
            }
            #botao{
                height: 30px;
                width: 100px;
                background-color: black;
                color: white;
                font-size: 18px;
/*                margin-left: 70px;*/
            }
            #notas{
               height: 150px;
               width: 235px;
               margin-left: auto;
               margin-right: auto; 
               margin-bottom: 5px;
            }
            input{
                margin-bottom: 10px;
            }
            span{
                background-color: black;
                width: 100px;
                height: 80px;
            }
            span a{
               color: white;  
            }
        </style>
    </head>
    <body>
        <div id="caixa">
        <h1> Calculo de Médias </h1>
            <div id="notas">
                <form method="get" action="index.php" name="frmnotas">
                    Nota 1: <input type="text" name="txtnota1" value="<?php echo(@$nota1) ?>" size="20" maxlength="40"><br>
                    Nota 2: <input type="text" name="txtnota2" value="<?php echo(@$nota2) ?>" size="20" maxlength="40"><br>
                    Nota 3: <input type="text" name="txtnota3" value="<?=@$nota3?>" size="20" maxlength="40"><br>
                    Nota 4: <input type="text" name="txtnota4" value="<?=@$nota4?>" size="20" maxlength="40"><br>
                    <input id="botao" type="submit" name="btncalc" value="calcular">
                    <span><a href="index.php"> Novo Cálculo </a></span>
                </form>
            </div>
        <br>
        <h2>A média é: <?php print_r(/*Para ocultar o erro: @*/$media); ?></h2>
        </div>
    </body>
</html>