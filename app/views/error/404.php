<?php require APP_PATH . "/tpls/header.php"; ?>

<!-- Start container -->
<div class="container">
	<div class="panel panel-danger">
		<div class="panel-heading text-center">
			<h1><i class="fa fa-remove"></i> Page Not Found 404</h1>
		</div>
		<div class="panel-body">
			<p class="lead text-center" style="min-height: 100px;">
				This page dosn't exists !!
			</p>
		</div>
		<div class="panel-footer text-center">
			<p class="help-block">
				<a href="<?= $this->url('posts/index'); ?>"><i class="fa fa-arrow-left"></i> Return to home page</a>
			</p>
		</div>
	</div>
</div>
<!-- End container -->
<?php require APP_PATH . "/tpls/footer.php"; ?>