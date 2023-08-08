<?php require_once 'includes/redirect.php' ?>
<?php
require_once 'includes/connection.php';
if( isset($_SESSION['user']) && isset($_GET['blog_id']) ){
    global $bd;
    $blog_id = (int)$_GET['blog_id'];
    $user_id = $_SESSION['user']['id'];

    $sql = "delete from blog b where b.id = $blog_id and b.user_id = $user_id";

    $mysql_status = mysqli_query($db, $sql);
}

header("Location:index.php");