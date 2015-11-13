<?php require APP_PATH . "/tpls/header.php"; ?>
<!-- Start container -->
<div class="container">
    <p class="alert alert-info">
        Login to manage the posts <a href="<?= $this->url('users/login'); ?>"></a>
    </p>
    <div class="panel panel-info">
        <div class="panel-heading text-center">
            <h1><?= $this->post['title'] ?></h1>
        </div>
        <div class="panel-body">
            <p class="lead"><?= $this->post['content']; ?></p>
            <a href="<?= $this->url('posts') ?>" class="btn btn-info pull-right">
                <i class="fa fa-arrow-circle-left"></i> All posts
            </a>
        </div>
        <div class="panel-footer text-center">
            <p class="help-block"><i class="fa fa-map-signs"></i> This post is in <a href="<?= $this->url( 'categories/show/' . $this->category['id'] ); ?>"><?= $this->category['name']; ?></a> Category.
            </p>
        </div>
    </div>
</div>
<!-- End container -->
<?php require APP_PATH . "/tpls/footer.php"; ?>