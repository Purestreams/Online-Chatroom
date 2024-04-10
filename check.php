<?php
    //ignore the warning and do not show it
    error_reporting(E_ERROR | E_PARSE);

    //if the request with no value, jump to login page
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        header("location: login.php");
        exit;
    }
    //Connect to docker database
    define("DB_HOST", "mydb");
    define("USERNAME", "dummy");
    define("PASSWORD", "c3322b");
    define("DB_NAME", "db3322");
    $conn=mysqli_connect(DB_HOST, USERNAME, PASSWORD, DB_NAME);
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    //$conn = $db;
    // if the request is POST and logout is true, then logout
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['logout'])) {
        session_start();
        $_SESSION = array();
        session_destroy();
    }



    // if password_confirm is not empty, then it is a register request
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['password_confirm'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        //check if the email is already registered
        $sql = "SELECT * FROM account WHERE useremail='$email'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            echo "Email is already registered";
        }


        if ($password != $password_confirm) {
            echo "Password and Confirm Password do not match";
        } else {
            $sql = "INSERT INTO account (useremail, password) VALUES ('$email', '$password')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                //wait for 3 seconds and then redirect to login page
                header("refresh:3;url=login.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } else {
        $email = $_POST['email'];
        //if the email is not ended with connect.hku.hk, then reject
        if (substr($email, -13) != "connect.hku.hk") {
            echo "Only connect.hku.hk email is allowed";
            //wait for 3 seconds and then redirect to login page
            header("refresh:3;url=login.php");
            return;
        }
        $password = $_POST['password'];

        $sql = "SELECT * FROM account WHERE useremail='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            //echo "Login successful";
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $row['id'];
            $_SESSION["email"] = $email;
            header("location: chat.php");

        } elseif ($count == 0) {
            echo "Cannot find the account";
            //wait for 3 seconds and then redirect to login page
            header("refresh:3;url=login.php");
        } else {
            echo "Your Password is invalid";
            //wait for 3 seconds and then redirect to login page
            header("refresh:3;url=login.php");
        }
    }

?>