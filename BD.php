<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                "mysql:host=localhost;dbname=mydb" ,
                "root" ,
                "root"
            );

            return $conn;
        }
    }