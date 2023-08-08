<?php

if( isset($_POST) ){
    // DB Connection
    require_once 'includes/connection.php';

    $name = isset($_POST['category_name']) ? mysqli_real_escape_string($db,$_POST['category_name']) : null;

    $errors = array();
    if( !empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name) ){
        $valid_name = true;
    }else{
        $valid_name = false;
        $errors['name'] = "El nombre no es válido";
    }

    if( count($errors) == 0 ){
        $sql          = "insert into category(name) values('$name')";
        $query_status = mysqli_query($db, $sql);
    }
}

header('Location:index.php');