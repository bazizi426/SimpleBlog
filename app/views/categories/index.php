<?php
    $categories = \App\Lib\Model::getAllFrom('categories');
    $posts      = \App\Lib\Model::getAllFrom('posts');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Categories</title>
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
    <h1>There are <?= !empty($categories) ? count($categories) . " categories" : "no categories";  ?></h1>

        <?php if( ! empty($categories) ) : ?>
            <?php if ( !empty($categories[0])) : ?>
                <?php foreach($categories as $category) : ?>
                    <div class="panel panel-default">
                        <div class="panel-heading text-center lead">
                            <a href="<?= $this->url('categories/show/') . $category['id']; ?>"><?= $category['name']; ?> <i class="fa fa-star"></i></a>
                        </div>
                        <div class="panel-body">
                            <ul class="nav navbar">
                                <?php foreach($posts as $post) : ?>
                                    <?php if( $post['category_id'] === $category['id'] ) : ?>
                                        <li>
                                            <a href="<?= $this->url('posts/show/'.str_replace(' ', '-', trim($post['title'])).'-'.$post['id']); ?>"><i class="fa fa-arrow-circle-right"></i> <?= $post['title']; ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-sm btn-danger" href="<?= $this->url('categories/delete/'); ?><?= $category['id']; ?>"><i class="fa fa-trash"></i> delete</a>
                            <a class="btn btn-sm btn-info" href="<?= $this->url('categories/edit/'); ?><?= $category['id']; ?>"><i class="fa fa-edit"></i> edit</a>
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
