<!DOCTYPE html>
<?php session_start(); ?>
<!--דף הרשמת משתמש חדש-->
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
        <title>שוקה פרדסים</title>
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
                $("#newUser").addClass("highlite");
            });
        </script>
    </head>	
	<body  dir="rtl">
        <?php require('menu.php'); ?>

        <div class="signInNewUser" id="signInNewUser" >
            <h2>הצטרפו לחברי היקב ותהנו ממבצעים והנחות</h2>
            <form class="w3-container newUserForm_pos" name="formNewUser"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <table>
                    <tr>
                        <td class="leftCell">
                            <label for="username">שם משתמש: </label>
                            <input id="userName" type="text" name="username" minlength="6" required>
                        </td>
                        <td>
                            <label for="password">סיסמא: </label>
                            <input id="password" type="password" name="password" minlength="6" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="leftCell">
                            <label for="ID">תעודת זהות: </label>
                            <input id="ID" type="text" name="ID" maxlength="9" pattern="\d{9}" title="נדרשים תוים של ספרות בלבד באורך 9" required>
                        </td>
                        <td>
                            <label for="first_mail">מייל: </label>
                            <input id="first_mail" type="email" name="mail" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="leftCell">
                            <label for="First_Name">שם פרטי: </label>
                            <input id="First_Name" type="text" name="fname" required>
                        </td>
                        <td>
                            <label for="last_Name">שם משפחה: </label>
                            <input id="last_Name" type="text" name="lname" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="leftCell">
                            <label for="AddressCity">עיר: </label>
                            <input id="AddressCity" type="text" name="city" required>
                        </td>
                        <td>
                            <label for="AddressStreet">רחוב: </label>
                            <input id="AddressStreet" type="text" name="nameStreet" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="leftCell">
                            <label for="dateofBirth">תאריך לידה: </label>
                            <input id="dateofBirth" type="date" name="bdate" min="1950-01-01" max="1998-12-31" required>
                        </td>
                        <td>
                            <label for="phoneNumber">מספר טלפון: </label>
                            <select name="phoneStart" required>
                                <option></option>
                                <option value="050" >050</option>
                                <option value="052" >052</option>
                                <option value="053" >053</option>
                                <option value="054" >054</option>
                                <option value="058" >058</option>
                                <option value="04" >04</option>
                                <option value="06" >06</option>
                                <option value="08" >08</option>
                                <option value="09" >09</option>
                            </select>
                            <input id="phoneNumber" type="text" name="phoneNumber" pattern="\d{7}" maxlength="7" title="על המספר להיות בעל 7 ספרות" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="advertasing">לקבלת תוכן פרסומי סמן תיבה זו</label>
                            <input class="checkAd" id="advertasing" name="advertasing" type="checkbox" checked>
                        </td>



                        <td>
                            <label for="Man">זכר</label> <input type="radio" name="gender" value="male" checked>
                        </td>   
                    </tr> 
                    <tr>
                        <td></td>
                        <td>
                            <label for="female">נקבה</label> <input type="radio" name="gender" value="female"> 
                        </td>
                    </tr>
                </table>
                <br><br>

                <input class ="submit" id="register" type="submit" value="להרשמה" onclick="return checkFildes()">
            </form>

        </div>

        <?php
        if (count($_POST) != 0) { //סופר אם אחד מהשדות שונה מאפס
            mysqli_set_charset($con, "utf8");
            $userName = htmlspecialchars($_REQUEST['username']);
            $password = $_REQUEST['password'];
            $id = filter_var($_REQUEST['ID'], FILTER_VALIDATE_INT);

            $email = filter_var($_REQUEST['mail'], FILTER_SANITIZE_EMAIL);
            $mail = filter_var($email, FILTER_VALIDATE_EMAIL);

            /* ראה ערכים תקינים של מיילים בדף וורד המצורף    */
            $fname = filter_var($_REQUEST['fname'], FILTER_SANITIZE_STRING);

            $lname = filter_var($_REQUEST['lname'], FILTER_SANITIZE_STRING);

            $citystr = filter_var($_REQUEST['city'], FILTER_SANITIZE_STRING);

            //   echo $citystr; //שורה שמוודא שיש פילטור על מחרוזת בלבד
            $streetstr = filter_var($_REQUEST['nameStreet'], FILTER_SANITIZE_STRING);

            // echo $streetstr; //שורה שמוודא שיש פילטור על מחרוזת בלבד
            $takedate = $_REQUEST['bdate'];
            $date = date("Y-m-d H:i:s", strtotime($takedate));
            $birthdate = substr($date, 0, 10);
            
            $phoneStart = $_REQUEST['phoneStart'];

            $phoneNumber = filter_var($_REQUEST['phoneNumber'], FILTER_VALIDATE_INT);

            $ad = 'off';
            if (isset($_REQUEST['advertasing'])) {
                $ad = 'on';
            }

            $gender = $_POST['gender'];

            //מכניסים לתוך משתנה את התוצאה של פונקציית סלקט ואז מפעילים אותה עלידי פקודת מייאסקיולי
            $checkUser = "SELECT * FROM clients WHERE username='" . $userName . "'";
            $checkMail = "SELECT * FROM clients WHERE mail='" . $mail . "'";
            $checkId = "SELECT * FROM clients WHERE id='" . $id . "'";
            $userRow = mysqli_fetch_array(mysqli_query($con, $checkUser));
            $mailRow = mysqli_fetch_array(mysqli_query($con, $checkMail));
            $idRow = mysqli_fetch_array(mysqli_query($con, $checkId));
            //כאן בודקים האם קיים כבר משתמש רשום עם אותו שם משתמש או עם אותה תעודת זהות או עם אותו מייל
            if (!($userName === $userRow['username'])) {
                if (!($mail === $mailRow['mail'])) {
                    if (!($id === $idRow['ID'])) {
                        $insertSql = "INSERT INTO clients (username, ID, fname, lname, mail, password, city, street, birthdate, phoneStart, phoneNumber, advertasing, gender) "
                                . "VALUES ('$userName', $id, '$fname', '$lname', '$mail', '$password', '$citystr', '$streetstr', '$birthdate', $phoneStart, $phoneNumber, '$ad', '$gender')";
                        if (!mysqli_query($con, $insertSql)) {
                            die('Error: ' . mysqli_error($con));
                            echo '<script>alert(' . "'הייתה בעיה'" . ')</script>';
                        } else {
                            echo '<script>alert(' . "'נרשמת בהצלחה'" . ')</script>';
                            $_SESSION['timeout'] = time();
                            $_SESSION['registered'] = "yes";
                            $_SESSION['priority'] = 'no';
                            $_SESSION['birthday'] = $birthdate;
                            $_SESSION['username'] = $userName;
                            $_SESSION['gender'] = $gender;
                            $_SESSION['loginTime'] = time();
                        }
                        mysqli_close($con);

                        //הדף עובר אחרי שנייה לדף אינדקס 
                        echo '<script type="text/javascript">'
                        . 'setTimeout(Redirect, 1000);'
                        . 'function Redirect() {'
                        . 'window.location="index.php";}'
                        . '</script>';
                    } else {
                        echo '<script>alert(' . "'תעודת הזהות כבר קיימת במערכת'" . ')</script>';
                    }
                } else {
                    echo '<script>alert(' . "'המייל כבר קיים במערכת'" . ')</script>';
                }
            } else {
                echo '<script>alert(' . "'שם המשתמש כבר קיים במערכת'" . ')</script>';
            }
        } else {
            return false;
        }
        ?>

        <div class="footer">
            <strong> &COPY;</strong>
            רזולוציה מומלצת: 768*1366
        </div>
    </body>
</html>