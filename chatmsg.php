<?php
    //check session
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        //reject and return 401
        http_response_code(401);
        exit;
    }
    //ignore the warning 
    //error_reporting(E_ERROR | E_PARSE);
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


    //use the table name message with msgid, time, message, and person
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $sql = "SELECT * FROM message";
        $result = mysqli_query($conn, $sql);
        $messages = array();
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $message = array();
            $message['msgid'] = $row['msgid'];
            $message['time'] = $row['time'];
            $message['message'] = $row['message'];
            $message['person'] = $row['person'];
            array_push($messages, $message);
        }
        echo json_encode($messages);
    }

    //post the message to the database
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $message = $_POST['message'];
        if (empty($message)) {
            return;
        }
        session_start();
        $person = $_SESSION["email"];
        $time = time();
        $sql = "INSERT INTO message (time, message, person) VALUES ('$time', '$message', '$person')";
        if (mysqli_query($conn, $sql)) {
            return;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>