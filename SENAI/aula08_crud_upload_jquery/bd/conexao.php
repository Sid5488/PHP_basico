<?php
    
    function conexaoMysql(){
        /* TIPOS DE CONEXÕES COM BD MYSQL :
        
        Primeiro - mysql_connect() - biblioteca mais antiga para criar a conexão com o BD
            Exemplo: mysql_connect(host, user, password)
                    mysql_select_db(databasename) - estabelece qual database que será utilizado
                    
        Segundo (Usar essa )- mysqli_connect() - biblioteca atual que substitui a anterior
            Exemplo: mysqli_connect(host, user, password, databasename)
            
        Terceiro - PDO() - Classe para a conexão com o BD, utilizando o conceito de orientação a objetos
            Obejeto = new PDO('mysql:host=localhost;dbname=nome', user, password)

        */
        $server = (string) "localhost";
        $user = (string) "root";
        $password = (string) "bcd127";
        $database = (string) "dbcontatos20192ta";
        $conexao = mysqli_connect($server, $user, $password, $database);
        return $conexao;
    }

?>