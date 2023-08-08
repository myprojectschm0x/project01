<?php require_once 'includes/header.php'; ?>

<?php
    $blog_id = (int)$_GET['id'];
    $blog = getBlog($blog_id);

    if(!$blog ){
        header("Location:index.php");
    }
?>
<h2>Blog: </h2>
<hr/>
<br/>
<section id="section">
    <article class="news">
        <h2><?=$blog['title']?></h2>
        <span class="subtitle"><?=$blog['fecha']?> | by <strong><?=$blog['user_name']?></strong></span>
        <p>
            <?=$blog['description']?>
        </p>
        <?php if( isset($_SESSION['user']) && $_SESSION['user']['id'] == $blog['user_id'] ): ?>
            <div class="btn-edition-deletion">
                <a class="btn-edit" href="update_blog_form.php?blog_id=<?=$blog['blog_id']?>">Editar</a>
                <a class="btn-delete" href="delete_blog.php?blog_id=<?=$blog['blog_id']?>">Borrar</a>
            </div>
        <?php endif; ?>
    </article>
</section>
<div id="see-all">
    <a href="index.php">
        <p>Atrás</p>
    </a>
</div>
<?php require_once 'includes/footer.php'; ?>