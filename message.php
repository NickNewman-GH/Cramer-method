<?php
    session_start();
    if (isset($_SESSION['message'])){
        echo "<p class='text-success'>".$_SESSION['message']."</p>";
    }
    unset($_SESSION['message']);
?>