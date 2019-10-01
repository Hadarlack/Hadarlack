<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start(); ?>
<html lang="he">
    <head>
        <title>ביצוע תשלום</title>
        <?php header("Content-type: text/html; charset=utf-8"); ?>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="top icon" type="JPEG image (.jpg)" href="media/top2.jpg" />
        <link href="Css/w3.php" rel="stylesheet" type="text/css"/>
        <link href="Css/style.php" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script src="js/javaFunctions.js" type="text/javascript"></script>
    </head> 
    <body dir = "rtl" onload="yearExpire()">
        <?php require('menu.php'); ?>
        <?php require ('login.php'); ?>
        <?php $_SESSION['timeout'] = time(); ?>
        <div class="payment_container">  
            <form name="payment" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">      
                <div>
                    <div>
                        <p> אנא הזן את פרטי התשלום על מנת לבצע את הרכישה</p>                    
                        <div class = "visa">
                            <label for="visa"><img src="media/visaLogo.png" alt="visa" class="creditCard"  /></label>
                            <input type="radio" name="cards" value="visa" checked class = "creditCardRadio">
                        </div>
                        <div class = "master">
                            <label for="master"><img src="media/masterLogo.jpg" alt="master" class="creditCard" /></label>

                            <input type="radio" name="cards" value="master" class = "creditCardRadio">
                        </div>
                        <div class="diners">
                            <label for="dainers"><img src="media/dinersLogo.jpg" alt="diners" class="creditCard" /></label>      

                            <input type="radio" name="cards" value="diners club" class = "creditCardRadio">
                        </div>

                        <div class="american">
                            <label for="express"><img src="media/americanLogo.gif" alt="american" class="creditCard" /></label>

                            <input type="radio" name="cards" value="express" class = "creditCardRadio">
                        </div>
                    </div>

                </div>
                <br>
                <br>
                <br>
                <label for="cardNumber"> מספר כרטיס אשראי</label>
                <!-- All the crads is 12 digits-->
                <input id="cardNumber" class="paymet_inputSize w3-input w3-border w3-round" type="text" name="cardNumber" maxlength="16" pattern="\d{16}" title="נא להזין ספרות בלבד באורך 16 תוים" required>
                <br>
                <div>  תוקף הכרטיס
                    <br>
                    <select required id="exYear" onchange="monthExpire()" title="בחר שנה מהרשימה" name="exYear" class="paymet_selectorSize w3-select w3-border w3-round">
                        <option value=""> שנה</option>
                    </select>
                    <select required id="exMonth" title="בחר חודש מהרשימה" name="exMonth" class="paymet_selectorSize w3-select w3-border w3-round">
                        <option value="">חודש</option>
                    </select>


                </div>
                <br>	

                <!--  <label for="cardNumber"> סכום כולל מע"מ לתשלום: ___________</label> -->
                <br><br>
                <input type="submit" class = "submit" value="סיום"  >

            </form> 
        </div> 
        <?php
        $con = mysqli_connect("localhost", "root", "", "rogalit");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        if (count($_POST) != 0) {
            mysqli_set_charset($con, "utf8");
            if (isset($_REQUEST['cards'])) {
                //סופר אם אחד מהשדות שונה מאפס כלומר שדה שלא מולא
                $cardType = $_REQUEST['cards'];
                $cardNumber = filter_var($_REQUEST['cardNumber'], FILTER_SANITIZE_STRING);
                $exYear = $_REQUEST['exYear'];
                $exMonth = $_REQUEST['exMonth'];
                // בגלל שהלקוחכבר מחובר ניקח את התעודת זהות שלו מהטבלה
                $getID = "SELECT ID from clients where username ='" . $_SESSION['username'] . "'";
                $resultID = mysqli_fetch_array(mysqli_query($con, $getID)); //לוקח את התוצאה שהתקבלה מהשאילתה
                //שאילתה שתעבור על כל העמודות בטבלת כרטיסי אשראי ותבדוק את פרטי הכרטיס אל מול הלקוח
                $selectSqlCredits = "SELECT customerID, number FROM creditcards where customerID = $resultID[0] and number =" . $cardNumber;
                $resultCredits = mysqli_fetch_array(mysqli_query($con, $selectSqlCredits));
                if ($resultCredits[0] == "") {
                    //אם ללקוח לא קיים כרטיס אשראי
                    $insertSqlcreditcards = "INSERT INTO creditcards(customerID, number, type, month, year)"
                            . "VALUES ($resultID[0], '$cardNumber', '$cardType',$exMonth, $exYear )";
                    if (!mysqli_query($con, $insertSqlcreditcards)) {
                        die('Error: ' . mysqli_error($con));
                        echo '<script>alert(' . "'הייתה בעיה בהכנסה של שאילתה'" . ')</script>';
                    }
                    // echo '<script>alert(' . "' הפעולה בוצעה בהצלחה'" . ')</script>';
                }
                //שאילתה שתשלוף את ההזמנה האחרונה כך שנוכל להעלות אותם על פי סדרם
                echo '<script type="text/javascript">'
                . 'setTimeout(Redirect, 500);'
                . 'function Redirect() {'
                . 'window.location="thankforBuying.php";}'
                . '</script>';
            }
        }

        if (count($_GET) != 0) {
            mysqli_set_charset($con, "utf8");
            if (isset($_GET['amount']) && isset($_GET['orderProduct'])) { //if the user order products
                $_SESSION['orderProduct'] = 'yes';
                $amount = $_GET['amount'];
                $productID = $_GET['orderProduct'];

                $getProductPrice = 'SELECT price FROM products WHERE id =' . $productID;
                $productPrice = mysqli_fetch_array(mysqli_query($con, $getProductPrice));

                $totalPrice = $amount * $productPrice[0];

                $getID = "SELECT ID from clients where username ='" . $_SESSION['username'] . "'";
                $userID = mysqli_fetch_array(mysqli_query($con, $getID)); //לוקח את התוצאה שהתקבלה מהשאילתה

                $getLastIndexOfOrder = "SELECT orderID FROM orders ORDER BY orderID DESC LIMIT 1";
                $result = mysqli_fetch_array(mysqli_query($con, $getLastIndexOfOrder));
                //הגדלת מספר ההזמנה
                $orderNumber = $result[0] + 1;
                $orderShipmentDate = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 14 , date("Y")));

                $insertOrder = "INSERT INTO orders(orderID, userID, orderDate, totalPrice) VALUES ( '".$orderNumber."' ,  '".$userID[0]."' , '".$orderShipmentDate."' , '".$totalPrice."')";

                if (!mysqli_query($con, $insertOrder)) {
                    die('Error: ' . mysqli_error($con));
                    echo '<script>alert(' . "'הייתה בעיה בהכנסה של שאילתה'" . ')</script>';
                } else {
                    
                }

                $insertProductInOrder = "INSERT INTO productsinorder(orderID, productNumber, amount)"
                        . 'VALUES(' . $orderNumber . ',' . $productID . ',' . $amount . ')';
                if (!mysqli_query($con, $insertProductInOrder)) {
                    die('Error: ' . mysqli_error($con));
                    echo '<script>alert(' . "'הייתה בעיה בהכנסה של שאילתה'" . ')</script>';
                } else {
                    echo '<script>alert(' . "'ההזמנה נכנסה למערכת'" . ')</script>';
                }
            }
            if (isset($_GET['CNum']) && isset($_GET['Tdate'])) { //if the user order tour
                //סופר אם אחד מהשדות שונה מאפס כלומר שדה שלא מולא
                $CNum = filter_var($_REQUEST['CNum'], FILTER_VALIDATE_INT);
                $takedate = $_REQUEST['Tdate'];
                $_SESSION['CNum'] = 'yse';
                $date = date("Y-m-d H:i:s", strtotime($takedate));
                $finaldate = substr($date, 0, 10);
                $getID = "SELECT ID from clients where username ='" . $_SESSION['username'] . "'";
                $resultID = mysqli_fetch_array(mysqli_query($con, $getID)); //לוקח את התוצאה שהתקבלה מהשאילתה
                $getLastIndexOfTour = "SELECT tourNumber FROM toursinorder ORDER BY tourNumber DESC LIMIT 1";
                if (!mysqli_query($con, $getLastIndexOfTour)) {
                    die('Error: ' . mysqli_error($con));
                    echo '<script>alert(' . "'הייתה בעיה'" . ')</script>';
                }
                $result = mysqli_fetch_array(mysqli_query($con, $getLastIndexOfTour));
                $tourNumber = $result[0] + 1;
                $_SESSION['tourNumber'] = $tourNumber; //אנחנו רוצים שמספר ההזמנה האחרון ישמר לעמוד הבא שמאשר את פרטי ההזמנה
                $insertSql = "INSERT INTO toursinorder(tourNumber, clientsID, date, NumberOfParticipate)"
                        . "VALUES ($tourNumber, $resultID[0], '$finaldate', $CNum)";
                if (!mysqli_query($con, $insertSql)) {
                    die('Error: ' . mysqli_error($con));
                    echo '<script>alert(' . "'הייתה בעיה'" . ')</script>';
                }
                echo '<script>alert(' . "'נרשמת בהצלחה לסיור נשמח לראותך! כעת הינך מועבר לדף לפרטי אימות התשלום'" . ')</script>';
                $getLastIndexOfOrder = "SELECT orderID FROM orders ORDER BY orderID DESC LIMIT 1";

                $result = mysqli_fetch_array(mysqli_query($con, $getLastIndexOfOrder));
                //הגדלת מספר ההזמנה
                $orderNumber = $result[0] + 1;
                $globalPrice = 30;
                $totalPrice = $CNum * $globalPrice; // חישוב מחיר כולל 
                $today = substr(date("Y-m-d H:i:s"), 0 , 10);
                $insertSql = "INSERT INTO orders(orderID, UserID, orderDate, totalPrice)"
                        . 'VALUES (' . $orderNumber . ',' . $resultID[0] . ',"' . $today . '",' . $totalPrice . ')';

                if (!mysqli_query($con, $insertSql)) {
                    die('Error: ' . mysqli_error($con));
                    echo '<script>alert(' . "'הייתה בעיה בהכנסה של שאילתה'" . ')</script>';
                }
            }
        }
        mysqli_close($con);
        ?>

        <div class="footer">
            <strong> &COPY;</strong>
            רזולוציה מומלצת: 768*1366
        </div>
    </body>
</html> 

