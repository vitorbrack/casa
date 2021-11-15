<?php

require_once 'C:/xampp/htdocs/PHPMatutinoPDO/bd/Conecta.php';
require_once 'C:/xampp/htdocs/PHPMatutinoPDO/model/Pessoa.php';
require_once  'C:/xampp/htdocs/PHPMatutinoPDO/model/Endereco.php';
include_once 'C:/xampp/htdocs/PHPMatutinoPDO/model/Mensagem.php';

class daoPessoa {

    public function inserir(Pessoa $pessoa){
      
    
            $conn = new Conecta();
            $msg = new Mensagem();
            $conecta = $conn->conectadb();
            if ($conecta) {
    
                $nome = trim($pessoa->getNome());
                $dtNascimento = trim($pessoa->getDtNascimento());
                $senha = trim($pessoa->getSenha());
                $perfil = trim($pessoa->getPerfil());
                $email = trim($pessoa->getEmail());
                $cpf = trim($pessoa->getCpf());
    
                $cep = trim($pessoa->getFkEndereco()->getCep());
                $logradouro = trim($pessoa->getFkEndereco()->getLogradouro());
                $numero = trim($pessoa->getFkEndereco()->getnumero());
                $uf = trim($pessoa->getFkEndereco()->getUf());
                $bairro = trim($pessoa->getFkEndereco()->getBairro());
                $cidade = trim($pessoa->getFkEndereco()->getCidade());
                $complemento = trim($pessoa->getFkEndereco()->getComplemento());
                
               // $msg->setMsg("Nome: $nome, dtNasc: $dtNasc, login: $login, senha: $senha, perfil: $perfil, email: $email,
               // cpf: $cpf, cep: $cep, logradouro: $logradouro, uf: $uf, bairro: $bairro, cidade: $cidade, complemento: $complemento");
                
                 try {
                    //processo para pegar o idendereco da tabela endereco, conforme 
                    //o cep, o logradouro e o complemento informado.
                    $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                   $st = $conecta->prepare("select idendereco "
                        . "from endereco where cep = ? and "
                        . "logradouro = ? and complemento = ? limit 1");

                    $st->bindParam(1, $cep);
                    $st->bindParam(2, $logradouro);
                    $st->bindParam(3, $complemento);
                    if ($st->execute()) {
                        if ($st->rowCount() > 0) {
                            //$msg->setMsg("".$st->rowCount());
                            while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                                $fkEnd = $linha->idendereco;
                            }
                            //$msg->setMsg("$fkEnd");
                        } else {
                            $st2 = $conecta->prepare("insert into "
                                . "endereco values (null,?,?,?,?,?,?,?)");
                                
                            //TEM QUE ESTAR NA MESMA ORDEM DO BANCO DE DADOS
                            $st2->bindParam(1, $cep);
                            $st2->bindParam(2, $logradouro);
                            $st2->bindParam(3, $numero);
                            $st2->bindParam(4, $complemento);
                            $st2->bindParam(5, $bairro);
                            $st2->bindParam(6, $cidade);
                            $st2->bindParam(7, $uf);
                            $st2->execute();
    
                            $st3 = $conecta->prepare("select idendereco "
                                . "from endereco where cep = ? and "
                                . "logradouro = ? and complemento = ? limit 1");
                            $st3->bindParam(1, $cep);
                            $st3->bindParam(2, $logradouro);
                            $st3->bindParam(3, $complemento);
                            if ($st3->execute()) {
                                if ($st3->rowCount() > 0) {
                                   // $msg->setMsg("" . $st3->rowCount());
                                    while ($linha = $st3->fetch(PDO::FETCH_OBJ)) {
                                        $fkEnd = $linha->idendereco;
                                    }
                                    //$msg->setMsg("$fkEnd");
                                }
                            }
                        }
    
                        //processo para inserir dados de pessoa
                        $stmt = $conecta->prepare("insert into pessoa values "
                            . " (null,?,?,?,?,?,?,?)");
    
                        $stmt->bindParam(1, $nome);
                        $stmt->bindParam(2, $dtNascimento);
                        $stmt->bindParam(3, $email);
                        $stmt->bindParam(4, $senha);
                        $stmt->bindParam(5, $perfil);
                        $stmt->bindParam(6, $cpf);
                        $stmt->bindParam(7, $fkEnd);
                        $stmt->execute();
                    }
                    $msg->setMsg($fkEnd);
                    $msg->setMsg("<p style='color: green;'>"
                       . "Dados Cadastrados com sucesso</p>");
                } catch (PDOException $ex) {
                    $msg->setMsg(var_dump($ex->errorInfo));
                }
            } else {
                $msg->setMsg("<p style='color: red;'>"
                    . "Erro na conexão com o banco de dados.</p>");
            }
            $conn = null;
            return $msg;
        }
    
        public function listarPessoasDAO()
        {
            $msg = new Mensagem();
            $conn = new Conecta();
            $conecta = $conn->conectadb();
            if ($conecta) {
                try {
                    $rs = $conecta->query("SELECT * FROM pessoa inner join endereco "
                    . "on pessoa.fkEndereco = endereco.idendereco ");
                    $lista = array();
                    $a = 0;
                    if ($rs->execute()) {
                        if ($rs->rowCount() > 0) {
                            while ($linha = $rs->fetch(PDO::FETCH_OBJ)) {
                                $pessoa = new Pessoa();
                                $pessoa->setIdPessoa($linha->idpessoa);
                                $pessoa->setNome($linha->nome);
                                $pessoa->setDtNascimento($linha->dtNascimento);
                                $pessoa->setEmail($linha->email);
                                $pessoa->setSenha($linha->senha);
                                $pessoa->setPerfil($linha->perfil);
                                $pessoa->setCpf($linha->cpf);
    
                                $endereco = new Endereco();
                                $endereco->setIdEndereco($linha->idendereco);
                                $endereco->setCep($linha->cep);
                                $endereco->setLogradouro($linha->logradouro);
                                $endereco->setNumero($linha->numero);
                                $endereco->setComplemento($linha->complemento);
                                $endereco->setBairro($linha->bairro);
                                $endereco->setCidade($linha->cidade);
                                $endereco->setUf($linha->uf);
                                
    
                                $pessoa->setFkEndereco($endereco); 
                                $lista[$a] = $pessoa;
                                $a++;
                            }
                        }
                    }
                } catch (Exception $ex) {
                    $msg->setMsg($ex);
                }
                $conn = null;
                return $lista;
            }
        }
    
        public function atualizarPessoaDAO(Pessoa $pessoa){
            $conn = new Conecta();
            $msg = new Mensagem();
            $conecta = $conn->conectadb();
            if ($conecta) {
                $idPessoa = $pessoa->getIdpessoa();
                $nome = $pessoa->getNome();
                $dtNasc = $pessoa->getDtNascimento();
                $email = $pessoa->getEmail();
                $senha = $pessoa->getSenha();
                $perfil = $pessoa->getPerfil();
                $cpf = $pessoa->getCpf();
    
                $cep = $pessoa->getFkEndereco()->getCep();
                $logradouro = $pessoa->getFkEndereco()->getLogradouro();
                $numero = $pessoa->getFkEndereco()->getNumero();
                $complemento = $pessoa->getFkEndereco()->getComplemento();
                $bairro = $pessoa->getFkEndereco()->getBairro();
                $cidade = $pessoa->getFkEndereco()->getCidade();
                $uf = $pessoa->getFkEndereco()->getUf();
    
                try {
                    //processo para pegar o idendereco da tabela endereco, conforme 
                    //o cep, o logradouro e o complemento informado.
                    $st = $conecta->prepare("select idendereco "
                        . "from endereco where cep = ? and "
                        . "logradouro = ? and complemento = ? limit 1");
                    $st->bindParam(1, $cep);
                    $st->bindParam(2, $logradouro);
                    $st->bindParam(3, $complemento);
                    if ($st->execute()) {
                        if ($st->rowCount() > 0) {
                            //$msg->setMsg("".$st->rowCount());
                            while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                                $fkEnd = $linha->idendereco;
                            }
                            //$msg->setMsg("$fkEnd");
                        } else {
                            $st2 = $conecta->prepare("insert into "
                                . "endereco values (null,?,?,?,?,?,?,?)");
                                //TEM QUE ESTAR NA MESMA ORDEM DO BANCO DE DADOS
                            $st2->bindParam(1, $cep);
                            $st2->bindParam(2, $logradouro);
                            $st2->bindParam(3, $numero);
                            $st2->bindParam(4, $complemento);
                            $st2->bindParam(5, $bairro);
                            $st2->bindParam(6, $cidade); 
                            $st2->bindParam(7, $uf);      
                           
                            $st2->execute();    
                            $st3 = $conecta->prepare("select idendereco "
                                . "from endereco where cep = ? and "
                                . "logradouro = ? and complemento = ? limit 1");
                            $st3->bindParam(1, $cep);
                            $st3->bindParam(2, $logradouro);
                            $st3->bindParam(3, $complemento);
                            if ($st3->execute()) {
                                if ($st3->rowCount() > 0) {
                                    $msg->setMsg("" . $st3->rowCount());
                                    while ($linha = $st3->fetch(PDO::FETCH_OBJ)) {
                                        $fkEnd = $linha->idendereco;
                                    }
                                    //$msg->setMsg("$fkEnd");
                                }
                            }
                        }
                        $stmt = $conecta->prepare("update pessoa set "
                            . "nome = ?, dtNascimento = ?, senha = ?, "
                            . "perfil = ?, email = ?, cpf = ?, fkEndereco = ? "
                            . "where idpessoa = ?");
    
                        $stmt->bindParam(1, $nome);
                        $stmt->bindParam(2, $dtNascimento);
                        $stmt->bindParam(3, $email);
                        $stmt->bindParam(4, $senha);
                        $stmt->bindParam(5, $perfil);
                        $stmt->bindParam(6, $cpf);
                        $stmt->bindParam(7, $fkEnd);
                        $stmt->bindParam(8, $idPessoa);
    
                        $stmt->execute();
                    } 
    
                } catch (Exception $ex) {
                    $msg->setMsg($ex);
                } 
                } else {
                    $msg->setMsg("<p style='color: red;'>"
                        . "Erro na conexão com o banco de dados.</p>");
                }
                $conn = null;
                return $msg;
        }
    
        public function pesquisarPessoaIdDAO($id){
            $msg = new Mensagem();
            $conn = new Conecta();
            $conecta = $conn->conectadb();
            $pessoa = new Pessoa();
            if($conecta){
                try {
                    
                    $msg->setMsg("<p style='color: green;'>"
                        . "Dados Cadastrados com sucesso</p>");
                    $rs = $conecta->prepare("SELECT * FROM pessoa inner join endereco "
                    . "on pessoa.fkEndereco = endereco.idEndereco where pessoa.idpessoa = ? limit 1");
                    $rs->bindParam(1, $id);
                    if($rs->execute()){
                        if($rs->rowCount() > 0){
                            $endereco = new Endereco();
                            while($linha = $rs->fetch(PDO::FETCH_OBJ)){
                                $pessoa->setIdPessoa($linha->idpessoa);
                                $pessoa->setNome($linha->nome);
                                $pessoa->setDtNascimento($linha->dtNascimento);
                                $pessoa->setSenha($linha->senha);
                                $pessoa->setPerfil($linha->perfil);
                                $pessoa->setEmail($linha->email);
                                $pessoa->setCpf($linha->cpf);
    
                                
                                $endereco->setIdEndereco($linha->idendereco);
                                $endereco->setCep($linha->cep);
                                $endereco->setLogradouro($linha->logradouro);
                                $endereco->setNumero($linha->numero);
                                $endereco->setComplemento($linha->complemento);
                                $endereco->setBairro($linha->bairro);
                                $endereco->setCidade($linha->cidade);
                                $endereco->setUf($linha->uf);
                                
    
                                $pessoa->setFkEndereco($endereco); 
                                
                                
                            }
                        }
                    }
                } catch (Exception $ex) {
                    $msg->setMsg($ex);
                }  
                $conn = null;
            }else{
                echo "<script>alert('Banco inoperante!')</script>";
                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"0;
                 URL='../PHPMatutinoPDO/cadastro.php'\">"; 
            }
            return $pessoa;
        }
    
        public function excluirPessoaDAO($id){
            $conn = new Conecta();
            $conecta = $conn->conectadb();
            $msg = new Mensagem();
            if($conecta){
                try {
                    $stmt = $conecta->prepare("delete from pessoa "
                            . "where idPessoa = ?");
                    $stmt->bindParam(1, $id);
                    $stmt->execute();
                    $msg->setMsg("<p style='color: #d6bc71;'>"
                            . "Dados excluídos com sucesso.</p>");
                } catch (Exception $ex) {
                    $msg->setMsg($ex);
                }
            }else{
                $msg->setMsg("<p style='color: red;'>'Banco inoperante!'</p>"); 
            }
            $conn = null;
            return $msg;
    
        }
    }
