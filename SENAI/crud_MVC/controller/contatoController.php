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
        //Atributos da classe
        private $contato;
        private $contatoDAO;
        
        //Construtor da classe
        public function __construct(){
            //Importe como se tivesse no arquivo index
            require_once('model/contatoClass.php');
            require_once('model/DAO/contatoDAO.php');
            
            //Instancia da classe contatoDAO
            $this->contatoDAO = new ContatoDAO();
            
            //Valida se a requisição que está chegando pelo método do form é post
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
               //Instância da classe contato
                $this->contato = new Contato();

                //Guarda nos atributos da classe o Post do FORM
                $this->contato->setNome($_POST['txtnome']);
                $this->contato->setTelefone($_POST['txttelefone']);
                $this->contato->setCelular($_POST['txtcelular']);
                $this->contato->setEmail($_POST['txtemail']); 
            }
            
        } 
        
        //Novo contato
        public function novoContato()
        {
            //Chama o método de inserir e manda o objeto contato
            if($this->contatoDAO->insertContato($this->contato))
                header('location:index.php');
            else
                echo('Erro ao inserir registro no bd');
        }
        
        //Atualiza/edita um contato
        public function atualizaContato($idContato)
        {
            $this->contato->setCodigo($idContato);
            
            //Verifica o retorno do método que atualiza contato
            if($this->contatoDAO->updateContato($this->contato))
                header('location:index.php');
            else
               echo('Erro ao atualizar registro no bd');  
            
        }
        
        //Exclui um contato
        public function deletaContato($idContato)
        {
            //Chama o método para excluir no bd um registro
            if($this->contatoDAO->deleteContato($idContato))
                header('location:index.php');
            else
                echo('Erro ao excluir registro no bd');            
        }
        
        //Lista todos os contatos
        public function listaContato()
        {
            //Chama o método que seleciona todos os registros
            $list = $this->contatoDAO->selectAllContato();
            
            if($list)
                return $list;
            else
                die();
        }
        
        //Busca um contato pelo id
        public function buscarContato($idContato)
        {
            //Método p/ buscar no bd o registro referente ao id/codigo
            $dadosContato = $this->contatoDAO->selectByIdContato($idContato);
            
            require_once('index.php');
        }
        
    }
?>