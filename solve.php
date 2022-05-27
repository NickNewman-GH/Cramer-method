<?php 
  session_start();
  
  function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }
  
  function get_coefficients_matrix($length){
    $coefficients = array();
    for ($i = 1; $i <= $length; $i++){
        array_push($coefficients, array());
        for ($j = 1; $j <= $length; $j++){
            array_push($coefficients[$i - 1], intval($_POST['x'.($j + ($i - 1) * $length)]));
        }
    }
    return $coefficients;
  }

  function get_answers_array($length){
    $answers = array();
    for ($i = 1; $i <= $length; $i++){
        array_push($answers, intval($_POST['y'.$i]));
    }
    return $answers;
  }

  function create_submatrix($matrix, $length, $i){
    $submatrix = array();
    $skip_counter = 0;
    for ($j = 0; $j < $length; $j++){
        if ($i == $j){
            $skip_counter += 1;
        } else{
            array_push($submatrix, array());
            for ($k = 1; $k < $length; $k++) {
                array_push($submatrix[$j - $skip_counter], $matrix[$j][$k]);
            }
        }
    }
    return $submatrix;
  }

  function calculate_the_determinant($matrix, $length){
      $result = 0;
      if ($length == 1){
            return $matrix[0][0];
      } else if ($length == 2) {
            return (($matrix[0][0] * $matrix[1][1]) - ($matrix[1][0] * $matrix[0][1]));
      } else {
            $sign = 1;
            for ($i = 0; $i < $length; $i++){
                $submatrix = create_submatrix($matrix, $length, $i);
                $result += $sign * $matrix[$i][0] * calculate_the_determinant($submatrix, $length - 1);
                $sign *= -1;
            }
      }
      return $result;
  }

  function fill_submatrix($coefficients, $answers, $length, $i){
    $submatrix = array();
    for ($j = 0; $j < $length; $j++) {
        array_push($submatrix, array());
        for ($k = 0; $k < $length; $k++) {
            if ($k == $i){
                array_push($submatrix[$j], $answers[$j]);
            }
            else{
                array_push($submatrix[$j], $coefficients[$j][$k]);
            }
        }
    }
    return $submatrix;
  }

  function solve($length){
    $coefficients = get_coefficients_matrix($length);
    $answers = get_answers_array($length);
    $main_determinant = calculate_the_determinant($coefficients, $_SESSION['number']);
    if ($main_determinant == 0){
        return "The system of equations can't be solved";
    }
    $unknowns = array();
    for ($i = 0; $i < $length; $i++) {
        $submatrix = fill_submatrix($coefficients, $answers, $length, $i);
        $determinant_for_unknown = calculate_the_determinant($submatrix, $length);
        array_push($unknowns, $determinant_for_unknown / $main_determinant);
    }
    return $unknowns;
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
<?php
$answer = solve($_SESSION['number']);
?>
<div class="p-3 bg-light border fs-5">
<? if (is_string($answer)) : ?>
    <p><?=$answer?></p>
<? else : ?>
    <p class="fw-semibold">Answer is:</p>
        <?php for ($i = 0; $i < count($answer); $i++) : ?>
            <p>X<sub><?=$i+1?></sub> = <?=$answer[$i]?>;</p>
        <?php endfor ?>
<?php endif ?>
<a class="me-2 btn btn-outline-primary" href="input_coefficients.php">Continue</a>
<a class="btn btn-outline-danger" href="logout_user.php">Exit</a>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</body>
</html>