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
        // explode - percorre uma string, localiza um caracter coringa e quebra em um array com indices cada parte da string separada pelo caracter coringa (ke).
        $data_nascimento = explode("/", $_POST['txtdata']);
        $data_nascimento = $data_nascimento[2]."-".$data_nascimento[1]."-".$data_nascimento[0];
        $sexo = $_POST['rdosexo'];
        $obs = $_POST['txtobs'];
        $estado = $_POST['sltestados'];
        
        //Verifica se o modo é editar e se o arquivo foto n foi atualizado
//        if(strtoupper($_POST['btnsalvar']) == "EDITAR" && $_FILES['flefoto']['name'] == "")
//        {
//            $sql = "update tblcontatos set nome='".$nome."', telefone='".$telefone."', celular='".$celular."', email='".$email."', dt_nasc='".$data_nascimento."', sexo='".$sexo."', obs='".$obs."', codestado=".$estado." where codigo =".$_SESSION['codigo'];
//            
//            if(mysqli_query($conexao, $sql)){   
//                header('location:../exemplo.php');
//            }   
//            else{
//                echo($sql);
//                echo("Erro ao executar o script");
//            }
//        }
//        else
//        {
//               
//        }   
        // 02/10 Verifica se o valor do btnsalvar é inserir
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
                               if(isset($_SESSION['nomeFoto'])){
                                   unlink('arquivos/'.$_SESSION['nomeFoto']);
                                   unset($_SESSION['nomeFoto']);
                               }
                               header('location:../exemplo.php');
                           }   
                           else{
                               echo($sql);
                               echo("Erro ao executar o script");
                           } 
    }

?>