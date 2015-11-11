<?php
    $categories = \App\Lib\Model::getAllFrom('categories');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add post</title>
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
    <h1>Add post</h1>
    <?php
    $categories = \App\Lib\Model::getAllFrom('categories');
    ?>
    <form action="<?= $this->url('posts/save'); ?>" method="POST" enctype="application/x-www-form-urlencoded" class="form-group">
        <label for="title">Title :</label>
        <input type="text" id="title" class="form-control" name="title" value="<?= isset($this->session->title) ? $this->session->title : ''; ?>" placeholder="Enter the title" required>
        <label for="content">Content :</label>
        <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Enter the content" required><?= isset($this->session->content) ? $this->session->content : ''; ?></textarea>
        <label for="category">Category :</label>
        <select class="form-control" name="category_id" id="category">
            <?php if(!empty($categories)) : ?>
                <?php if( is_array($categories[0]) ): ?>
                    <?php foreach($categories as $category) : ?>
                        <option <?php //($this->session->category_id === $category['id']) ? 'selected' : ''; ?> value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <option <?php //($this->session->category_id === $categories['id']) ? 'selected' : ''; ?> value="<?= $categories['id']; ?>"><?= $categories['name']; ?></option>
                <?php endif; ?>
            <?php else : ?>
                <?php $this->redirectTo('categories/add'); ?>
            <?php endif; ?>
        </select>
        <button class="btn btn-primary" name="save"><i class="fa fa-plus"></i> Add</button>
    </form>
</div>
<!-- End container -->

<!-- Javascript files -->
<script src="<?= BASE_URL ?>js/jquery-v2.1.4.min.js"></script>
<script src="<?= BASE_URL ?>js/modernizr-2.6.2.min.js"></script>
<script src="<?= BASE_URL ?>js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>js/script.js"></script>
</body>
</html>
