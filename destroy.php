<?php
    require "../../autoload.php";

    $id = $_GET['id'];

    $dao = new GarcomDAO();

    $dao->destroy($id);

    header('Location: index.php');