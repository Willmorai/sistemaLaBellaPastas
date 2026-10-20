<?php
   class PagamentoDAO {
        public function create($pagamento) {
            try {
                $query = BD::getConexao()->prepare("INSERT INTO pagamento(tipo_pagamento)
                VALUES (:t)"
                );
                $query->bindValue(':t', $pagamento->getTipo(),PDO::PARAM_STR);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Pagamento"
                );

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaPagamento=array();

                 foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $pagamento = new Pagamento (); //Classe bean
                    $pagamento->setId($linha['id_pagamento']);
                    $pagamento->setTipo($linha['tipo_pagamento']);

                }

                return $listaPagamento;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Pagamento WHERE id - :i"
                );
                $query->bindValue(':i', $id,PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                 if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $pagamento = new Pagamento (); //Classe bean
                    $pagamento->setId($linha['id_pagamento']);
                    $pagamento->setTipo($linha['tipo_pagamento']);
;
                }

                return $pagamento;

            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }
        public function update($pagamento) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE pagamento
                    SET tipo_pagamento = :t 
                    WHERE id = i"
                );
                $query->bindValue(':t', $pagamento->getNome(),PDO::PARAM_STR);
                $query->bindValue(':i', $pagamento->getId(),PDO::PARAM_STR);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }
        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM pagamento
                    WHERE id = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
   }
