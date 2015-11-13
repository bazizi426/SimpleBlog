<?php require APP_PATH . "/tpls/header.php"; ?>
<!-- Start container -->
<div class="container">
    <h1>Register form:</h1>

    <form class="form-group" action="receive" method="POST" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="token" value="<?= App\Lib\Token::generateToken(); ?>">

        <label for="name">Name :</label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name :" required value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>">

        <label for="email">Email :</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email :" required value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">

        <label for="password">Password :</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password :" required>

        <label for="cpassword">Confirm Password :</label>
        <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="Enter your password again:" required>

        <input type="submit" class="btn btn-primary" name="submit" value="Register">
    </form>
</div>
<!-- End container -->
<?php require APP_PATH . "/tpls/footer.php"; ?>