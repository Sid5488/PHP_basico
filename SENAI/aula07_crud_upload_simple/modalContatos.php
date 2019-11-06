<?php 
    //  Verifica se existe a variavel modo
    if(isset($_POST['modo']))
    {
        //Verifica se a variavel modo tem a ação de vizualizar
        if(strtoupper($_POST['modo'])  == 'VISUALIZAR')
        {
            //Recebe o id do registro enviado pelo Ajax
            $codigo = $_POST['codigo'];
            
            //importe do arquivo de conexão
            require_once("bd/conexao.php");
            
            //chamada p/ a função que conecta com o banco
            $conexao = conexaoMysql();
            
            //script p/ buscar no bd
            $sql = "select * from tblcontatos where codigo =".$codigo;
            
            //executa o script no bd
            $select = mysqli_query($conexao, $sql);
            
            //verifica se existem dados e converte em array
            if($rsVisualizar = mysqli_fetch_array($select)){
                $nome = $rsVisualizar['nome'];
                $telefone = $rsVisualizar['telefone'];
                $celular = $rsVisualizar['celular'];
                $email = $rsVisualizar['email'];
                $dt_nasc = $rsVisualizar['dt_nasc'];
                $sexo = $rsVisualizar['sexo'];
                $obs = $rsVisualizar['obs'];
                
            }
            
        }
    }

?>

<html>
    <head>
    
    </head>
    <body>
        <table border="1">
            <tr>
                <td>
                    Nome:
                </td>
                <td>
                    <?=$nome?>
                </td>
            </tr>
            <tr>
                <td>
                    Telefone:
                </td>
                <td>
                    <?=$telefone?>
                </td>
            </tr>
            <tr>
                <td>
                    Celular
                </td>
                <td>
                    <?=$celular?>
                </td>
            </tr>
            <tr>
                <td>
                    Email:
                </td>
                <td>
                    <?=$email?>
                </td>
            </tr>
            <tr>
                <td>
                    Sexo:
                </td>
                <td>
                    <?=$sexo?>
                </td>
            </tr>
            <tr>
                <td>
                    Data de Nascimento:
                </td>
                <td>
                    <?=$dt_nasc?>
                </td>
            </tr>
            <tr>
                <td>
                    Obs:
                </td>
                <td>
                    <?=$obs?>
                </td>
            </tr>
        </table>
    </body>
</html>