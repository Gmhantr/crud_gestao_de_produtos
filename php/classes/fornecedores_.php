<?php

class Fornecedor
{
    private $id;
    private $nome;
    private $cnpj;
    private $telefone;
    private $email;
    private $endereco;

    public function __construct($nome, $cnpj, $telefone, $email, $endereco)
    {
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->endereco = $endereco;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }
}