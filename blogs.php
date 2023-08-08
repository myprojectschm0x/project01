<?php require_once 'includes/header.php'; ?>


<h2>Todos los Blogs</h2>
<?php
$blogs = getBlogs();
if (!is_null($blogs)) :
    while ($blog = mysqli_fetch_assoc($blogs)) :
?>
        <article class="news">
            <a href="blog.php?id=<?=$blog['blog_id']?>">
                <h2><?= $blog['blog_title'] ?></h2>
                <span class="subtitle"><a href="category.php?id=<?=$blog['category_id']?>"></a><?=$blog['category_name']?></a> | <?= $blog['fecha'] ?></span>
                <p><?= substr($blog['blog_desc'], 0, 230) . '...' ?></p>
            </a>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
<div class="pagination">
    <div class="spacing"></div>
    <div class="spacing"></div>
    <a href="#" class="previous round">&#8249;</a>
    <a href="#" class="next round">&#8250;</a>
    <div class="spacing"></div>
    <div class="spacing"></div>
</div>

<?php require_once 'includes/footer.php'; ?>