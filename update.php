<?php
    require "../../autoload.php";


    $garcom = new Mesa();

    //Definir os valores dos atributos  a partir dos dados do form
    $garcom->setNome($_POST['numero']);
    $garcom->setId($_POST['id']);

    //Instanciar um obj da classe GarcomDAO
    $dao = new MesaDAO();

    //Invocar o método da classe GracomDAO
    $dao->update($mesa);

    
