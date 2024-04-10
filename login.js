window.onload = function() {
    console.log('js ready');
};

register_page = function() {
    console.log('register_page');
    document.getElementById("head").innerHTML = ` <h2 id="head_text">Register</h2> `;
    document.getElementById("login_block").innerHTML = "";
    document.getElementById("login_block").innerHTML = `

    <center>
    <form name="registerForm" action="check.php" method="POST" onsubmit="return validateform()">
        <label for="email" style="display: inline-block; width: 100px;">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password" style="display: inline-block; width: 100px;">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <label for="password confirm" style="display: inline-block; width: 100px;">Confirm:</label>
        <input type="password" id="password_confirm" name="password_confirm" required><br><br>
        <input type="submit" value="Register">
    </form>
    </center>

    `;

    document.getElementById("register_block").innerHTML = `
    <p> Click <a href="login.php">here</a> to login </p>
    `;
};

validateform = function() {
    var x = document.forms["registerForm"]["password"].value;
    var y = document.forms["registerForm"]["password_confirm"].value;
    if (x != y) {
        alert("Passwords do not match");
        return false;
    }
    var email = document.forms["registerForm"]["email"].value;
    //check whether the email is ended with connect.hku.hk
    if (email.endsWith("connect.hku.hk") == false) {
        document.getElementById("error").innerHTML = "Please use your HKU email";
    }
};

loginvalidate = function() {
    var email = document.forms["loginForm"]["email"].value;
    //check whether the email is ended with connect.hku.hk
    if (email.endsWith("connect.hku.hk") == false) {
        document.getElementById("error").innerHTML = "Please use your HKU email";
    }
    //stop the form from submitting
    return false;
}