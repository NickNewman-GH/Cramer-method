<?php
    if (isset($_POST['login_user'])){
        session_start();
        $errors = array();

        $db = mysqli_connect('localhost', 'root', '', 'website_db');
        
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 1){
            $_SESSION['username'] = $username;
            header('location: index.php');
        } else {
            array_push($errors, "Wrong username or password");
        }
    }
?>