<?php
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/dao/DaoProduto.php';
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/model/Produto.php';

class ProdutoController {
    
    public function inserirProduto($categoria, $nomeProduto, 
            $cor, $tamanho, $vlrCompra, $vlrVenda, $qtdEstoque, $lote, $dtCompra, $FkFornecedor, $FkMarca){
        $produto = new Produto();
        $produto->setCategoria($categoria);
        $produto->setnomeProduto($nomeProduto);
        $produto->setcor($cor);
        $produto->settamanho($tamanho);
        $produto->setvlrCompra($vlrCompra);
        $produto->setvlrVenda($vlrVenda);
        $produto->setqtdEstoque($qtdEstoque);
        $produto->setlote($lote);
        $produto->setDtCompra($dtCompra);
        $produto->setFkFornecedor($FkFornecedor);
        $produto->setFkMarca($FkMarca);

        
        
        $daoProduto = new DaoProduto();
        return $daoProduto->inserir($produto);
    }
    
    //método para atualizar dados de produto no BD
    public function atualizarProduto($idProduto, $categoria, $nomeProduto, 
    $cor, $tamanho, $vlrCompra, $vlrVenda, $qtdEstoque, $lote, $dtCompra, $FkFornecedor, $FkMarca){
        $produto = new Produto();
        $produto->setIdProduto($idProduto);
        $produto->setCategoria($categoria);
        $produto->setnomeProduto($nomeProduto);
        $produto->setcor($cor);
        $produto->settamanho($tamanho);
        $produto->setvlrCompra($vlrCompra);
        $produto->setvlrVenda($vlrVenda);
        $produto->setqtdEstoque($qtdEstoque);
        $produto->setlote($lote);
        $produto->setDtCompra($dtCompra);
        $produto->setFkFornecedor($FkFornecedor);
        $produto->setFkMarca($FkMarca);
        
        $daoProduto = new DaoProduto();
        return $daoProduto->atualizarProdutoDAO($produto);
    }
    
    //método para carregar a lista de produtos que vem da DAO
    public function listarProdutos(){
        $daoProduto = new DaoProduto();
        return $daoProduto->listarProdutosDAO();
    }
    
    //método para excluir produto
    public function excluirProduto($id){
        $daoProduto = new DaoProduto();
        return $daoProduto->excluirProdutoDAO($id);
    }
    
    //método para retornar objeto produto com os dados do BD
    public function pesquisarProdutoId($id){
        $daoProduto = new DaoProduto();
        return $daoProduto->pesquisarProdutoIdDAO($id);
    }
    
    //método para limpar formulário
    public function limpar(){
        return $pr = new Produto();
    }
}
