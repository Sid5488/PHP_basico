<?php
    //todo tipo de dado exceto int precisa de aspas simples
    // data em formato americano: ano-mes-dia
    //values('".$variavel."') - Sendo " ~php; ' ~script

    // VERIFICA SE HOUVE A AÇÃO POST PELO FORMULÁRIO
    if(isset($_GET['btnsalvar']))
    {
        //IMPORTA O ARQUIVO DE CONEXÃO
        require_once('conexao.php');
        
        //CHAMA A FUNÇÃO QUE FAZ A CONEXÃO;
        $conexao = conexaoMysql();
            
        //RESGATA DADOS ENVIADOS PELO FORMULÁRIO
        $nome = $_GET['txtnome'];
        $telefone = $_GET['txttelefone'];
        $celular = $_GET['txtcelular'];
        $email = $_GET['txtemail'];
        // explode - percorre uma string, localiza um caracter coringa e quebra em um array com indices cada parte da string separada pelo caracter coringa (ke).
        $data_nascimento = explode("/", $_GET['txtdata']);
        $data_nascimento = $data_nascimento[2]."-".$data_nascimento[1]."-".$data_nascimento[0];
        $sexo = $_GET['rdosexo'];
        $obs = $_GET['txtobs'];
        
        $sql = "insert into tblcontatos (nome, telefone, celular, email, dt_nasc, sexo, obs)
                values('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$data_nascimento."', '".$sexo."', '".$obs."')";
        
       //EXECUTA UM SCRIPT NO BANCO DE DADOS (SE O SCRIPT DER CERTO IREMOS REDIRECIONAR PARA A PÁGINA DE CADASTRO)
        
       if(mysqli_query($conexao, $sql)){   
           header('location:../exemplo.php');
       }   
       else{
           echo("Erro ao executar o script");
       } 
    }

?>