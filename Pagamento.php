<?php
    class Pagamento {
        private $id;
        private $tipo;

        public function getId() {
            return $this->id;
        }
        public function setID($id) {
            $this->id = $id;
        }
        public function getTipo() {
            return $this->tipo;
        }
        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }
    }