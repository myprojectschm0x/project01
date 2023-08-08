<?php require_once 'includes/redirect.php' ?>
<?php

if(isset($_POST)){
    // Connection to DB
    require_once 'includes/connection.php';

    // Session
    if(!isset($_SESSION)){
        session_start();
    }

    // DATA
    $name    = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : null;
    $surname = isset($_POST['surname']) ? mysqli_real_escape_string($db, $_POST['surname']) : null;
    $email   = isset($_POST['email']) ? mysqli_real_escape_string($db, $_POST['email']) : null;
    $user_id = (int)$_SESSION['user']['id'];

    $errors = array();

    // Validate data
    if(!empty($name) && !is_numeric($name) && !preg_match('/[0-9]/', $name)){
        $valid_name = true;
    }else{
        $errors['name'] = 'El nombre no es válido';
    }
    
    if(!empty($surname) && !is_numeric($surname) && !preg_match('/[0-9]/', $surname)){
        $valid_surname = true;
    }else{
        $errors['surname'] = 'Los apellidos no son válidos';
    }

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $valid_email = true;
    }else{
        $errors['email'] = 'EL correo es inválido';
    }

    if(count($errors) == 0){
        // Check the email.

        $email_query = "select id, email from user where email = '$email'";
        $fetch_email = mysqli_query($db, $email_query);
        $fetch_user = mysqli_fetch_assoc($fetch_email);

        
        if($fetch_user['id'] == $_SESSION['user']['id'] || empty($fetch_user)){
            // Update the data.
            $sql = "update user set name='$name', surname='$surname', email='$email' where id=$user_id";
            $mysql_status = mysqli_query($db, $sql);


            if($mysql_status){
                $_SESSION['user']['name'] = $name;
                $_SESSION['user']['surname'] = $surname;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user_update_success'] = 'Tus datos han actualizado con éxito';
            }else{
                $_SESSION['user_errors']['general'] = 'Fallo al actualizar los datos';
            }
        }else{
            $_SESSION['user_errors']['general'] = "¡El usuario ya existe!";
        }

    }else{
        $_SESSION['user_errors'] = $errors;
    }
}
header("Location:user_data.php");


?>