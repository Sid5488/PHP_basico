<?php
    if($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] <> "")
    {

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
                    session_start();
                    $_SESSION['previewFoto'] = $foto;
                    
                    echo('<img src="bd/arquivos/'.$foto.'">');
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
                 alert('Arquivo não selecionado conforme o tamanho ou o tipo');
             </script>"); 
    }
?>