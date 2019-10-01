<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <?php
        header("Content-type: text/html; charset=utf-8");

        $con = mysqli_connect("localhost", "root", "", "rogalit");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        ?>
        <title>אישור על ביצוע הזמנה</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="top icon" type="JPEG image (.jpg)" href="media/top2.jpg" />
        <link href="Css/w3.php" rel="stylesheet" type="text/css"/>
        <link href="Css/style.php" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script src="js/javaFunctions.js" type="text/javascript"></script>

    </head>
    <body dir = rtl>
        <?php require('menu.php'); ?>
        <?php require ('login.php'); ?>
        <?php $_SESSION['timeout'] = time(); ?>
        <div class="container">
            <div class="thankYouContainer">
                <?php
                if (isset($_SESSION['tourNumber'])) {
                    echo '<p>הזמנה מספר ' . $_SESSION['tourNumber'] . ' נקלטה במערכת</p>'
                    . '<p>פרטי הזמנתך ישלחו לכתובת המייל שהזנת בדקות הקרובות</p>'
                    . '<p>נשמח לעמוד לרשותך גם בעתיד</p>'
                    . '<br>'
                    . '<span class="move">'
                    . '<img src="media/wine_glasses.jpg" class = "move" alt="smile" >'
                    . '</span>';
                    echo '<p>הינך מועבר באופן אוטומטי לדף הבית.</p>';
                    echo '<img src="media/Loading.gif" alt="loading...">';
                    unset($_SESSION['tourNumber']);
                    echo '<script type="text/javascript">'
                    . 'setTimeout(Redirect, 6000);'
                    . 'function Redirect() {'
                    . 'window.location="index.php";}'
                    . '</script>';
                }
                if (isset($_SESSION['orderProduct'])) {
                    echo '<p>הזמנתך נקלטה במערכת, תודה רבה.</p>'
                    . '<p>פרטי הזמנתך ישלחו לכתובת המייל שהזנת בדקות הקרובות</p>'
                    . '<p>נשמח לעמוד לרשותך גם בעתיד</p>'
                    . '<br>'
                    . '<span class="move">'
                    . '<img src="media/wine_glasses.jpg" class = "move" alt="smile" >'
                    . '</span>';
                    echo '<p>הינך מועבר באופן אוטומטי לדף הבית.</p>';
                    echo '<img src="media/Loading.gif" alt="loading...">';
                    unset($_SESSION['orderProduct']);
                    echo '<script type="text/javascript">'
                    . 'setTimeout(Redirect, 6000);'
                    . 'function Redirect() {'
                    . 'window.location="index.php";}'
                    . '</script>';
                }
                ?>
            </div>
        </div>
    </body>
</html>
