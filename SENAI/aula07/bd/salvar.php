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
        
        
        
        
        if($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] <> ""){
            
            //Guarda o tamanho do arquivo a ser upado para o servidor
            $arquivo_size = $_FILES['flefoto']['size'];
            //Converte o tamanho do arquivo p/ kbyte e pega somente a parte inteira da conversão (round)
            $tamanho_arquivo = round($arquivo_size/1024);
            //Guarda os tipos de extenções permitidos
            $arquivo_permitidos = array("image/jpeg", "image/jpg", "image/png");
            //Guarda o tipo de extenção do arquivo a ser upado p/ o servidor
            $ext_arquivo = $_FILES['flefoto']['type'];



            //Verifica se a extenção do arquivo enviado é permitida
            if(in_array($ext_arquivo, $arquivo_permitidos))
            {
                //Verifica se o tamanho é menor do que o máximo permitido
                if($tamanho_arquivo < 2000)
                {
                    //PERMITE RETORNAR APENAS O NOME DO ARQUIVO
                    $nome_arquivo = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);
                    
                    //PERMITE RETORNAR APENAS A EXTENÇÃO DO ARQUIVO
                    $ext = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);
                    
                    //NO PHP PODEMOS USAR DOIS ALGORITMOS DE CRIPTOGRAFIA (MD5, SHA1) E
                    // EX: hash("tipo do algoritimo", var); tipo: sha256, md5 ...
                    
                    //Estamos gerando uma chave com o nome do arquivo + uniqid(time()) ~numero aleatório com base em uma hh:mm:ss do upload. 
                    $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);
                    
                    $foto = $nome_arquivo_cripty.".".$ext;
                    
                    $arquivo_temp = $_FILES['flefoto']['tmp_name'];
                    $diretorio = "arquivos/";
                    
                    if(move_uploaded_file($arquivo_temp, $diretorio.$foto))
                    {
                      // 02/10 Verifica se o valor do btnsalvar é inserir
                        if(strtoupper($_POST['btnsalvar']) == "INSERIR" )
                        {
                            //mesmo nome dos bang do banco 
                            $sql = "insert into tblcontatos (nome, telefone, celular, email, dt_nasc, sexo, obs, codestado)
                            values('".$nome."', '".$telefone."', '".$celular."', '".$email."', '".$data_nascimento."', '".$sexo."', '".$obs."',".$estado.")"; 
                        } // Verifica se o valor do btnsalvar é editar
                        elseif(strtoupper($_POST['btnsalvar']) == "EDITAR")
                        {
                            $sql = "update tblcontatos set
                                    nome='".$nome."', telefone='".$telefone."', celular='".$celular."', email='".$email."', dt_nasc='".$data_nascimento."', sexo='".$sexo."', obs='".$obs."', codestado=".$estado."
                                    where codigo =".$_SESSION['codigo'];        
                        }

                       //EXECUTA UM SCRIPT NO BANCO DE DADOS (SE O SCRIPT DER CERTO IREMOS REDIRECIONAR PARA A PÁGINA DE CADASTRO)
                       if(mysqli_query($conexao, $sql)){   
                           //header('location:../exemplo.php');
                           echo('');
                       }   
                       else{
                           echo($sql);
                           echo("Erro ao executar o script");
                       }  
                    } 
                    else{
                        echo("<script> 
                            alert('Não foi possível enviar o arquivo para o servidor');
                          </script>");
                    }
                }
                else
                {
                    echo("<script> 
                            alert('tamanho de arquivo não pode ser maior do que 2Mb');
                          </script>");
                }
            }
            else
            {
                echo("<script> 
                        alert('tipo de arquivo não pode ser upado p/ o servidor (arquivos permitidos: jpeg, jpg, png)');
                      </script>");
            }
        }
        else
        {
           echo("<script> 
                     alert('Arquivo não seleciopnado conforme o tamanho ou o tipo');
                 </script>"); 
        }
        
            
        
        
    }

?>