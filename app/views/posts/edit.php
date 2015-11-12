<?php require APP_PATH . "/tpls/header.php"; ?>
<!-- Start container -->
<div class="container">
    <h1>Edit post</h1>

    <!-- Start the form -->
    <form action="<?= $this->url('posts/update'); ?>" method="POST" enctype="application/x-www-form-urlencoded" class="form-group">
        <input type="hidden" value="<?= $this->post['id']; ?>" name="id">
        <label for="title">Title :</label>
        <input type="text" id="title" class="form-control" name="title" value="<?= $this->post['title']; ?>" placeholder="Enter the title">
        <label for="content">Content :</label>
        <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Enter the content"><?= $this->post['content']; ?></textarea>
        <label for="category">Category :</label>
        <select class="form-control" name="category" id="category">
            <?php if(!empty($this->categories)) : ?>
                <?php $f = $this->categories; ?>
                <?php if( is_array($this->categories[0]) ): ?>
                    <?php foreach($this->categories as $category) : ?>
                        <option <?= ($this->category['id'] == $category['id']) ? 'selected' : '' ?> value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <option <?= ($this->category['id'] == $this->categories['id']) ? 'selected' : '' ?> value="<?= $this->categories['id']; ?>"><?= $this->categories['name']; ?></option>
                <?php endif; ?>
            <?php else : ?>
                <?php $this->redirectTo('categories/add'); ?>
            <?php endif; ?>
        </select>
        <button class="btn btn-primary" name="edit"><i class="fa fa-edit"></i> Update</button>
    </form>
    <!-- End the form -->

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
