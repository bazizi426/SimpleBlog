<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <!-- Style sheet files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css">

</head>
<body>
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
