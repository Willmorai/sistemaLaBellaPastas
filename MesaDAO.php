<?php
    class MesaDAO {
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
    }