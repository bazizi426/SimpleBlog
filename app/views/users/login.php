<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <!-- Style sheet files -->
    <link rel="stylesheet" href="<?= BASE_URL ?>css/normalize.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">

</head>
<body>
<!-- Start container -->
<div class="container">
    <h1>Register form:</h1>

    <form class="form-group" action="/receive" method="POST" enctype="application/x-www-form-urlencoded">
        <label for="name">Name :</label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name :" required>
        <label for="email">Email :</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email :" required>
        <label for="password">Password :</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password :" required>
        <label for="cpassword">Confirm Password :</label>
        <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="Enter your password again:" required>

        <button class="btn btn-primary" name="submit">Register</button>
    </form>
</div>
<!-- End container -->

<!-- Javascript files -->
<script src="<?= BASE_URL ?>js/jquery-v2.1.4.min.js"></script>
<script src="<?= BASE_URL ?>js/modernizr-2.6.2.min.js"></script>
<script src="<?= BASE_URL ?>js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>js/script.js"></script>
</body>
</html>
