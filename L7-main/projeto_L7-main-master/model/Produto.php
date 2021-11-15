<?php
    Class Produto {
        private $idProduto;
        private $categoria;
        private $nomeProduto;
        private $cor;
        private $tamanho;
        private $vlrCompra;
        private $vlrVenda;
        private $qtdEstoque;
        private $lote;
        private $dtCompra;
        private $FkFornecedor;
        private $FkMarca;

        /**
         * Get the value of idProduto
         */ 
        public function getIdProduto()
        {
                return $this->idProduto;
        }

        /**
         * Set the value of idProduto
         *
         * @return  self
         */ 
        public function setIdProduto($idProduto)
        {
                $this->idProduto = $idProduto;

                return $this;
        }

        /**
         * Get the value of categoria
         */ 
        public function getCategoria()
        {
                return $this->categoria;
        }

        /**
         * Set the value of categoria
         *
         * @return  self
         */ 
        public function setCategoria($categoria)
        {
                $this->categoria = $categoria;

                return $this;
        }

        /**
         * Get the value of nomeProduto
         */ 
        public function getNomeProduto()
        {
                return $this->nomeProduto;
        }

        /**
         * Set the value of nomeProduto
         *
         * @return  self
         */ 
        public function setNomeProduto($nomeProduto)
        {
                $this->nomeProduto = $nomeProduto;

                return $this;
        }

        /**
         * Get the value of cor
         */ 
        public function getCor()
        {
                return $this->cor;
        }

        /**
         * Set the value of cor
         *
         * @return  self
         */ 
        public function setCor($cor)
        {
                $this->cor = $cor;

                return $this;
        }

        /**
         * Get the value of tamanho
         */ 
        public function getTamanho()
        {
                return $this->tamanho;
        }

        /**
         * Set the value of tamanho
         *
         * @return  self
         */ 
        public function setTamanho($tamanho)
        {
                $this->tamanho = $tamanho;

                return $this;
        }

        /**
         * Get the value of vlrCompra
         */ 
        public function getVlrCompra()
        {
                return $this->vlrCompra;
        }

        /**
         * Set the value of vlrCompra
         *
         * @return  self
         */ 
        public function setVlrCompra($vlrCompra)
        {
                $this->vlrCompra = $vlrCompra;

                return $this;
        }

        /**
         * Get the value of vlrVenda
         */ 
        public function getVlrVenda()
        {
                return $this->vlrVenda;
        }

        /**
         * Set the value of vlrVenda
         *
         * @return  self
         */ 
        public function setVlrVenda($vlrVenda)
        {
                $this->vlrVenda = $vlrVenda;

                return $this;
        }

        /**
         * Get the value of qtdEstoque
         */ 
        public function getQtdEstoque()
        {
                return $this->qtdEstoque;
        }

        /**
         * Set the value of qtdEstoque
         *
         * @return  self
         */ 
        public function setQtdEstoque($qtdEstoque)
        {
                $this->qtdEstoque = $qtdEstoque;

                return $this;
        }

        /**
         * Get the value of lote
         */ 
        public function getLote()
        {
                return $this->lote;
        }

        /**
         * Set the value of lote
         *
         * @return  self
         */ 
        public function setLote($lote)
        {
                $this->lote = $lote;

                return $this;
        }

        /**
         * Get the value of dtCompra
         */ 
        public function getDtCompra()
        {
                return $this->dtCompra;
        }

        /**
         * Set the value of dtCompra
         *
         * @return  self
         */ 
        public function setDtCompra($dtCompra)
        {
                $this->dtCompra = $dtCompra;

                return $this;
        }

        /**
         * Get the value of FkFornecedor
         */ 
        public function getFkFornecedor()
        {
                return $this->FkFornecedor;
        }

        /**
         * Set the value of FkFornecedor
         *
         * @return  self
         */ 
        public function setFkFornecedor($FkFornecedor)
        {
                $this->FkFornecedor = $FkFornecedor;

                return $this;
        }

        /**
         * Get the value of FkMarca
         */ 
        public function getFkMarca()
        {
                return $this->FkMarca;
        }

        /**
         * Set the value of FkMarca
         *
         * @return  self
         */ 
        public function setFkMarca($FkMarca)
        {
                $this->FkMarca = $FkMarca;

                return $this;
        }
    }