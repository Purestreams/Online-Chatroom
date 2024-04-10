<?php
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: chat.php");
        exit;
    }   

?>



<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
    <script src="login.js"></script>
    <title>Chatroom</title>
</head>

<body>

<h1>A Simple Chatroom Service</h1>
<div id="head"> <h2 id="head_text">Login</h2> </div>
<div id="login_block">
    <center>
    <form action="check.php" method="POST" onsubmit="return loginvalidate()">
        <label for="email" style="display: inline-block; width: 100px;">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password" style="display: inline-block; width: 100px;">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    </center>
</div>
<div id="register_block">

    <p> Click <button type="button" id="button_reg" onclick="register_page()">here</button> to register</p>

</div>
<p id="error"></p>

</body>

</html>