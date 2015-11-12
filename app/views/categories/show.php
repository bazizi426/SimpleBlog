<?php
$categories = App\Lib\Model::getAllFrom('categories');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show category : <?= $this->category['name'] ?></title>
    <!-- Style sheet files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
    <div class="panel panel-info">
        <div class="panel-heading text-center">
            <h1><?= $this->category['name'] ?></h1>
        </div>
        <div class="panel-body">
            <?php if( !empty($this->posts) ): ?>
                <?php if( isset($this->posts[0]) ) : ?>
                    <?php foreach($this->posts as $post) : ?>
                        <p class="lead">
                            <a href="<?= $this->url('posts/show/'.str_replace(' ', '-', $post['title']).'-'.$post['id']); ?>">
                                <?= $post['title']; ?>
                            </a>
                        </p>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="lead">
                        <a href="<?= $this->url('posts/show/'.str_replace(' ', '-', $this->posts['title']) . '-' . $this->posts['id']); ?>">
                            <?= $this->posts['title']; ?>
                        </a>
                    </p>
                <?php endif; ?>
            <?php else : ?>
                <p class="lead">
                    This category is empty.
                </p>
            <?php endif; ?>
        </div>
        <div class="panel-footer text-center">
            <a href="<?= $this->url('categories/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add category</a>
            <a href="<?= $this->url('categories/edit/'.$this->category['id']); ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit category</a>
            <a href="<?= $this->url('categories/delete/'.$this->category['id']); ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Delete category</a>
        </div>
    </div>
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
