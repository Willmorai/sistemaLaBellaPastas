<?php
    class GarcomDAO {
        public function create($garcom) {
            try {
                $query = BD::getConexao()->prepare("INSERT INTO garcom(nome_garcom)
                VALUES (:n)"
                );
                $query->bindValue(':n', $garcom->getNome(),PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM Garcom"
                );

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaGarcom=array();

                 foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $garcom = new Garcom (); //Classe bean
                    $garcom->setId($linha['id_garcom']);
                    $garcom->setNome($linha['nome_garcom']);

                    array_push($listaGarcom, $garcom);
                }

                return $listaGarcom;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Garcom WHERE id_garcom - :i"
                );
                $query->bindValue(':i', $id,PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                 if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $garcom = new Garcom (); //Classe bean
                    $garcom->setId($linha['id_garcom']);
                    $garcom->setNome($linha['nome_garcom']);
;
                }

                return $garcom;

            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($garcom) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE garcom
                    SET nome = :n 
                    WHERE id_garcom = i"
                );
                $query->bindValue(':n', $garcom->getNome(),PDO::PARAM_STR);
                $query->bindValue(':i', $garcom->getId(),PDO::PARAM_STR);

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
                    "DELETE FROM garcom
                    WHERE id_garcom = :i"
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
