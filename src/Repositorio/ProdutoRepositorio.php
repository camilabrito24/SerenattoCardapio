<?php

use Modelo\Produto;
class ProdutoRepositorio
{
    private PDO $_pdo;

    /**
     * @param PDO $_pdo
     */
    public function __construct(PDO $_pdo)
    {
        $this->_pdo = $_pdo;
    }

    private function formarObjeto($dados)
    {
        return new Produto($dados['id'],
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['imagem'],
            $dados['preco']);
    }

    public function opcoesCafe()
    {
        $_statement = $this->_pdo->query("SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco;");
        $_produtos_cafe = $_statement->fetchAll(PDO::FETCH_ASSOC);

        $_dados_cafe = array_map(function ($_cafe){
            return $this->formarObjeto($_cafe);
        }, $_produtos_cafe);

        return $_dados_cafe;
    }

    public function opcoesAlmoco(){
        $_statement = $this->_pdo->query("SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco;");
        $_produtos_almoco = $_statement->fetchAll(PDO::FETCH_ASSOC);

        $_dados_almoco = array_map(function ($_almoco){
            return $this->formarObjeto($_almoco);
        }, $_produtos_almoco);

        return $_dados_almoco;
    }

    public function buscarTodasOpcoes(){
        $_statement = $this->_pdo->query("SELECT * FROM produtos ORDER BY preco;");
        $_produtos = $_statement->fetchAll(PDO::FETCH_ASSOC);


        $_dados = array_map(function ($_produto){
            return $this->formarObjeto($_produto);
        }, $_produtos);

        return $_dados;
    }

}