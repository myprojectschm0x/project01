<?php require_once './includes/helpers.php' ?>

<aside id="sidebar">
    <div class="block-aside">
        <form action="search.php" method="POST">
            <input type="text" name="search" id="search" />
            <input type="submit" value="Buscar">
        </form>
    </div>
    <?php if (isset($_SESSION['user'])) : ?>

        <div id="user-logged" class="block-aside">
            <h3>¡Bienvenido,<?= ucwords($_SESSION['user']['name']) . ' ' . ucwords($_SESSION['user']['surname']) ?>!</h3>
            <a href="create_blog.php" class="button create-blog">Crear un blog</a>
            <a href="create_category.php" class="button">Crear una categoría</a>
            <a href="user_data.php" class="button data">Mis datos.</a>
            <a href="logout.php" class="button logout">Cerrar sesión.</a>
        </div>
    <?php else : ?>
        <div id="login" class="block-aside">
            <h3>Identificate</h3>
            <?php if (isset($_SESSION['login_error'])) : ?>
                <div class="alert alert-error">
                    <?= $_SESSION['login_error'] ?>
                </div>
            <?php endif; ?>
            <form action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" />

                <label for="pwd">Contraseña</label>
                <input type="password" name="pwd" />

                <input type="submit" value="Iniciar sesión" />
            </form>
        </div>
    <?php endif; ?>
    <?php if (!isset($_SESSION['user'])) : ?>
        <div id="register" class="block-aside">
            <h3>Registrate</h3>
            <?php
            if (isset($_SESSION['success'])) :
            ?>
                <div class="alert alert-success"><?= $_SESSION['success'] ?> </div>
            <?php elseif (isset($_SESSION['errors']['general'])) : ?>
                <div class="alert alert-error"><? showErrors($_SESSION['errors'], 'general') ?></div>
            <?php endif; ?>
            <form action="register.php" method="POST">
                <label for="name">Nombre:</label>
                <input type="text" name="name" />
                <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '' ?>

                <label for="surname">Apellidos:</label>
                <input type="text" name="surname" />
                <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'surname') : '' ?>

                <label for="email">Email</label>
                <input type="email" name="email" />
                <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : '' ?>

                <label for="pwd">Contraseña</label>
                <input type="password" name="pwd" />
                <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'password') : '' ?>

                <input type="submit" name="submit" value="Registrar" />
            </form>
            <?php deleteSession(); ?>
        </div>
    <?php endif; ?>
</aside>