<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }
  if (!(isset($_POST["input_unknowns"]) || isset($_SESSION['number']))){
    header('location: input_number_of_unknowns.php');
  }
  if (isset($_POST["number"])) {
    $_SESSION['number'] = $_POST["number"];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('generate_form.php')?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</body>
</html>