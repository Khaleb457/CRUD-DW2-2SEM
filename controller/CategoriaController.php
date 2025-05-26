<?php
require_once "../config/db.php";
require_once "../model/CategoriaModel.php";

$categoria = new CategoriaModel();
$inserir = $categoria->inserir($_POST['nome_categoria']);

header("Location: ../views/categoria/new.php");


?>