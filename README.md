# Project 01: Basics Website

## Description 

A basic website with pure PHP and contains login and connection to MySQL.

## Stacks

1. PHP
2. HTML
3. CSS 
4. MySQL
5. Git

## Setup

Set the database's credentials on `includes/connection.php`.

```
$host = '';
$username = '';
$password = '';
$database = '';

$db = mysqli_connect($host, $username, $password, $database);
mysqli_query($db, "set names 'utf8'");
```