<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    $mesa = new mesa();

    $mesa->setNumero($_POST['numero']);

    $dao = new MesaDAO();
    
    $dao->create($mesa);

    header('Location: index.php');