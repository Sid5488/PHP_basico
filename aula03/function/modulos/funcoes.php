<?php

setlocale(LC_ALL, 'pt_BR');

//constantes 
define("ERRO_CAIXA_VAZIA", "Preencha todos os valores solicitados!");
define("ERRO_CARACTER_INVALIDO", "Digite somente valores numéricos!");

function calcular ($numero1, $numero2, $opcao)
{
  $valor1 = $numero1;
  $valor2 = $numero2;
  $operacao = $opcao;
   
  //DECLARAÇÃO DE VARIAVÉIS GLOBAIS PARA RESGATE FORA DA FUNCTION
  global $chksomar;
  global $chksubtrair;
  global $chkmultiplicar;
  global $chkdividir;

  //CALCULO DAS OPERAÇÕES
  switch ($operacao)
        {
            case "SOMAR":
                $resultado = $valor1 + $valor2;
                $chksomar = "checked";
                break;
            case "SUBTRAIR":
                $resultado = $valor1 - $valor2;
                $chksubtrair = "checked";
                break;
            case "MULTIPLICAR":
                $resultado = $valor1 * $valor2;
                $chkmultiplicar = "checked";
                break;
            case "DIVIDIR":
               $resultado = $valor1 / $valor2;
               $chkdividir = "checked";
               break;
            default:
               echo("nenhuma operação selecionada ");
               break;
        }   
    
    return $resultado;
}
?>