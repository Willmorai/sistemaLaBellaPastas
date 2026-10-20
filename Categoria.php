<?php
    class Categoria {
        private $id;
        private $descricao;

        public function getId() {
            return $this->id;
        }
        public function setID($id) {
            $this->id = $id;
        }
        public function getDescricao() {
            return $this->descricao;
        }
        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }
        
}