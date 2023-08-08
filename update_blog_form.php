<?php require_once 'includes/redirect.php' ?>
<?php require_once 'includes/header.php' ?>
<?php
$blog = getBlog($_GET['blog_id']);
if (!isset($blog['blog_id'])) {
    header('Location:index.php');
}
?>

<h2>Editar Blog</h2>
<p>Editar el blog:</p>
<hr />
<br />
<form action="update_blog.php" method="POST">
    <input type="hidden" name="blog_id" value="<?=$blog['blog_id']?>">
    <input type="hidden" name="user_id" value="<?=$blog['user_id']?>">
    <label for="title">Título:</label>
    <input type="text" name="title" id="title" value="<?= $blog['title'] ?>">

    <label for="category">Categoría:</label>
    <select name="category" id="category">
        <option value="-1">Seleccionar...</option>
        <?php
        $categories = getCategory();
        if (!empty($categories)) :
            while ($category = mysqli_fetch_assoc($categories)) :
        ?>
                <option value="<?=$category['id']?>" 
                    <?=($category['id'] == $blog['category_id']) ? 'selected' : ''?>
                >
                    <?=$category['name']?>
                </option>
            <?php endwhile; ?>
        <?php endif; ?>
    </select>

    <label for="description">Descripción:</label>
    <textarea name="description" id="description" cols="30" rows="10"><?= $blog['description'] ?></textarea>

    <input type="submit" value="Actualizar">
</form>



<?php require_once 'includes/footer.php' ?>