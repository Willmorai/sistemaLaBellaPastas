<?php
    class MesaDAO {
        public function create($mesa) {
            try {
                $query = BD::getConexao()->prepare("INSERT INTO mesa(numero)
                VALUES (:n)"
                );
                $query->bindValue(':n', $mesa->getNumero(),PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM Mesa");

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaMesa = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $mesa = new Mesa (); //Classe bean
                    $mesa->setId($linha['id_mesa']);
                    $mesa->setNumero($linha['numero']);

                    array_push($listaMesa, $mesa);
                }

                return $listaMesa;

            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Mesa WHERE id - :i"
                );
                $query->bindValue(':i', $id,PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                 if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $mesa = new Numero (); //Classe bean
                    $mesa->setId($linha['id']);
                    $mesa->setNumero($linha['numero']);
;
                }

                return $mesa;

            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($mesa) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE mesa
                    WHERE id = i"
                );
                $query->bindValue(':i', $mesa->getId(),PDO::PARAM_STR);
                $query->bindValue(':nu', $mesa->getNumero(),PDO::PARAM_INT);

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
                    "DELETE FROM mesa
                    WHERE id  = i"
                );
                $query->bindValue(':i', $Id, PDO::PARAM_STR);

                if(!$query->execute()){
                    print_r($query->errorInfo());
                }
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
        
    }
