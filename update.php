<?php
    require "../../autoload.php";


    $garcom = new Garcom();

    //Definir os valores dos atributos  a partir dos dados do form
    $garcom->setNome($_POST['nome']);
    $garcom->setId($_POST['id']);

    //Instanciar um obj da classe GarcomDAO
    $dao = new GarcomDAO();

    //Invocar o método da classe GracomDAO
    $dao->update($garcom);

    
