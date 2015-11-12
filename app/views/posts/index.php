<?php require APP_PATH . "/tpls/header.php"; ?>
<!-- Start container -->
<div class="container">
    <?php
        if (!empty($posts[0]) ) {
            echo "<h1>There are " . count($posts) . " posts.</h1>";
        } else if ( empty($posts) ) {
            echo "<h1>There are no posts.</h1>";
        } else {
            echo "<h1>There are one post.</h1>";
        }
    ?>
    <?php if( ! empty($posts) ) : ?>
        <?php if ( !empty($posts[0])) : ?>
            <?php foreach($posts as $post) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading text-center lead">
                        <a href="<?= $this->url('posts/show/'); ?><?= str_replace(' ', '-', trim($post['title']) ); ?>-<?= $post['id']; ?>"><?= $post['title']; ?></a>
                    </div>
                    <div class="panel-body">
                        <p class="lead"><?= $post['content']; ?></p>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-sm btn-danger" href="<?= $this->url('posts/delete/'); ?><?= $post['id']; ?>"><i class="fa fa-trash"></i> delet</a>
                        <a class="btn btn-sm btn-info" href="<?= $this->url('posts/edit/'); ?><?= $post['id']; ?>"><i class="fa fa-edit"></i> edit</a>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php elseif( ! empty($posts) ) : ?>
            <div class="panel panel-default">
                <div class="panel-heading text-center lead">
                    <a href="<?= $this->url('posts/show/'); ?><?= str_replace(' ', '-', trim($posts['title']) ); ?>-<?= $posts['id']; ?>"><?= $posts['title']; ?></a>
                </div>
                <div class="panel-body">
                    <p class="lead"><?= $posts['content']; ?></p>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-sm btn-danger" href="<?= $this->url('posts/delete/'); ?><?= $posts['id']; ?>"><i class="fa fa-trash"></i> delet</a>
                    <a class="btn btn-sm btn-info" href="<?= $this->url('posts/edit/'); ?><?= $posts['id']; ?>"><i class="fa fa-edit"></i> edit</a>
                </div>
            </div>
        <?php else: ?>
            <div class="panel panel-default">
                <div class="panel-heading text-center lead">
                    <a href="<?= $this->url('posts/show/'); ?><?= str_replace(' ', '-', trim($posts['title']) ); ?>-<?= $posts['id']; ?>"><?= $posts['title']; ?></a>
                </div>
                <div class="panel-body">
                    <p class="lead"><?= $posts['content'];  ?></p>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-sm btn-danger" href="<?= $this->url('posts/delete/'); ?><?= $posts['id']; ?>"><i class="fa fa-trash"></i> delet</a>
                    <a class="btn btn-sm btn-info" href="<?= $this->url('posts/edit/'); ?><?= $posts['id']; ?>"><i class="fa fa-edit"></i> edit</a>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="text-center">
            <p class="alert alert-danger"><i class="glyphicon glyphicon-alert"></i> Oups! There are no posts!</p>
        </div>
    <?php endif; ?>
    <p>
        <a href="<?= $this->url('posts/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add post</a>
    </p>
</div>
<!-- End container -->

<!-- Javascript files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script>
    try{Modernizr} catch(e) {document.write('<script src="<?= BASE_URL ?>css/modernizr-2.6.2.min.js"><\/script>')}
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>js/script.js"></script>
</body>
</html>
