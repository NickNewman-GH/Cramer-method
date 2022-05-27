<?php
    if (isset($_POST['register_user'])){
        session_start();
        $errors = array();

        $db = mysqli_connect('localhost', 'root', '', 'website_db');
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password != $confirm_password) {
            array_push($errors, "The two passwords do not match");
        }

        $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);

        if (mysqli_num_rows($result) != 0){
            array_push($errors, "User is already exist");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "INSERT INTO users (username, password) VALUES('$username', '$password')";
            mysqli_query($db, $query);
            $_SESSION['message'] = "Registration was successful";
            header('location: login.php');
        }
    }
?>