<?php require_once 'includes/redirect.php' ?>
<?php require_once 'includes/header.php' ?>

<h2>Crear un blog</h2>
<p>Crear un blog de alguna tema en particular o interés.</p>
<hr/>
<br/>
<form action="save_blog.php" method="POST">

    <label for="title">Título:</label>
    <input type="text" name="title" id="title">
    <?php echo isset($_SESSION['blog_errors']) ? showErrors($_SESSION['blog_errors'], 'title' ) : '' ?>

    <label for="category">Categoría:</label>
    <select name="category" id="category">
        <option value="-1" selected>Seleccionar...</option>
        <?php 
            $categories = getCategory();
            if(!empty($categories)):
                while($category = mysqli_fetch_assoc($categories)):
        ?>
                    <option value="<?=$category['id']?>" ><?=$category['name']?></option>
                <?php endwhile; ?>
        <?php endif; ?>
    </select>
    <?php echo isset( $_SESSION['blog_errors'] ) ? showErrors($_SESSION['blog_errors'], 'category') : '' ?>
    
    <label for="description">Descripción:</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <?php echo isset( $_SESSION['blog_errors'] ) ? showErrors($_SESSION['blog_errors'], 'description') : '' ?>

    <input type="submit" value="Guardar">
    <?php deleteSession(); ?>
</form>





<?php require_once 'includes/footer.php' ?>