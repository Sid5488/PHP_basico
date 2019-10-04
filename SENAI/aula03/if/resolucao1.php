<?php
//DECLARANDO AS VARIAVEIS/CONSTANTES
$resultado = (float) 0;
$valor1 = (float) 0;
$valor2 = (float) 0;
$operacao = (string) "";
$chksomar = (string) "";
$chksubtrair = (string) "";
$chkmultiplicar = (string) "";
$chkdividir = (string) "";

define("ERRO_CAIXA_VAZIA", "Preencha todos os valores solicitados!");
define("ERRO_CARACTER_INVALIDO", "Digite somente valores numéricos!");

setlocale(LC_ALL, 'pt_BR');
//TESTE SE O BOTÃO FOI ACIONADO
if(isset($_POST['btncalc']))
{
    
    //RESGATE DOS VALORES DIGITADOS/SELECIONADOS
    $valor1 = str_replace(",",".",$_POST['txtv1']);
    $valor2 = str_replace(",",".",$_POST['txtv2']);
    
    /*
        setlocale(LC_ALL, 'pt_BR'); - padroniza a saída de dados para o idioma
        str_replace() - localiza e substitui um ou mais caracteres de uma string
        strstr($variavel, "caracter") - localiza um caracater
        strtoupper() - converte o conteúdo para MAIUSCULO
        strtolower() - converte o conteúdo para minusculo
        
        estruturas de decisões com apenas uma linha de processamento não necessitam de chaves {}
        
        isset($_POST['rdocalc'])==false É A MESMA COISA DE ESCRVER: !isset($_POST['rdocalc'])
    */
    
    //TESTE SE OS VALORES FORAM DIGITADOS //SE OPÇÃO FOI SELECIONADA
    if($valor1 == "" || $valor2 == "" || isset($_POST['rdocalc'])==false)
        echo(ERRO_CAIXA_VAZIA);
    
    //TESTE SE OS VALORES DIGITADOS SÃO NUMÉRICOS
    elseif(!is_numeric($valor1) || !is_numeric($valor2))
        echo(ERRO_CARACTER_INVALIDO);
    else
    {
        $operacao = strtoupper($_POST['rdocalc']);
        //REALIZANDO OPERAÇÕES 
        if(($operacao == "SOMAR")) 
        {
            $resultado = $valor1 + $valor2;
            $chksomar = "checked";
        }        
        elseif($operacao == "SUBTRAIR")
        {
            $resultado = $valor1 - $valor2;
            $chksubtrair = "checked";
        }        
        elseif($operacao == "MULTIPLICAR")
        {
            $resultado = $valor1 * $valor2;
            $chkmultiplicar = "checked";
        }          
        elseif($operacao == "DIVIDIR")
        {
            $resultado = $valor1 / $valor2;
            $chkdividir = "checked";
        }
                 
    }           
}
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>
            Calculadora Simples 2
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
                background-color: #690700;
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
                color: white;
            }
        </style>
    </head>
    <body>
        <div id="caixa">
            <div id="titulo">
                <h1> Calculadora Simples</h1>
            </div>
            <div id="conteudo">
                <form method="post" action="" name="frmcalc">
                    <div id="valores">
                        <h2> Valor 1: <input type="text" name="txtv1" maxlength="20" size="20" value="<?php echo($valor1)?>"></h2>
                        <h2> Valor 2: <input type="text" name="txtv2" maxlength="20" size="20" value="<?php echo($valor2)?>"> </h2>
                    </div>
                    <div id="tipo">
                        <input class="input" type="radio" name="rdocalc" value="somar" <?php echo($chksomar); ?> ><span> Somar</span>
                        <br>
                        <input class="input" type="radio" name="rdocalc" value="subtrair" <?php echo($chksubtrair); ?> ><span> Subtrair</span>
                        <br>
                        <input  class="input"type="radio" name="rdocalc" value="multiplicar" <?php echo($chkmultiplicar); ?> ><span> Multiplicar </span>
                        <br>
                        <input class="input" type="radio" name="rdocalc" value="dividir" <?php echo($chkdividir); ?> ><span> Dividir </span>
                        <br>
                        <input id="botao" type="submit" name="btncalc" value="Calcular">
                    </div>
                    <div id="resul">
                        <div id='resul2'>
                            <?php echo(round($resultado, '2'));?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>