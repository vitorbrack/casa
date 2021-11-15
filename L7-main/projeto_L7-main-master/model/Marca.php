<?php

class Marca{

    private $idMarca;
    private $nomeMarca;
    private $representante;
    private $emailRepresentante;

    

    /**
     * Get the value of idMarca
     */ 
    public function getIdMarca()
    {
        return $this->idMarca;
    }

    /**
     * Set the value of idMarca
     *
     * @return  self
     */ 
    public function setIdMarca($idMarca)
    {
        $this->idMarca = $idMarca;

        return $this;
    }

    /**
     * Get the value of nomeMarca
     */ 
    public function getNomeMarca()
    {
        return $this->nomeMarca;
    }

    /**
     * Set the value of nomeMarca
     *
     * @return  self
     */ 
    public function setNomeMarca($nomeMarca)
    {
        $this->nomeMarca = $nomeMarca;

        return $this;
    }

    /**
     * Get the value of representante
     */ 
    public function getRepresentante()
    {
        return $this->representante;
    }

    /**
     * Set the value of representante
     *
     * @return  self
     */ 
    public function setRepresentante($representante)
    {
        $this->representante = $representante;

        return $this;
    }

    /**
     * Get the value of emailRepresentante
     */ 
    public function getEmailRepresentante()
    {
        return $this->emailRepresentante;
    }

    /**
     * Set the value of emailRepresentante
     *
     * @return  self
     */ 
    public function setEmailRepresentante($emailRepresentante)
    {
        $this->emailRepresentante = $emailRepresentante;

        return $this;
    }
}