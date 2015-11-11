<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Page Not found 404</title>
	<!-- Style sheet files -->
	<link rel="stylesheet" href="<?= BASE_URL ?>css/normalize.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">

</head>
<body>
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
				<li class="active"><a href="<?= $this->url('posts/index'); ?>"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="<?= $this->url('posts/index'); ?>">Category1</a></li>
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

<!-- Javascript files -->
<script src="<?= BASE_URL ?>js/jquery-v2.1.4.min.js"></script>
<script src="<?= BASE_URL ?>js/modernizr-2.6.2.min.js"></script>
<script src="<?= BASE_URL ?>js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>js/script.js"></script>
</body>
</html>
