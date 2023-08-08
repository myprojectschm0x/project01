<?php require_once 'connection.php' ?>
<?php require_once 'includes/helpers.php' ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Proyecto 1</title>
    <link rel='stylesheet' type='text/css' href='./assets/css/general.css' />
    <link rel='stylesheet' type='text/css' href='./assets/css/header/header.css' />
    <link rel='stylesheet' type='text/css' href='./assets/css/content/content.css' />
    <link rel='stylesheet' type='text/css' href='./assets/css/content/sidebar.css' />
    <link rel='stylesheet' type='text/css' href='./assets/css/footer/footer.css' />
    <link rel='stylesheet' type='text/css' href='./assets/css/alerts/alert.css' />

</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <!-- LOGO -->
        <div id="logo">
            <a href="index.php">
                Blog de artículos
            </a>
        </div>
        <!-- MENU -->
        <nav id="nav">
            <ul>
                <li>
                    <p><a href="index.php">Inicio </a></p>
                </li>
                <?php
                $categories = getCategoriesNav();
                if (!empty($categories)) :
                    while ($category = mysqli_fetch_assoc($categories)) :
                ?>
                        <li>
                            <p><a href="category.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></p>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
                <li>
                    <p><a href="#">Sobre nosotros </a></p>
                </li>
                <li>
                    <p><a href="#">Contacto </a></p>
                </li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <!-- BODY -->
    <div id="container">
        <!-- MAIN -->
        <div id="main">