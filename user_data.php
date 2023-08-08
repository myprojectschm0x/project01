<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/header.php'; ?>

<h2>Mis Datos</h2>
<hr/>
<br/>

<?php if( isset($_SESSION['user_update_success']) ): ?>
    <div class="alert alert-success">
        <?=$_SESSION['user_update_success']?>
    </div>
<?php elseif( isset($_SESSION['user_errors']['general']) ): ?>
    <div class="alert alert-error">
        <?=$_SESSION['user_errors']['general']?>
    </div>
<?php endif; ?>
<form action="update_user.php" method="POST" >
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" value="<?=$_SESSION['user']['name']?>" />
    <?php echo isset( $_SESSION['user_errors'] ) ? showErrors($_SESSION['user_errors'], 'name') : '' ?>
    
    <label for="surname">Surname:</label>
    <input type="text" name="surname" id="surname" value="<?=$_SESSION['user']['surname']?>" />
    <?php echo isset( $_SESSION['user_errors'] ) ? showErrors($_SESSION['user_errors'], 'surname') : '' ?>    
    
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= $_SESSION['user']['email'] ?>" />
    <?php echo isset( $_SESSION['user_errors'] ) ? showErrors($_SESSION['user_errors'], 'email') : '' ?>    
    
    <input type="submit" value="Actualizar el usuario" />
</form>
<?php deleteSession(); ?>


<?php require_once 'includes/footer.php'; ?>