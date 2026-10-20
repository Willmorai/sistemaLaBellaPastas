<?php
    require "../../autoload.php";

    $id = $_GET['id'];

    $dao = new MesaDAO();

    $dao->destroy($id);

    header('Location: index.php');