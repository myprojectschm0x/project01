<!-- HEADER AND START THE HTML Document -->
<?php require_once 'includes/header.php' ?>
<section id="section">
    <h1>Mis blogs</h1>
    <?php
    $blogs = getBlogs(true);
    if (!is_null($blogs)) :
        // if(!empty($blogs)):
        while ($blog = mysqli_fetch_assoc($blogs)) :
    ?>
            <article class="news">
                <a href="blog.php?id=<?=$blog['blog_id']?>">
                    <h2><?= $blog['blog_title'] ?></h2>
                    <span class="subtitle"><a href="category.php?id=<?=$blog['category_id']?>"><?= $blog['category_name'] ?> </a> | <?= $blog['fecha'] ?></span>
                    <p><?= substr($blog['blog_desc'], 0, 230) . '...' ?></p>
                </a>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p>¡No hay artículos que mostrar!</p>
    <?php endif; ?>
</section>
<!-- Fin del section -->
<div id="see-all">
    <a href="blogs.php">
        <p>Ver todas</p>
    </a>
</div>

<!-- FOOTER AND END OF HTML -->
<?php require_once 'includes/footer.php' ?>