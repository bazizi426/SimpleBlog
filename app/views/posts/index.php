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
    <?php if ( ! isset($_SESSION['login']) || $_SESSION['login'] !== true ) : ?>
        <p class="alert alert-info">
            Login to manage the posts <a href="<?= $this->url('users/login'); ?>"></a>
        </p>
    <?php endif; ?>

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
                        <?php if ( isset($_SESSION['login']) && $_SESSION['login'] === true ) : ?>
                            <a class="btn btn-sm btn-danger" href="<?= $this->url('posts/delete/'); ?><?= $post['id']; ?>"><i class="fa fa-trash"></i> delet</a>
                            <a class="btn btn-sm btn-info" href="<?= $this->url('posts/edit/'); ?><?= $post['id']; ?>"><i class="fa fa-edit"></i> edit</a>
                        <?php endif; ?>
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
                    <?php if ( isset($_SESSION['login']) && $_SESSION['login'] === true ) : ?>
                        <a class="btn btn-sm btn-danger" href="<?= $this->url('posts/delete/'); ?><?= $posts['id']; ?>"><i class="fa fa-trash"></i> delet</a>
                        <a class="btn btn-sm btn-info" href="<?= $this->url('posts/edit/'); ?><?= $posts['id']; ?>"><i class="fa fa-edit"></i> edit</a>
                    <?php endif; ?>
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
                    <?php if ( isset($_SESSION['login']) && $_SESSION['login'] === true ) : ?>
                        <a class="btn btn-sm btn-danger" href="<?= $this->url('posts/delete/'); ?><?= $posts['id']; ?>"><i class="fa fa-trash"></i> delet</a>
                        <a class="btn btn-sm btn-info" href="<?= $this->url('posts/edit/'); ?><?= $posts['id']; ?>"><i class="fa fa-edit"></i> edit</a>
                    <?php endif; ?>
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
<?php require APP_PATH . "/tpls/footer.php"; ?>