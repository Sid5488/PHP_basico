<?php
    // 02/10 valida se a variavel de sessao ja foi iniciada
    //variaavel sessao 
//variavel continua ativa no navegador enquanto a aba estiver aberta 
    if(!isset($_SESSION))
    {
        session_start();    
    }
    /* 02/10
        criar uma variavel de sessão
        $_SESSION['nome']
        
        apagar uma variavel de sessão do servidor
        unset($_SESSION['nome'])
        
        eliminar todas as variaveis de sessão do sistema automaticamente
        session_destroy()
    
    */
    
     $sql = "";
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
        
        // 02/10 Verifica se o valor do btnsalvar é inserir
        if(strtoupper($_GET['btnsalvar']) == "INSERIR" )
        {
            //mesmo nome dos bang do banco 
        $sql = "insert into tblcontatos (nome, telefone, celular, email, dt_nasc, sexo, obs)
                values('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$data_nascimento."', '".$sexo."', '".$obs."')"; 
        } // Verifica se o valor do btnsalvar é editar
        elseif(strtoupper($_GET['btnsalvar']) == "EDITAR")
        {
            $sql = "update tblcontatos set
                    nome='".$nome."', telefone='".$telefone."', celular='".$celular."', email='".$email."', dt_nasc='".$data_nascimento."', sexo='".$sexo."', obs='".$obs."'
                    where codigo =".$_SESSION['codigo'];        
        }
       //EXECUTA UM SCRIPT NO BANCO DE DADOS (SE O SCRIPT DER CERTO IREMOS REDIRECIONAR PARA A PÁGINA DE CADASTRO)
        
       if(mysqli_query($conexao, $sql)){   
           header('location:../exemplo.php');
       }   
       else{
           echo("Erro ao executar o script");
       } 
    }

?>