<?php   
//constantes 
define("ERRO_CAIXA_VAZIA", "Preencha todos os valores solicitados!");
define("ERRO_CARACTER_INVALIDO", "Digite somente valores numéricos!");
define("ERRO_NUMERO_ZERO", "Não existe tabuada do número zero!");
define("MENSAGEM_INICIAL", "Olá! Por favor informe os valores solicitados.");
define("ERRO_INICIAL_MAIOR", "O número inicial deve ser menor que o final!");
define("ERRO_CARACTER_IGUAL", "Os números devem ser diferentes!");

//FUNÇÃO QUE CALCULA A MÉDIA
function calculaMedia($valor1, $valor2, $valor3, $valor4)
{
   $media = ($valor1 + $valor2 + $valor3 + $valor4)/4; 
   return $media;
}

// CALCULADORA SWITCH
function calculadoraSwitch($numero1, $numero2, $opcao)
{
  $valor1 = $numero1;
  $valor2 = $numero2;
  $operacao = $opcao;
   
  //DECLARAÇÃO DE VARIAVÉIS GLOBAIS PARA RESGATE FORA DA FUNCTION
  global $chksomar;
  global $chksubtrair;
  global $chkmultiplicar;
  global $chkdividir;

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

// CALCULADORA IF
function calculadoraIf($numero1, $numero2, $opcao)
{
  $valor1 = $numero1;
  $valor2 = $numero2;
  $operacao = $opcao;
   
  //DECLARAÇÃO DE VARIAVÉIS GLOBAIS PARA RESGATE FORA DA FUNCTION
  global $chksomar;
  global $chksubtrair;
  global $chkmultiplicar;
  global $chkdividir;

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
    
    return $resultado;
}

function calculaTabuada($n, $c){
     $numero = $n;  
     $contador = $c;
     $resultado = "";
         
     for($i=1; $i <= $c; $i++) {
         $r = $i * $n;
        $resultado .= $i." x ".$n." = ".$r."<br>";
     }
    return $resultado;
}
function par($inicio, $final) {
         global $quantpar; 
         $pares = "";
         while($inicio <= $final){
            
            if($inicio%2 == 0)
            {
               $pares .= $inicio."<br>";
               $quantpar++;
            }
            $inicio++;
            
         }
         return $pares;
      }
function impar($inicio, $final) {
         global $quantimpar; 
         $impar = "";
         while($inicio <= $final){
            
            if(!($inicio%2 == 0))
            {
               $impar .= $inicio."<br>";
               $quantimpar++;
            }
            $inicio++;
            
         }
         return $impar;
      }
?>