<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
$category_id = getCategoryID($_GET['id']);
if (!isset($category_id['id'])) {
    header('Location: index.php');
}
$blogs_by_category = getBlogsFromCategory((int)$category_id['id']);
?>
<h2>Categoría: <?= $category_id['name'] ?></h2>
<?php if (!empty($blogs_by_category) && mysqli_num_rows($blogs_by_category) >= 1 ) : ?>
    <?php while ($blog = mysqli_fetch_assoc($blogs_by_category)) : ?>
        <article class="news">
            <a href="blog.php?id=<?= $blog['blog_id'] ?>">
                <h2><?= $blog['blog_title'] ?></h2>
                <span class="subtitle"><a href="category.php?id=<?= $blog['category_id'] ?>"></a><?= $blog['category_name'] ?>
            </a> | <?= $blog['fecha'] ?></span>
            <p><?= substr($blog['blog_desc'], 0, 230) . '...' ?></p>
            </a>
        </article>
    <?php endwhile; ?>
<?php else: ?>
    <p>No hay blogs para la categoría: <?=$category_id['name']?></p>
<?php endif; ?>



<?php require_once 'includes/footer.php' ?>