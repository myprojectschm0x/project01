<?php 

// Connection
# DataBase Credentials:
$host = '';
$username = '';
$password = '';
$database = '';

$db = mysqli_connect($host, $username, $password, $database);
mysqli_query($db, "set names 'utf8'");

// Init session
if(!isset($_SESSION)){
    session_start();
}