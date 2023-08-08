<?php 
if( isset($_POST['submit']) ){
    // Connect the database.
    require_once 'includes/connection.php';

    if(!isset($_SESSION)){
        session_start();
    }

    $name    = isset($_POST['name'])    ? mysqli_real_escape_string($db,$_POST['name'])    : false;
    $surname = isset($_POST['surname']) ? mysqli_real_escape_string($db,$_POST['surname']) : false;
    $email   = isset($_POST['email'])   ? mysqli_real_escape_string($db,$_POST['email'])   : false;
    $pwd     = isset($_POST['pwd'])     ? mysqli_real_escape_string($db,$_POST['pwd'])     : false;

    // Array of error
    $errors = array();

    // Validate data
    // Valid name
    if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/",$name)){
        $valid_name = true;
    }else{
        $valid_name = false;
        $errors['name'] = 'Invalid name';
    }
    
    // Valid Surname
    if(!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/",$surname)){
        $valid_surname = true;
    }else{
        $valid_surname = false;
        $errors['surname'] = 'Invalid surname';
    }
    
    // Valid Mail
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ){
        $valid_email = true;
    }else{
        $valid_email = false;
        $errors['email'] = 'Invalid email';
    }

    // Valid Password
    if( !empty($pwd) ){
        $valid_password = true;
    }else{
        $valid_password = false;
        $errors['password'] = 'Invalid password';
    }

    // Save the user to database.
    $save_user = false;
    if(count($errors) == 0){
        $save_user = true;
        
        // Secure password
        $secure_pwd = password_hash($pwd, PASSWORD_BCRYPT, ['cost' => 4]);
        
        // Insert to the database
        $sql = "insert into user(name, surname, email, password, fecha) values('$name','$surname', '$email', '$secure_pwd', curdate())";
        $status_mysql = mysqli_query($db, $sql);

        if($status_mysql){
            $_SESSION['success'] = 'El registro se ha completado con éxito.';
        }else{
            $_SESSION['errors']['general'] = 'No se pudo guardar con éxito.';
        }

    }else{
        $_SESSION['errors'] = $errors;
    }
}
header('Location:index.php');