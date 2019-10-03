<?php
$resul = 0;
// Como declarar uma variavel
/* 
    $v1 = (int) 0;
    
    Tipos: 
    int / integer - inteiro
    float - real
    double - (inteiro e real) e possui maior capacidade do que os anteriores 
    string - caracter
    bool / boolean - True ou False
    array - matriz de dados
    object - variavel do tipo objeto
    
    Existem dois comandos para:
    gettype() - Retorna o tipo de dado de uma variavel
    settype() - Converte o tipo de dado de uma variavel
    
    Ex: gettype($variavel);
        settype($variavel, "tipo de dado");
*/
if(isset($_GET['btncalc'])){
    $v1 = $_GET['txtv1'];
    $v2 = $_GET['txtv2'];
    @$op = $_GET['rdocalc'];
    
    //Teste se os valores foram digitados
    if($v1 == "" || $v2 == ""){
        echo("Erro: digite os valores numéricos");
    }
    //Teste se os valores são números
    else{
       if(is_numeric($v1) && is_numeric($v2)){
           //Teste se o usuário escolheu uma opção
           if($op == ""){
                echo("Erro: Selecione uma operação");
            }
            else{
               if($op == "SO"){
                $resul = $v1 + $v2;
                }
                else{
                    if($op == "SU"){
                    $resul = $v1 - $v2;
                    }
                    else{
                        if($op == "MU"){
                          $resul = $v1 * $v2;  
                        }
                        else{
                            if($op == "DI"){
                               $resul = $v1 / $v2; 
                            }
                        }
                    }
                } 
            } 
        }
        else{
            echo("Erro: digite somente valores numéricos");
        } 
    }         
}
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>
            Calculadora Simples
        </title>
        <style>
            *{
                padding: 0px;
                margin: 0px;
            }
            #caixa{
                width: 500px;
                height: 420px;
                border: solid 1px;
                margin-left: auto;
                margin-right: auto;
            }
            #titulo{
                width: inherit;
                height: 70px;
                background-color: black;
                text-align: center;
                box-sizing: border-box;
                padding-top: 12px;
            }
            h1{
                color: white;
                font-size: 35px;
            }
            #conteudo{
                width: inherit;
                height: 350px;
            }
            #valores{
                margin-left: auto;
                margin-right: auto;
                height: 70px;
                width: 270px;
                margin-top: 50px;
                margin-bottom: 20px;
            }
            h2{
                margin-bottom: 7px;
                font-family: verdana;
                font-size: 20px;
            }
            #tipo{
                float: left;
                height: 180px;
                width: 130px;
                margin-left: 50px;
            }
            span{
                font-family: verdana;
                font-size: 20px;
            }
            .input{
                margin-bottom: 15px;
            }
            #resul{
                float: left;
                height: 180px;
                width: 220px;
                background-color: aqua;
                margin-left: 50px;
            }
            #botao{
                background-color: black;
                color: white;
                width: 90px;
                font-size: 18px;
                height: 30px;
            }
            #resul2{
                height: 50px;
                width: 50px;
                margin-top: 65px;
                margin-left: 85px;
                font-size: 40px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="caixa">
            <div id="titulo">
                <h1> Calculadora Simples</h1>
            </div>
            <div id="conteudo">
                <form method="get" action="" name="frmcalc">
                    <div id="valores">
                        <h2> Valor 1: <input type="text" name="txtv1" maxlength="20" size="20" value="<?php echo(@$v1)?>"></h2>
                        <h2> Valor 2: <input type="text" name="txtv2" maxlength="20" size="20" value="<?php echo(@$v2)?>"> </h2>
                    </div>
                    <div id="tipo">
                        <input class="input" type="radio" name="rdocalc" value="SO"><span> Somar</span>
                        <br>
                        <input class="input" type="radio" name="rdocalc" value="SU"><span> Subtrair</span>
                        <br>
                        <input  class="input"type="radio" name="rdocalc" value="MU"><span> Multiplicar </span>
                        <br>
                        <input class="input" type="radio" name="rdocalc" value="DI"><span> Dividir </span>
                        <br>
                        <input id="botao" type="submit" name="btncalc" value="Calcular">
                    </div>
                    <div id="resul">
                        <?php echo("<div id='resul2'>$resul</div>");?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>