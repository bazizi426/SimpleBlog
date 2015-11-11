<?php
    $categories = \App\Lib\Model::getAllFrom('categories');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All posts</title>
    <!-- Style sheet files -->
    <link rel="stylesheet" href="<?= BASE_URL ?>css/normalize.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">

</head>
<body>
<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= $this->url('posts/index'); ?>">SimpleBlog</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= $this->url('posts/index'); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?= $this->url('categories/index'); ?>"><i class="fa fa-apple"></i> All categories</a></li>
                <?php if( ! empty($categories) ) : ?>
                    <?php if ( !empty($categories[0])) : ?>
                        <?php foreach($categories as $category) : ?>
                            <li>
                                <a href="<?= $this->url('categories/show/'); ?><?= $category['id']; ?>"><?= $category['name']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!-- Start container -->
<div class="container">
    <?php
        $posts = \App\Lib\Model::getAllFrom('posts');
    ?>
    <h1>There are <?= !empty($posts) ? count($posts) . " posts" : "no posts";  ?></h1>

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
                <a href="<?= $this->url('posts/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add post</a>
            </div>
        <?php endif; ?>
        <p>
            <a href="<?= $this->url('posts/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add post</a>
        </p>
</div>
<!-- End container -->

<!-- Javascript files -->
<script src="<?= BASE_URL ?>js/jquery-v2.1.4.min.js"></script>
<script src="<?= BASE_URL ?>js/modernizr-2.6.2.min.js"></script>
<script src="<?= BASE_URL ?>js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>js/script.js"></script>
</body>
</html>
