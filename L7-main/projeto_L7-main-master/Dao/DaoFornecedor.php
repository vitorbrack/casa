<?php
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/DataBase/conecta.php';
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/model/Produto.php';
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/model/Mensagem.php';

class DaoFornecedor {

    public function inserir(Fornecedor $fornecedor){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $nomeFornecedor = $fornecedor->getNomeFornecedor();
            $logradouro = $fornecedor->getLogradouro();
            $complemento = $fornecedor->getComplemento();
            $bairro = $fornecedor->getBairro();
            $cidade = $fornecedor->getCidade();
            $uf = $fornecedor->getUF();
            $cep = $fornecedor->getCep();
            $representante = $fornecedor->getRepresentante();
            $email = $fornecedor->getEmail();
            $tellFixo = $fornecedor->getTellfixo();
            $cell = $fornecedor->getCell();
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conecta->prepare("insert into fornecedor values "
                        . "(null,?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bindParam(1, $nomeFornecedor);
                $stmt->bindParam(2, $email);
                $stmt->bindParam(3, $tellFixo);
                $stmt->bindParam(4, $cell);
                $stmt->bindParam(5, $cep);
                $stmt->bindParam(6, $logradouro);
                $stmt->bindParam(7, $uf);
                $stmt->bindParam(8, $bairro);
                $stmt->bindParam(9, $cidade);
                $stmt->bindParam(10, $complemento);
                $stmt->bindParam(11, $representante);
                $stmt->execute();
                $msg->setMsg("<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>");
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }
    
    //método para atualizar dados da tabela produto
    public function atualizarFornecedorDAO(Fornecedor $fornecedor){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            $idFornecedor = $fornecedor->getIdFornecedor();
            $nomeFornecedor = $fornecedor->getNomeFornecedor();
            $logradouro = $fornecedor->getLogradouro();
            $complemento = $fornecedor->getComplemento();
            $bairro = $fornecedor->getBairro();
            $cidade = $fornecedor->getCidade();
            $uf = $fornecedor->getUF();
            $cep = $fornecedor->getCep();
            $representante = $fornecedor->getRepresentante();
            $email = $fornecedor->getEmail();
            $tellFixo = $fornecedor->getTellfixo();
            $cell = $fornecedor->getCell();
            try{
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conecta->prepare("update fornecedor set "
                        . "nomeFornecedor = ?,"
                        . "email = ?,"
                        . "tellFixo = ?, "
                        . "cell = ?, "
                        . "cep = ? ,"
                        . "logradouro = ? ,"
                        . "uf = ? ,"
                        . "bairro = ?, "
                        . "cidade = ? ,"
                        . "complemento = ?, "
                        . "representante = ? "
                        . "where idFornecedor = ?");
                        $stmt->bindParam(1, $nomeFornecedor);
                        $stmt->bindParam(2, $email);
                        $stmt->bindParam(3, $tellFixo);
                        $stmt->bindParam(4, $cell);
                        $stmt->bindParam(5, $cep);
                        $stmt->bindParam(6, $logradouro);
                        $stmt->bindParam(7, $uf);
                        $stmt->bindParam(8, $bairro);
                        $stmt->bindParam(9, $cidade);
                        $stmt->bindParam(10, $complemento);
                        $stmt->bindParam(11, $representante);
                        $stmt->bindParam(12, $idFornecedor);
                $stmt->execute();
                $msg->setMsg("<p style='color: blue;'>"
                        . "Dados atualizados com sucesso</p>");
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
        }else{
            $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
        }
        $conn = null;
        return $msg;
    }
    
     //método para carregar lista de produtos do banco de dados
     public function listarFornecedorsDAO(){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        if($conecta){
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->query("select * from fornecedor");
                $lista = array();
                $a = 0;
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $fornecedor = new Fornecedor();
                            $fornecedor->setIdFornecedor($linha->idFornecedor);
                            $fornecedor->setNomeFornecedor($linha->nomeFornecedor);
                            $fornecedor->setEmail($linha->email);
                            $fornecedor->setTellfixo($linha->tellFixo);
                            $fornecedor->setCell($linha->cell);
                            $fornecedor->setCep($linha->cep);
                            $fornecedor->setLogradouro($linha->logradouro);
                            $fornecedor->setUf($linha->uf);
                            $fornecedor->setBairro($linha->bairro);
                            $fornecedor->setCidade($linha->cidade);
                            $fornecedor->setComplemento($linha->complemento);
                            $fornecedor->setRepresentante($linha->representante);
                            $lista[$a] = $fornecedor;
                            $a++;
                        }
                    }
                }
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
            $conn = null;           
            return $lista;
        }
    }
    
    //método para excluir produto na tabela produto
    public function excluirFornecedorDAO($id){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $msg = new Mensagem();
        if($conecta){
             try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conecta->prepare("delete from fornecedor "
                        . "where idFornecedor = ?");
                $stmt->bindParam(1, $id);
                $stmt->execute();
                $msg->setMsg("<p style='color: #d6bc71;'>"
                        . "Dados excluídos com sucesso.</p>");
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            }
        }else{
            $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>"); 
        }
        $conn = null;
        return $msg;
    }
    
    //método para os dados de produto por id
    public function pesquisarFornecedorIdDAO($id){
        $conn = new Conecta();
        $msg = new Mensagem();
        $conecta = $conn->conectadb();
        $fornecedor = new Fornecedor();
        if($conecta){
            try {
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $rs = $conecta->prepare("select * from fornecedor where "
                        . "idfornecedor = ?");
                $rs->bindParam(1, $id);
                if($rs->execute()){
                    if($rs->rowCount() > 0){
                        while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                            $fornecedor->setIdFornecedor($linha->idFornecedor);
                            $fornecedor->setNomeFornecedor($linha->nomeFornecedor);
                            $fornecedor->setEmail($linha->email);
                            $fornecedor->setTellfixo($linha->tellFixo);
                            $fornecedor->setCell($linha->cell);
                            $fornecedor->setCep($linha->cep);
                            $fornecedor->setLogradouro($linha->logradouro);
                            $fornecedor->setUf($linha->uf);
                            $fornecedor->setBairro($linha->bairro);
                            $fornecedor->setCidade($linha->cidade);
                            $fornecedor->setComplemento($linha->complemento);
                            $fornecedor->setRepresentante($linha->representante);
                        }
                    }
                }
            } catch (PDOException $ex) {
                $msg->setMsg(var_dump($ex->errorInfo));
            } 
            $conn = null;
        }else{
            echo "<script>alert('Banco inoperante!')</script>";
            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
			 URL='../PHPMatutinoPDO/cadastroFornecedor.php'\">"; 
        }
        return $fornecedor;
    }
}
