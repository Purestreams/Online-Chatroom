

//get the message from the mysql database
get_messages = function(callback) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "chatmsg.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            callback(xhr.responseText);
        }
    };
    xhr.send();
}

load_messages = function() {
    document.getElementById("message_box").innerHTML = "";
    var user = document.getElementById("userid").innerHTML;
    //break the user from email to only the name
    user = user.split("@")[0];
    user = user.split(" ")[1];
    //console.log(user);
    //console.log('js ready');
    get_messages(function(messages) {
        var list_of_messages = JSON.parse(messages);
        //console.log(list_of_messages);
        //console.log(list_of_messages.length);
        for (var i=0; i<list_of_messages.length; i++) {
            //msgid, time, message, and person
            var msgid = list_of_messages[i].msgid;
            var time = list_of_messages[i].time;

            //if the time is a hour behind, quit the loop
            if (time < (Math.floor(Date.now() / 1000) - 3600)) {
                continue;
            }

            var message = list_of_messages[i].message;
            var person = list_of_messages[i].person;
            //console.log(msgid, time, message, person);
            person = person.split("@")[0];
            //convert the linux timestamp to a human readable format
            var date = new Date(time * 1000);
            var hours = date.getHours();
            var minutes = "0" + date.getMinutes();
            var seconds = "0" + date.getSeconds();
            var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
            //console.log(formattedTime);
            //create the message block
            if (person == user) {
                document.getElementById("message_box").innerHTML += `
            <div id="message_me">
                <div id="message_name">${person}</div>
                <div id="message_time">${formattedTime}</div>
                <p id="message_text">${message}</p>
            </div>
                `
            }else{
                document.getElementById("message_box").innerHTML += `
            <div id="message">
            <div id="message_name">${person}</div>
            <div id="message_time">${formattedTime}</div>
            <p id="message_text">${message}</p>
            </div>
                `
            }
        }
    });
    //wait 100ms and then scroll to the bottom
    setTimeout(function() {
        updateScroll();
    }, 100);
}

send = function() {
    var message_send = document.getElementById("message_input").value;
    console.log(message_send);
    if (message_send == "") {
        document.getElementById("message_input").setAttribute("placeholder", "Please enter a message");
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "chatmsg.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("message=" + message_send + "&person=" + document.getElementById("userid").innerHTML);
    document.getElementById("message_input").value = "";
    //refresh the page
    //wait 1 second before refreshing
    setTimeout(function() {
        load_messages();
    }, 1000);
    load_messages();
    //wait 100ms and then scroll to the bottom
    setTimeout(function() {
        updateScroll();
    }, 100);
}

function updateScroll(){
    var element = document.getElementById("message_box");
    element.scrollTop = element.scrollHeight;
}

logout = function() {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "check.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("logout=true");
    //refresh the page
    window.location.href = "login.php";
}

window.onload = function() {
    console.log('js ready');
    load_messages();
    setInterval(load_messages, 10000);
}
