<?php
    /*
        * CLASSE P/ A INTEGRAÇÃO DE CONTATO COM O BANCO DE DADOS
        * AUTOR: YASMIN PEREIRA DA SILVA
        * DATA DE CRIAÇÃO: 25/11/19
        * MODIFICAÇÕES:
            DATA:
            ALTERAÇÕES REALIZADAS:
            NOME DO DESENVOLVEDOR:
    */
    
    class ContatoDAO
    {
        //ATRIUBUTOS
        private $conexaoMysql;
        private $conexao;
        
        //CONSTRUTOR DA CLASSE
        public function __construct(){
            //Importe do arquivo de conexão
            require_once('conexaoMysql.php');
            
            //instância da classe de conexão 
            $this->conexaoMysql = new ConexaoMysql();
            
            //Guarda o retorno do método conectDatabase no atributo conexao
            $this->conexao = $this->conexaoMysql->conectDatabase();
        }
        
        //INSERE UM CONTATO
        public function insertContato(Contato $contato)
        {
            //Script p/ inserir
            $sql = "insert into tblcontatos (nome, telefone, celular, email) 
                    values(?,?,?,?)";
            
            //Prepara para enviar sql p/ o bd
            $statement = $this->conexao->prepare($sql);
            
            //Array com os dados do objeto  Contato
            $statementDados = array(
                $contato->getNome(),
                $contato->getTelefone(),
                $contato->getCelular(),
                $contato->getEmail()
            );
            
            if($statement->execute($statementDados)){
                echo("Registro inserido com sucesso");
            }
            else{
                echo("Erro ao executar o script no bd");
            }
        }
        //ATUALIZA UM CONTATO
        public function updateContato()
        {
            
        }
        //EXCLUI UM CONTATO
        public function deleteContato()
        {
            
        }
        //SELECIONA TODOS OS CONTATOS
        public function selectAllContato()
        {
            
        }
        //SELECIONA UM CONTATO PELO ID
        public function selectByIdContato()
        {
            
        }
        
    }

?>