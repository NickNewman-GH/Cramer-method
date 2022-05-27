<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
  <form class="p-3 bg-light border fs-5" method="post" action="input_coefficients.php">
  <div >Input number of unknowns:</div>  
  <label class="mt-3" for="number">Number of unknowns</label>
    <input style="font-size:16px; width: 75px;" required type="number" name="number" id="number" min="1" max="10">
    <br>
    <button class="mt-3 me-2 btn btn-outline-primary" type="submit" name="input_unknowns">Confirm</button>
    <a class="mt-3 me-2 btn btn-outline-danger" href="logout_user.php">Exit</a>
  </form>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</body>
</html>