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

    public function opcoesCafe()
    {
        $_statement = $this->_pdo->query("SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco;");
        $_produtos_cafe = $_statement->fetchAll(PDO::FETCH_ASSOC);

        $_dados_cafe = array_map(function ($_cafe){
            return new Produto($_cafe['id'],
                $_cafe['tipo'],
                $_cafe['nome'],
                $_cafe['imagem'],
                $_cafe['descricao'],
                $_cafe['preco']
            );
        }, $_produtos_cafe);

        return $_dados_cafe;
    }

    public function opcoesAlmoco(){
        $_statement = $this->_pdo->query("SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco;");
        $_produtos_almoco = $_statement->fetchAll(PDO::FETCH_ASSOC);

        $_dados_almoco = array_map(function ($_almoco){
            return new Produto($_almoco['id'],
                $_almoco['tipo'],
                $_almoco['nome'],
                $_almoco['imagem'],
                $_almoco['descricao'],
                $_almoco['preco']
            );
        }, $_produtos_almoco);

        return $_dados_almoco;
    }

}