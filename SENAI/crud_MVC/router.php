<?php
    //VARIAVEIS
    $controller = (string) null;
    $modo = (string) null;

    $controller = $_GET['controller'];
    $modo = $_GET['modo'];

    //Valida qual controller será instânciada
    switch (strtoupper($controller))
    {
        case 'CONTATOS':
            require_once('controller/contatoController.php');
            
            //Valida qual ação será executada
            switch(strtoupper($modo))
            {
                case 'NOVO':
                    //Instância da classe
                    $contatoController = new ContatoController();
                    
                    //Método para inserir um novo contato
                    $contatoController->novoContato();
                    
                    break;
                    
                case 'BUSCAR':
                    //Resgata o id enviado pela view no click do excluir
                    $id = $_GET['id'];
                    
                    //instancia da classe controller
                    $contatoController = new ContatoController();
                    
                    //Método p/ buscar um registro pelo id
                    $contatoController->buscarContato($id);
                    
                    break;
                    
                case 'ATUALIZAR':
                    //Resgata o id enviado pela view 
                    $id = $_GET['id'];
                    
                    //instancia da classe controller
                    $contatoController = new ContatoController();
                    
                    //Método p/ atualizar um registro pelo id
                    $contatoController->atualizaContato($id);
                    
                    break;
                
                case 'EXCLUIR':
                    //Resgata o id enviado pela view no click do excluir
                    $id = $_GET['id'];
                    
                    //instancia da classe controller
                    $contatoController = new ContatoController();
                    
                    //método para excluir o registro
                    $contatoController->deletaContato($id);
                    
                    break;
            }
            break;
            
        case 'USUARIOS':
            
            break;
            
        case 'NIVEIS':
            
            break;
    }
?>