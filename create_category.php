<?php require_once 'includes/redirect.php' ?>
<?php require_once 'includes/header.php' ?>


<h2>Create a new category</h2>
<p>Añadir una nueva categoría.</p>
<hr/>
<br/>
<form action="save_category.php" method="POST" class="create_category">
    <label for="category_name">Category Name</label>
    <input type="text" name="category_name" id="category_name" />

    <input type="submit" value="Crear categoría">
</form>



<?php require_once 'includes/footer.php' ?>