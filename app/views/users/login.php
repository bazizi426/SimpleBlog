<?php require APP_PATH . "/tpls/header.php"; ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script>
    try{Modernizr} catch(e) {document.write('<script src="<?= BASE_URL ?>css/modernizr-2.6.2.min.js"><\/script>')}
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>js/script.js"></script>
</body>
</html>
