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
