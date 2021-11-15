<?php
Class Pessoa {
    private $idpessoa;
    private $nome;
    private $dtNascimento;
    private $email;
    private $senha;
    private $perfil;
    private $cpf;
    private $FkEndereco;

    /**
     * Get the value of idpessoa
     */ 
    public function getIdpessoa()
    {
        return $this->idpessoa;
    }

    /**
     * Set the value of idpessoa
     *
     * @return  self
     */ 
    public function setIdpessoa($idpessoa)
    {
        $this->idpessoa = $idpessoa;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of dtNascimento
     */ 
    public function getDtNascimento()
    {
        return $this->dtNascimento;
    }

    /**
     * Set the value of dtNascimento
     *
     * @return  self
     */ 
    public function setDtNascimento($dtNascimento)
    {
        $this->dtNascimento = $dtNascimento;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of perfil
     */ 
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Set the value of perfil
     *
     * @return  self
     */ 
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of FkEndereco
     */ 
    public function getFkEndereco()
    {
        return $this->FkEndereco;
    }

    /**
     * Set the value of FkEndereco
     *
     * @return  self
     */ 
    public function setFkEndereco($FkEndereco)
    {
        $this->FkEndereco = $FkEndereco;

        return $this;
    }
}