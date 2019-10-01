
<?php

function logIn() {
    $con = mysqli_connect("localhost", "root", "", "rogalit");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "SELECT * FROM clients WHERE username='" . $_REQUEST['username'] . "'";
    $row = mysqli_fetch_array(mysqli_query($con, $sql));

    function takeBirthDay($fullDate) {
        $birthdate = substr($fullDate, 0, 5);
        return $birthdate;
    }

    mysqli_close($con);
    if ($_REQUEST['password'] === $row['password']) {
        $_SESSION['timeout'] = time();
        $_SESSION['registered'] = "yes";
        $_SESSION['firstName'] = $row['fname'];
        $_SESSION['lastName'] = $row['lname'];
        $_SESSION['priority'] = 'no';
        $_SESSION['birthday'] = $row['birthdate'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['loginTime'] = time();
        echo "<script>window.location.reload();</script>";
    } else {
        return false;
    }
}

#time to leave set to 60 seconds
$TTL = 3600;
#check if TTL hasn't passed
if (isset($_REQUEST['signout']) || (isset($_SESSION['registered']) && time() - $_SESSION['timeout'] > $TTL)) {
    #session_unset();
    session_destroy();
    echo "<script>window.location.reload();</script>";
}
if (!isset($_SESSION['registered'])) {//anonymous session
    echo ' <div id="side-stuff">'
    . '<div class="active-links">'
    . '<a id = "signin-link" href = "#">'
    . '<div id = "session">'
    . '<span id = "enter_pos">'
    . ' היכנס לחשבון'
    . '</span>'
    . '</div>'
    . '</a>'
    . '<div id = "signin-dropdown">'
    . '<form class = "signin" method="post"'
    . 'action ="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">'
    . '<fieldset class = "textbox">'
    . '<label for = "username" class = "username">'
    . '<input id = "username" name = "username" placeholder = "שם משתמש" type = "text" autocomplete = "on">'
    . '</label>'
    . '<label for = "password">'
    . '<input id = "password" name = "password" placeholder = "סיסמא" type = "password">'
    . '</label>'
    . '</fieldset>'
    . '<fieldset class = "connect">'
    . '<button class = "button" type = "submit">התחבר</button>'
    . '<button class = "button left_button" onclick = "window.location.href = "newUser.php"" type = "button">הירשם</button>'
    . '</fieldset>'
    . '</form>'
    . '</div>'
    . '</div>'
    . '</div>';
    if (isset($_REQUEST['username'])) {
        if (!logIn()) {
            echo "<script>alert('פרטי המשתמש אינם נכונים ביייייי');</script>";
        }
    }
} else {
    echo 'kukurikufjjgkkgjddgjyg'.'<div class="welcomeUser"> שלום ' . $_SESSION['username']
    . '<a href="logout.php">התנתק</a></div>';
}

//. $_SESSION['username']

