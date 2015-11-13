<?php require APP_PATH . "/tpls/header.php"; ?>
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