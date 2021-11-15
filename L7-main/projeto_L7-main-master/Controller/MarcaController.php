<?php
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/dao/DaoMarca.php';
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/model/Marca.php';
class  MarcaController{

    public function inserirMarca($nomeMarca, $representante, 
    $emailRepresentante){
 $marca = new Marca();
 $marca->setNomeMarca($nomeMarca);
 $marca->setRepresentante($representante);
 $marca->setEmailRepresentante($emailRepresentante);

 $daoMarca = new DaoMarca();
 return $daoMarca->inserir($marca);
}

public function atualizarMarca($idMarca,$nomeMarca, $representante, 
$emailRepresentante){
$marca = new Marca();
$marca->setIdMarca($idMarca);
$marca->setNomeMarca($nomeMarca);
$marca->setRepresentante($representante);
$marca->setEmailRepresentante($emailRepresentante);
        
$daoMarca = new DaoMarca();
        return $daoMarca->atualizarMarcaDAO($marca);
    }

    public function listarMarcas(){
        $daoMarca = new DaoMarca();
        return $daoMarca->listarMarcasDAO();
    }
    
    //método para excluir produto
    public function excluirMarca($id){
        $daoMarca = new DaoMarca();
        return $daoMarca->excluirMarcaDAO($id);
    }
    
    //método para retornar objeto produto com os dados do BD
    public function pesquisarMarcaId($id){
        $daoMarca = new DaoMarca();
        return $daoMarca->pesquisarMarcaIdDAO($id);
    }
    
    //método para limpar formulário
    public function limpar(){
        return $fr = new Marca();
    }
}