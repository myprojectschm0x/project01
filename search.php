<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/helpers.php' ?>

<?php
if (!isset($_POST['search'])) {
    header("Location:index.php");
}
$search = searchBlog($_POST['search']);
?>
<?php if ($search) : ?>
    <h2>Búsqueda: <?=$_POST['search']?></h2>
    <?php while ($blog = mysqli_fetch_assoc($search)) : ?>
        <?php var_dump($blog); ?>
        <article class="news">
            <a href="blog.php?id=<?=$blog['blog_id']?>">
                <h2><?= $blog['title'] ?></h2>
                <span class="subtitle"><a href="category.php?id=<?=$blog['category_id']?>"></a><?=$blog['category_name']?></a> | <?= $blog['fecha'] ?></span>
                <p><?= substr($blog['blog_desc'], 0, 230) . '...' ?></p>
            </a>
        </article>
    <?php endwhile; ?>
<?php else : ?>
    <p>No existe en la búsqueda. </p>
<?php endif; ?>