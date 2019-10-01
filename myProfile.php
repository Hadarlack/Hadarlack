<!DOCTYPE html>
<?php session_start(); ?>
<!--דף פרטים אישיים של המשתמש-->
<html lang="he">
    <head>
        <?php
        #allowing Hebrew
        header("Content-type: text/html; charset=utf-8");
        $con = mysqli_connect("localhost", "root", "", "rogalit");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        ?>
        <title>יקב רוגלית</title>
        <meta charset= "utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="top icon" type="JPEG image (.jpg)" href="media/top2.jpg" />
        <link href="Css/w3.php" rel="stylesheet" type="text/css"/>
        <link href="Css/style.php" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script src="js/javaFunctions.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#myProfile").addClass("highlite");
            });
        </script>
    </head>
    <body  dir="rtl">
        <?php require('menu.php'); ?>
        <?php require ('login.php'); ?>
        <?php $_SESSION['timeout'] = time(); ?>
        <div class="myProfileContainer">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<h2>שלום ' . $_SESSION['username'] . '</h2>';

                $passChange = false;
                $viewOrders = false;
                if (count($_POST) != 0) {
                    if (isset($_POST['changePassword'])) {
                        $passChange = true;
                        echo '<form class="w3-container" name="formNewUser"  method="post" action="' . $_SERVER["PHP_SELF"] . '">'
                        . '<table>'
                        . '<tr>'
                        . '<td>'
                        . '<label for="password">סיסמא ישנה: </label>'
                        . '<br>'
                        . '<input id="password" type="password" name="oldPassword" required>'
                        . '</td>'
                        . '</tr>'
                        . '<tr>'
                        . '<td>'
                        . '<label for="password">הכנס סיסמא חדשה: </label>'
                        . '<br>'
                        . '<input id="password" type="password" name="newPassword" minlength="6" required>'
                        . '</td>'
                        . '</tr>'
                        . '<tr>'
                        . '<td>'
                        . '<label for="password">הכנס סיסמא חדשה שנית: </label>'
                        . '<br>'
                        . '<input id="password" type="password" name="newPasswordAgain" minlength="6" required>'
                        . '</td>'
                        . '</tr>'
                        . '</table>'
                        . '<input class ="submit" name="confirmPassChange" type="submit"  value="אישור">'
                        . '</form>';
                    }
                    if (isset($_POST['viewOrders'])) {
                        mysqli_set_charset($con, "utf8");
                        $viewOrders = true;
                        $today = substr(date("Y-m-d"), 0, 10);
                        $usersorderssql = "SELECT DISTINCT orderID, orderDate, totalPrice FROM orders as O JOIN clients as C "
                                . "WHERE O.userID = (SELECT ID FROM clients WHERE username = '" . $_SESSION['username']
                                . "' AND O.orderDate > '" . $today . "') ORDER BY orderID";
                        $usersorders = mysqli_query($con, $usersorderssql);
                        $row = mysqli_fetch_array($usersorders);
                        if ($row != null) {
                            echo '<form method="get" action="' . $_SERVER["PHP_SELF"] . '">'
                            . '<table>';
                            echo '<tr>'
                            . '<td>'
                            . $row[0]
                            . '</td>'
                            . '<td>'
                            . $row[1]
                            . '</td>'
                            . '<td>'
                            . $row[2]
                            . '</td>'
                            . '<td>'
                            . '<input type="submit" id="' . $row[0] . '" onclick="changeValue(' . $row[0] . ')" class="submit" value="הסר" name="O">'
                            . '</td>'
                            . '</tr>';

                            while ($row = mysqli_fetch_array($usersorders)) {
                                echo '<tr>'
                                . '<td>'
                                . $row[0]
                                . '</td>'
                                . '<td>'
                                . $row[1]
                                . '</td>'
                                . '<td>'
                                . $row[2]
                                . '</td>'
                                . '<td>'
                                . '<input type="submit" id="' . $row[0] . '" onclick="changeValue(' . $row[0] . ')" class="submit" value="הסר" name="O">'
                                . '</td>'
                                . '</tr>';
                            }
                            echo '</table>'
                            . '</form>';
                        } else {
                            echo '<h5>אין לך הזמנות פעילות</h5>';
                            echo '<p>הנך מעובר לדף הקודם באופן אוטומטי, אנא המתן.</p>';
                            echo '<img src="media/Loading.gif" alt="loading...">';
                            echo '<script type="text/javascript">'
                            . 'setTimeout(Redirect, 4000);'
                            . 'function Redirect() {'
                            . 'window.location="myProfile.php";}'
                            . '</script>';
                        }
                    }
                }
                if (!$passChange && !$viewOrders) {
                    echo '<form class="w3-container" name="formNewUser"  method="post" action="' . $_SERVER["PHP_SELF"] . '">'
                    . '<input class ="submit" type="submit" value="שנה סיסמא" name="changePassword">'
                    . '<br>'
                    . '<input class = "submit" type = "submit" value = "צפה בהזמנות" name = "viewOrders">'
                    . '</form>';
                }
            }
            ?>

        </div>
        <?php
        if (isset($_POST['confirmPassChange'])) {
            mysqli_set_charset($con, "utf8");
            $password = $_REQUEST['oldPassword'];
            $newPass = $_REQUEST['newPassword'];
            $newPassAgain = $_REQUEST['newPasswordAgain'];
            //מכניסים לתוך משתנה את התוצאה של פונקציית סלקט ואז מפעילים אותה עלידי פקודת מייאסקיולי
            $checkUser = "SELECT password FROM clients WHERE username='" . $_SESSION['username'] . "'";
            $userOldPass = mysqli_fetch_array(mysqli_query($con, $checkUser));
            if ($password === $userOldPass['password']) {
                if ($newPass === $newPassAgain) {
                    $updatesql = 'UPDATE clients SET password = ' . "$newPass"
                            . ' WHERE username = "' . $_SESSION['username'] . '"';
                    if (!mysqli_query($con, $updatesql)) {
                        die('Error: ' . mysqli_error($con));
                        echo '<script>alert(' . "'נמצאה בעייה'" . ')</script>';
                    }
                    echo '<script>alert(' . "'החלפת הסיסמאות בוצעה בהצלחה.'" . ')</script>';
                    mysqli_close($con);
                } else {
                    echo '<script>alert(' . "'הסיסמאות אינן תואמות, אנא הזן בשנית.'" . ')</script>';
                }
            } else {
                echo '<script>alert(' . "'הסיסמא הישנה אינה נכונה, אנא נסה שנית.'" . ')</script>';
            }
        }
        if (isset($_GET['O'])) {
            mysqli_set_charset($con, "utf8");
            $id = $_GET['O'];
            $deletePIO = "DELETE FROM productsinorder WHERE orderID = " . $id;
            $resultPIO = mysqli_query($con, $deletePIO);
            $deleteO = "DELETE FROM orders WHERE orderID = " . $id;
            if (!mysqli_query($con, $deleteO)) {
                die('Error: ' . mysqli_error($con));
                echo '<script>alert(' . "'נמצאה בעייה'" . ')</script>';
            } else {
                echo '<script>alert(' . "'מחיקת ההזמנה בוצעה בהצלחה'" . ')</script>';
            }
            echo '<script type="text/javascript">'
            . 'setTimeout(Redirect, 500);'
            . 'function Redirect() {'
            . 'window.location="myProfile.php";}'
            . '</script>';
            mysqli_close($con);
        }
        ?>

        <div class="footer">
            <strong> &COPY;</strong>
            רזולוציה מומלצת: 768*1366
        </div>
    </body>
</html>