<?php include('register_user.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form class="p-3 bg-light border fs-5" method="post" action="register.php">
        <?php include('errors.php')?>
  	    <label for="username">Username:</label>
  		<input style="font-size:16px;" required type="text" name="username" id="username">
  	    <br>
        <label class="mt-3" for="password">Password:</label>
  		<input style="font-size:16px;" required type="password" name="password" id="password">
        <br>
        <label class="mt-3" for="confirm_password">Confirm password:</label>
  		<input style="font-size:16px;" required type="password" name="confirm_password" id="confirm_password">
        <br>
  		<button class="mt-3 me-2 fs-5 btn btn-outline-primary" type="submit" name="register_user">Register</button>

  	    <p class="m-0 mt-3">Already a member? <a href="login.php">Sign in</a></p>
    </form>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</body>
</html>