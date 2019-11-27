<?php
    /*
        * CLASSE P/ A CONEXÃO COM O BANCO DE DADOS
        * AUTOR: YASMIN PEREIRA DA SILVA
        * DATA DE CRIAÇÃO: 25/11/19
        * MODIFICAÇÕES:
            DATA:
            ALTERAÇÕES REALIZADAS:
            NOME DO DESENVOLVEDOR:
    */
    class ConexaoMysql
    {
        // VARIAVEIS
        private $server; 
        private $user; 
        private $password; 
        private $database; 
        
        //CONSTRUTOR
        public function __construct ()
        {
          $this->server="localhost";
          $this->user="root";
          $this->password="bcd127";
          $this->database="dbcontatos20192tb";
        }
        
        //MÉTODO P/ CONEXÃO
        public function conectDatabase()
        {
            try{
              $conexao = new PDO
                ('mysql:host='.$this->server.';dbname='.$this->database, $this->user, $this->password);
            
                return $conexao;  
            }
            catch(PDOException $erro){
                echo("Erro ao realizar conexão com o BD <br> 
                      Linha: ".$erro->getLine()." <br> 
                      Mensagem: ".$erro->getMessage());
            }
            
        }
        
    }

?>