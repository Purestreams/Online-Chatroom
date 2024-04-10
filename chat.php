<?php
    //ignore the warning and do not show it
    error_reporting(E_ERROR | E_PARSE);
    //get my login information
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    $email = $_SESSION["email"];
    //set session timeout for 120 seconds
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 120)) {
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        header("location: login.php");
        exit;
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9" user-scalable=no>
    <link rel="stylesheet" type="text/css" href="chat.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
    <script src="chat.js"></script>
    <title>Chatroom</title>
</head>


<h1>A Simple Chatroom Service</h1>

<div id="chat_window">
    <div id="userid" hidden>Welcome <?php echo $email; ?></div>
    <button type="button" id="logout" onclick="logout()">Logout</button>
    <div id="message_box" style="height: 80%">

            <div id="message">
                <div id="message_name">test1</div>
                <div id="message_time">11:11:11</div>
                <p id="message_text">posuere. Vestibulum nec risus eu lacus semper viverra.</p>
            </div>

            <div id="message">
                <div id="message_name">test2</div>
                <div id="message_time">11:11:11</div>
                <p id="message_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in ligula id sem tristique ultrices eget id neque. Duis enim turpis, tempus at accumsan vitae, lobortis id sapien. Pellentesque nec orci mi, in pharetra ligula. Nulla facilisi. Nulla facilisi.</p>
            </div>


            <div id="message">
                <div id="message_name">test3</div>
                <div id="message_time">11:11:11</div>
                <p id="message_text">Mauris convallis venenatis massa, quis consectetur felis ornare quis. Sed aliquet nunc ac ante molestie ultricies. Nam pulvinar ultricies bibendum. Vivamus diam leo, faucibus et vehicula eu, molestie sit amet dui. Proin nec orci et elit semper ultrices.</p>
            </div>

            <div id="message">
                <div id="message_name">test3</div>
                <div id="message_time">11:11:11</div>
                <p id="message_text">Mauris convallis venenatis massa, quis consectetur felis ornare quis. Sed aliquet nunc ac ante molestie ultricies. Nam pulvinar ultricies bibendum. Vivamus diam leo, faucibus et vehicula eu, molestie sit amet dui. Proin nec orci et elit semper ultrices.</p>
            </div>
            
            <div id="message_me">
                <div id="message_name">test4</div>
                <div id="message_time">11:11:11</div>
                <p id="message_text">Mauris convallis venenatis massa, quis consectetur felis ornare quis. Sed aliquet nunc ac ante molestie ultricies. Nam pulvinar ultricies bibendum. Vivamus diam leo, faucibus et vehicula eu, molestie sit amet dui. Proin nec orci et elit semper ultrices.</p>
            </div>

            <div id="message_me">
                <div id="message_name">test4</div>
                <div id="message_time">11:11:11</div>
                <p id="message_text">abc123</p>
            </div>
    </div>

    <div id="input_block">
        <center>
        <div>
            <input type="text" id="message_input" name="message" required pattern="\S(.*\S)?">
            <button type="button" id="send" onclick="send()">Send</button>
        </div>
        </center>
    </div>
</div>
