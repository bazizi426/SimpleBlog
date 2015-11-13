<?php require APP_PATH . "/tpls/header.php"; ?>
<!-- Start container -->
<div class="container">
    <h1>Login :</h1>

    <form class="form-group" action="<?= $this->url('users/login_check'); ?>" method="POST" enctype="application/x-www-form-urlencoded">
        <label for="email">Email :</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email :" required>
        <label for="password">Password :</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password :" required>

        <button class="btn btn-primary" name="submit">Login</button>
    </form>
</div>
<!-- End container -->
<?php require APP_PATH . "/tpls/footer.php"; ?>