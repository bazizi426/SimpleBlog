<?php require APP_PATH . "/tpls/header.php"; ?>
<!-- Start container -->
<div class="container">
    <h1>Add category</h1>
    <?php
    $categories = \App\Lib\Model::getAllFrom('categories');
    ?>
    <form action="<?= $this->url('categories/save'); ?>" method="POST" enctype="application/x-www-form-urlencoded" class="form-group">
        <label for="name">Name :</label>
        <input type="text" id="name" class="form-control" name="name" value="<?= isset($this->session->name) ? $this->session->title : ''; ?>" placeholder="Enter the title" required>
        <button class="btn btn-primary" name="save"><i class="fa fa-plus"></i> Add</button>
    </form>
</div>
<!-- End container -->
<?php require APP_PATH . "/tpls/footer.php"; ?>