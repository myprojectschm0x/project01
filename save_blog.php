<?php

if(isset($_POST)){
    require_once 'includes/connection.php';

    

    $title       = isset($_POST['title']) ? mysqli_real_escape_string($db,$_POST['title']) : null;
    $description = isset($_POST['description']) ? mysqli_real_escape_string($db,$_POST['description']) : null;
    $category_id = isset($_POST['category']) ? (int)$_POST['category'] : null;
    $user_id     = (int)$_SESSION['user']['id'];


    //Valid data
    $errors = array();
    if(empty($title)){
        $errors['title'] = 'El título es invalido';
    }

    if(empty($description)){
        $errors['description'] = 'La descripción es inválida.';
    }

    if($category_id == -1 ){
        $errors['category'] = 'Inserta la categoría.';
    }

    if( count($errors) == 0 ){
        $sql = "insert into blog(user_id,title, description, category_id, fecha) ".
                "values($user_id,'$title','$description', $category_id, curdate())";
        $mysql_status = mysqli_query($db, $sql);

        // if($mysql_status){

        // }
        header("Location:index.php");
    }else{
        $_SESSION['blog_errors'] = $errors;
        header("Location:create_blog.php?");
    }
}
