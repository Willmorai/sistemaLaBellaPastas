<?php
    class GarcomDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM Garcom");

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaGarcom = array();
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
    }