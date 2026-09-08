<?php
    class Mesa {
        private $id;
        private $numero;

        public function getId() {
            return $this->id;
        }
        public function setID($id) {
            $this->id = $id;
        }
        public function getNumero() {
            return $this->numero;
        }
        public function setNumero($numero) {
            $this->numero = $numero;
        }
        
}