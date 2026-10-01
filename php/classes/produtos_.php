<?php

class Produto
{
    private $id;
    private $nome;
    private $codigo;
    private $preco;
    private $estoque;
    private $descricao;
    private $categoria;
    private $fornecedor_id;

    public function __construct(
        $nome,
        $codigo,
        $preco,
        $estoque,
        $descricao,
        $categoria,
        $fornecedor_id
    ) {
        $this->nome = $nome;
        $this->codigo = $codigo;
        $this->preco = $preco;
        $this->estoque = $estoque;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->fornecedor_id = $fornecedor_id;
    }


    public function getNome()
    {
        return $this->nome;
    }


    public function getCodigo()
    {
        return $this->codigo;
    }


    public function getPreco()
    {
        return $this->preco;
    }


    public function getEstoque()
    {
        return $this->estoque;
    }


    public function getDescricao()
    {
        return $this->descricao;
    }


    public function getCategoria()
    {
        return $this->categoria;
    }


    public function getFornecedorId()
    {
        return $this->fornecedor_id;
    }


    public function buscarPorId($pdo, $id)
    {
        $sql = $pdo->prepare("
            SELECT
                id,
                nome,
                preco
            FROM produtos
            WHERE id = ?
        ");

        $sql->execute([$id]);

        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}