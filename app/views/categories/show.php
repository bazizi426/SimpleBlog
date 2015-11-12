<?php require APP_PATH . "/tpls/header.php"; ?>
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
