<?php
// Iniciar sesion e iniciar la conexión. 
require_once 'includes/connection.php';
// session_start();

// Get data from form(POST)
if (isset($_POST)) {
    // Delete session for 'login_error'.
    if (isset($_SESSION['login_error'])) {
        unset($_SESSION['login_error']);
    }

    $email = trim($_POST['email']);
    $pwd = $_POST['pwd'];

    $sql = "select * from user where email='$email'";
    $mysql_status_user = mysqli_query($db, $sql);

    if ($mysql_status_user && mysqli_num_rows($mysql_status_user) == 1) {
        $user = mysqli_fetch_assoc($mysql_status_user);

        // Check password
        $check_pwd = password_verify($pwd, $user['password']);
        if ($check_pwd) {
            // Using session to save user's data.
            $_SESSION['user'] = $user;
            
        } else {
            // Something wrong with the session. 
            $_SESSION['login_error'] = '¡Login Incorrecto!';
        }
    } else {
        // Error
        $_SESSION['login_error'] = '¡Login Incorrecto!';
    }
}

// Redirect to index.php
header('Location:index.php');
