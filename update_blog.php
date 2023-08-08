<?php

if( isset($_POST) ){
    # DB Connection
    require_once 'includes/connection.php';

    # Sesion
    if(!isset($_SESSION)){
        session_start();
    }
    # Primero checka el blog. 
    $blog_id = $_POST['blog_id'];
    $user_id = $_POST['user_id'];
    $sql_blog = "select b.user_id, b.id as 'blog_id', b.title, b.description, b.category_id from blog b "
                ."inner join category c on b.category_id = c.id "
                ."inner join user u on b.user_id = u.id "
                ."where b.user_id = $user_id and b.id = $blog_id";
    $mysql_status = mysqli_query($db, $sql_blog);

    if($mysql_status){
        $original_blog = mysqli_fetch_assoc($mysql_status);
    }else{
        $msg = 'Error, no hay blog';
        header("Location:update_blog_form.php?blog_error=$msg");
    }
    
    $new_title = $_POST['title'];
    $new_description = $_POST['description'];
    $new_category_id = $_POST['category'];

    // if($new_title != $original_blog['title']){
    //     # Update el Title 
    //     $sql = "update blog set title = '$new_title' where id = $blog_id";
    //     $mysql_status = mysqli_query($db, $sql);
    // }
    // if($new_description != $original_blog['description']){
    //     # Update el Description
    //     $sql = "update blog set description ";
    // }
    $sql = "update blog set title = '$new_title', description = '$new_description', category_id = $new_category_id where id = $blog_id and user_id = $user_id";
    $mysql_status = mysqli_query($db, $sql);

    if($mysql_status){
        $current_blog_id = $original_blog['blog_id'];
        header("Location:update_blog_form.php?blog_id=$current_blog_id");
    }
}