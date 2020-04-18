<?php 

require 'functions.php';


$id = $_GET['id'];
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
    }

        if(empty($id)){
            throw new Exception('ID est vide');
        }

    deleteRow($connexion, $id);

    header("Location: index.php");
    die;