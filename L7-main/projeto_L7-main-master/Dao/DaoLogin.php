<?php

require_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/DataBase/conecta.php';
require_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/model/Mensagem.php';
require_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/model/Pessoa.php';


class DaoLogin {
 
    public function validarLogin($login, $senha){
        $conn = new Conecta();
        $conecta = $conn->conectadb();
        $pessoa = new Pessoa();
        if($conecta){
            try{
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $st = $conecta->prepare("select * from pessoa where login = ? "
                    . "and senha = md5(?) limit 1");
                $st->bindParam(1, $login);
                $st->bindParam(2, $senha);
                if($st->execute()){
                    if($st->rowCount()>0){
                        while ($linha = $st->fetch(PDO::FETCH_OBJ)) {
                            $pessoa->setIdpessoa($linha->idpessoa);
                            $pessoa->setNome($linha->nome);
                           // $pessoa->setLogin($linha->login);
                            $pessoa->setPerfil($linha->perfil);
                        }
                        return $pessoa;
                    }else{
                        return "<p style='color: red;'>"
                        . "Usuário inexistente.</p>";
                    }
                }
            } catch (PDOException $ex) {
                //$msg->setMsg(var_dump($ex->errorInfo));
                return "<p style='color: red;'>Não foi possível acessar os dados!</p>";
            }
        }else {
            return "<p style='color: red;'>"
                . "Erro na conexão com o banco de dados.</p>";
        }
    }

    /*public function login($email, $senha) {
        $conexao = new Conexao();
        $conexao = $conexao->conexao();  
        $stmt = $conexao->prepare("SELECT cpf, email, senha, nome FROM cliente WHERE email = :email AND senha = :senha");
        $stmt->execute(array('email' => $email, 'senha' => $senha));
        if ($stmt->rowcount() > 0) {
            $result = $stmt->fetch();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_email'] = $result['email'];
            $_SESSION['user_cpf'] = $result['cpf'];
            $_SESSION['user_nome'] = $result['nome'];
            return true;
        }else {
            return false;
        }
    }*/

    public function logout(){
        session_destroy();
    }

    public function isLoggedIn(){
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            return true;
        }
        return false;
    }

}

