<?php
    // verifica a existência da variável modo
    if(isset($_GET['modo']))
    {
        //verifica se a variável modo tem a ação de excluir
       if($_GET['modo'] == 'excluir')
       {
           // importa o arquivo de conexao com BD
           require_once('conexao.php');
           // Abre a conexao com o BD Mysql
           $conexao = conexaoMysql();
           
           $nomeFoto = $_GET['nomeFoto'];
           $codigo = $_GET['codigo'];
           
           $sql = "delete from tblcontatos where codigo =".$codigo;
           
           if(mysqli_query($conexao, $sql))
           {
               //apaga um arquivo - vulgo a foto
               unlink('arquivos/'.$nomeFoto);
               header('location:../exemplo.php');
           }
           else
               echo("Erro ao deletar registro!");
           
       } 
    }
        
?>