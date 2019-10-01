<!DOCTYPE html>
<?php session_start() ?>
<html lang="he">
    <head>
        <title>צרו עימנו קשר</title>
        <?php header("Content-type: text/html; charset=utf-8"); ?>
        <meta charset="UTF-8">
		<link rel="top icon" type="JPEG image (.jpg)" href="media/top2.jpg" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Css/w3.php" rel="stylesheet" type="text/css"/>
        <link href="Css/style.php" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="js/javaFunctions.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#contact").addClass("highlite");
            });
        </script>
    </head>
    <body dir = "rtl">
        <?php require('menu.php'); ?>
        <?php require ('login.php'); ?>
        <?php $_SESSION['timeout'] = time(); ?>
        <div class = "contact_container">
            <h1 class = "make_contact">צור קשר</h1>
            <table>
                <tr>
                    <td class="contact_details">
                        <h3>נשמח לעמוד לרשותכם בכל עת</h3>
                        <p class="contact_address">כתובתנו:</p>
                        <p>מושב נווה מיכאל</p>
                        <p>עמק האלה</p>
                            <tr>
                                <td>
                                    <img src="media/phone.png" alt="טלפון" />
                                </td>
                                <td>
                                    <strong>טלפון:</strong> 0524207088
                                </td>
                            </tr>
                            <tr>
                                <td class= "fax_pic">
                                    <img src="media/fax.png" alt="פקס" />
                                </td>
                                <td class="fax_number">
                                    <strong>פקס: </strong> 08-9851213
                                </td>
                            </tr>
                            <tr>
                                <td class="mail_pic">
                                    <img src="media/mail.png" alt="דואר אלקטרוני" />
                                </td>
                                <td class="mail_add">
                                    <strong>דוא"ל: </strong>shy052@gmail.com
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <!--style must be in line!-->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3370.472038078895!2d34.87528012107434!3d32.35288041229499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151d152f8e01a585%3A0x26be26e9c950ce7!2z16nXk9eo15XXqiDXkdefINem15HXmSAzLCDXkNeR15nXl9eZ15w!5e0!3m2!1siw!2sil!4v1460665537633" width="500" height="500"  style="border:0; position: relative; float: left;  margin-top:15px;"></iframe>
                    </td>
                </tr>
            </table>
            <br>
            <div class = "msg-wrapper">
                <form id="makeContact" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <input type="text" name="fname" id="fname" class="det w3-input w3-border w3-round" placeholder="שם מלא" required>
                    <input type="text" name="phoneNumber" class="w3-input w3-border w3-round det" placeholder="טלפון" maxlength="10" pattern="\d{10}" title=" בתיבה זו נדרש להכניס טלפון נייד בלבד. במידה ואין ברשותך, אנא הזן את מספר הטלפון בהערות ובשדה זה מלא 10 אפסים רצופים" required>
                    <textarea name="contentCustomer" class="w3-input w3-border w3-round" rows="3" placeholder = "הערות" required></textarea>
                    <span><input class = "submit" type="submit" value="שלח פניה" onclick="return checkContact();"></span>
                </form>
            </div>
        </div>
        <?php
        $con = mysqli_connect("localhost", "root", "", "rogalit");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        if (count($_POST) != 0) {
            mysqli_set_charset($con, "utf8");
            //אם מולא השדה
            $fname = filter_var($_REQUEST['fname'], FILTER_SANITIZE_STRING);
            $phoneNumber = filter_var($_REQUEST['phoneNumber'], FILTER_SANITIZE_STRING);
            $contentCustomer = filter_var($_REQUEST['contentCustomer'], FILTER_SANITIZE_STRING);
            // insert into content db 
            $insertSql = "INSERT INTO contact(fname, phone, textarea1)"
                    . 'VALUES ("' . $fname . '","' . $phoneNumber . '","' . $contentCustomer . '")';
            if (!mysqli_query($con, $insertSql)) {
                die(' Error: ' . mysqli_error($con));
                echo ' < script>alert(' . "'זוהתה בעיה'" . ' ) </script>';
            } else {
                echo '<script>alert(' . "'פרטי הפנייה נקלטו במערכת.אנו עושים את מירב המאמצים בכדי לענות לך בהקדם.'" . ')</script>';
                echo '<script type="text/javascript">'
                . 'setTimeout(Redirect, 1000);'
                . 'function Redirect() {'
                . 'window.location="index.php";}'
                . '</script>';
            }
            mysqli_close($con);
        }
        ?>
        <a href="#" class="back-to-top"></a>
        <script type = "text/javascript">
            var amountScrolled = 150;
            $(window).scroll(function () {
                if ($(window).scrollTop() > amountScrolled) {
                    $('a.back-to-top').fadeIn('slow');
                } else {
                    $('a.back-to-top').fadeOut('slow');
                }
            });
            $('a.back-to-top').click(function () {
                $('html, body').animate({scrollTop: 0}, 700);
                return false;
            });
        </script>
        <div class="footer">
            <strong> &COPY;</strong>
            רזולוציה מומלצת: 768*1366
        </div>
    </body>
</html>
