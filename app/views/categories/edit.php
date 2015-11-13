<?php require APP_PATH . "/tpls/header.php"; ?>
<!-- Start container -->
<div class="container">
    <h1>Edit category</h1>

    <!-- Start the form -->
    <form action="<?= $this->url('categories/update'); ?>" method="POST" enctype="application/x-www-form-urlencoded" class="form-group">
        <input type="hidden" value="<?= $this->category['id']; ?>" name="id">
        <label for="name">Name :</label>
        <input type="text" id="name" class="form-control" name="name" value="<?= $this->category['name']; ?>" placeholder="Enter the name">
        <button class="btn btn-primary" name="edit"><i class="fa fa-edit"></i> Update</button>
    </form>
    <!-- End the form -->

</div>
<!-- End container -->
<?php require APP_PATH . "/tpls/footer.php"; ?>