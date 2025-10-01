<?php

namespace Modelo;

class Produto
{
    private int $id;
    private string $tipo;
    private string $nome;
    private string $descricao;
    private string $imagem;
    private float $preco;

    /**
     * @param int $id
     * @param string $tipo
     * @param string $nome
     * @param string $imagem
     * @param string $descricao
     * @param float $preco
     */
    public function __construct(int $id, string $tipo, string $nome, string $imagem, string $descricao, float $preco)
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->imagem = $imagem;
        $this->descricao = $descricao;
        $this->preco = $preco;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }



}