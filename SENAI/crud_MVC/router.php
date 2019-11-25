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
                    
                case 'ATUALIZAR':
                    
                    break;
                
                case 'EXCLUIR':
                    
                    break;
            }
            break;
            
        case 'USUARIOS':
            
            break;
            
        case 'NIVEIS':
            
            break;
    }
?>