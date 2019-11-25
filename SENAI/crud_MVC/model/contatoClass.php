<?php
    /*
        * CLASSE REFERENTE AO OBJETO CONTATO
        * AUTOR: YASMIN PEREIRA DA SILVA
        * DATA DE CRIAÇÃO: 25/11/19
        * MODIFICAÇÕES:
            DATA:
            ALTERAÇÕES REALIZADAS:
            NOME DO DESENVOLVEDOR:
    */
    class Contato
    {
        //ATRIBUTOS
        private $codigo;
        private $nome;
        private $telefone;
        private $celular;
        private $email;
        
        //CRONSTRUTOR
        public function __construct()
        {
            
        }
        
        //GETTERS AND SETTERS DO CODIGO
        public function getCodigo()
        {
            return $this->codigo;
        }
        public function setCodigo($codigo)
        {
            $this->codigo = $codigo;
        }
        //GETTERS AND SETTERS DO NOME
        public function getNome()
        {
            return $this->nome;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
        //GETTERS AND SETTERS DO TEL
        public function getTelefone()
        {
            return $this->telefone;
        }
        public function setTelefone($telefone)
        {
            $this->telefone = $telefone;
        }
        //GETTERS AND SETTERS DO CEL
        public function getCelular()
        {
            return $this->celular;
        }
        public function setCelular($celular)
        {
            $this->celular = $celular;
        }
        //GETTERS AND SETTERS DO EMAIL
        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        
    }
?>