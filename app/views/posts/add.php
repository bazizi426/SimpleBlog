<?php require APP_PATH . "/tpls/header.php"; ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script>
    try{Modernizr} catch(e) {document.write('<script src="<?= BASE_URL ?>css/modernizr-2.6.2.min.js"><\/script>')}
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>js/script.js"></script>
</body>
</html>
