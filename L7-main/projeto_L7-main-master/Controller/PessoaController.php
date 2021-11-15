<?php
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/Dao/DaoPessoa.php';
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/model/Pessoa.php';

class PessoaController {
    
    public function inserirPessoa($cep, $logradouro, 
            $numero, $complemento, $bairro, $cidade, $uf,
            $nome, $dtNascimento, $email, $senha, $perfil, $cpf){
        
        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setLogradouro($logradouro);
        $endereco->setNumero($numero);
        $endereco->setComplemento($complemento);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUf($uf);
        
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setDtNascimento($dtNascimento);
        $pessoa->setSenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);
       
        
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->inserir($pessoa);
    }
    
    //método para atualizar dados de produto no BD
    public function atualizarPessoa($idpessoa, $cep, $logradouro, 
    $numero, $complemento, $bairro, $cidade, $uf,
    $nome, $dtNascimento, $email, $senha, $perfil, $cpf, ){
        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setLogradouro($logradouro);
        $endereco->setNumero($numero);
        $endereco->setComplemento($complemento);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUf($uf);
        
        $pessoa = new Pessoa();
        $pessoa->setIdpessoa($idpessoa);
        $pessoa->setNome($nome);
        $pessoa->setDtNascimento($dtNascimento);
        $pessoa->setSenha($senha);
        $pessoa->setPerfil($perfil);
        $pessoa->setEmail($email);
        $pessoa->setCpf($cpf);
    

        
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->atualizarPessoaDAO($pessoa);
    }
    
    //método para carregar a lista de produtos que vem da DAO
    public function listarPessoaes(){
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->listarPessoasDAO();
    }
    
    //método para excluir produto
    public function excluirPessoa($id){
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->excluirPessoaDAO($id);
    }
    
    //método para retornar objeto produto com os dados do BD
    public function pesquisarPessoaId($id){
        $daoPessoa = new DaoPessoa();
        return $daoPessoa->pesquisarPessoaIdDAO($id);
    }
    
    //método para limpar formulário
    public function limpar(){
        return $fr = new Pessoa();
    }
}