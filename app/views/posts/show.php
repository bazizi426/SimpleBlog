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
