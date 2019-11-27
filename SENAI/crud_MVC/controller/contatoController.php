<?php
    /*
        * CLASSE DE CONTROLLER DO CONTATO
        * AUTOR: YASMIN PEREIRA DA SILVA
        * DATA DE CRIAÇÃO: 25/11/19
        * MODIFICAÇÕES:
          DATA:
          ALTERAÇÕES REALIZADAS:
          NOME DO DESENVOLVEDOR:
    */
    class ContatoController
    {
        //Construtor da classe
        public function __construct(){
            //Importe como se tivesse no arquivo index
           require_once('model/contatoClass.php');
           require_once('model/DAO/contatoDAO.php');
        } 
        
        //Novo contato
        public function novoContato()
        {
            //Instância da classe contato
            $contato = new Contato();
            
            //Guarda nos atributos da classe o Post do FORM
            $contato->setNome($_POST['txtnome']);
            $contato->setTelefone($_POST['txttelefone']);
            $contato->setCelular($_POST['txtcelular']);
            $contato->setEmail($_POST['txtemail']);
            
            //Instância da classe ContatoDAO
            $contatoDAO = new ContatoDAO();
            
            //Chama o método de inserir e manda o objeto contato
            $contatoDAO->insertContato($contato);
        }
        
        //Atualiza/edita um contato
        public function atualizaContato()
        {
            
        }
        
        //Exclui um contato
        public function deletaContato()
        {
            
        }
        
        //Lista todos os contatos
        public function listaContato()
        {
            //Instancia da classe contatoDAO
            $contatoController = new ContatoDAO();
            
            //Chama o método que seleciona todos os registros
            return $contatoController->selectAllContato();
        }
        
        //Busca um contato pelo id
        public function buscaContato()
        {
            
        }
        
    }
?>