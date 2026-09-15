<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    $garcom = new garcom();

    $garcom->setNome($_POST['nome']);

    $dao = new GarcomDAO();
    
    $dao->create($garcom);

    header('Location: index.php');