<?php

//variavel continua ativa no navegador enquanto a aba estiver aberta 
    if(!isset($_SESSION))
    {
        session_start();    
    }
    
    
    $sql = "";

    // VERIFICA SE HOUVE A AÇÃO POST PELO FORMULÁRIO
    if(isset($_POST['btnsalvar']))
    {
        //IMPORTA O ARQUIVO DE CONEXÃO
        require_once('conexao.php');
        
        //CHAMA A FUNÇÃO QUE FAZ A CONEXÃO;
        $conexao = conexaoMysql();
            
        //RESGATA DADOS ENVIADOS PELO FORMULÁRIO
        $nome = $_POST['txtnome'];
        $telefone = $_POST['txttelefone'];
        $celular = $_POST['txtcelular'];
        $email = $_POST['txtemail'];
        $data_nascimento = explode("/", $_POST['txtdata']);
        $data_nascimento = $data_nascimento[2]."-".$data_nascimento[1]."-".$data_nascimento[0];
        $sexo = $_POST['rdosexo'];
        $obs = $_POST['txtobs'];
        $estado = $_POST['sltestados'];
        
        //Tratamento p/ verifcar se o usuario fez o upload do arquivo
        if(isset($_SESSION['previewFoto']))
        {
            $foto = $_SESSION['previewFoto']; 
        }
        else{
            $foto = null;
        }
        
        //VERIFICA SE O VALOR DO BOTÃ0
        if(strtoupper($_POST['btnsalvar']) == "INSERIR" )
        {
            //mesmo nome dos bang do banco 
            $sql = "insert into tblcontatos (nome, telefone, celular, email, dt_nasc, sexo, obs, codestado, foto)
            values('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$data_nascimento."', '".$sexo."', '".$obs."',".$estado.", '".$foto."')";     
        } // Verifica se o valor do btnsalvar é editar
        elseif(strtoupper($_POST['btnsalvar']) == "EDITAR")
        {
            $sql = "update tblcontatos set
                    nome='".$nome."', telefone='".$telefone."', celular='".$celular."', email='".$email."', dt_nasc='".$data_nascimento."', sexo='".$sexo."', obs='".$obs."', codestado=".$estado.", foto='".$foto."'
                    where codigo =".$_SESSION['codigo'];        
        }

       //EXECUTA UM SCRIPT NO BANCO DE DADOS (SE O SCRIPT DER CERTO IREMOS REDIRECIONAR PARA A PÁGINA DE CADASTRO)
       if(mysqli_query($conexao, $sql)){  
           //Tratamento p/ apagar a foto antiga do servidor caso usuário edite ela
           if(isset($_SESSION['nomeFoto']))
           {
               unlink('arquivos/'.$_SESSION['nomeFoto']);
               unset($_SESSION['nomeFoto']); //mata a variavel de sessão
           }
           //Apaga a variavel de sessão que foi criada no upload p/ o preview da imagem
           if(isset($_SESSION['previewFoto'])){
               unset($_SESSION['previewFoto']);
           }
           header('location:../exemplo.php');
       }   
       else{
           echo($sql);
           echo("Erro ao executar o script");
       } 
    }

?>