<!DOCTYPE html>
<?php session_start(); ?>
<html lang="he">
    <head>
        <?php header("Content-type: text/html; charset=utf-8"); ?>
        <title> פרטי סיור</title>
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
                $("#tour").addClass("highlite");
            });
        </script>
    </head>

    <body dir="rtl" Onload="minimumtoday()">
        <?php require('menu.php'); ?> 
        <?php require('login.php'); ?> 
        <?php $_SESSION['timeout'] = time(); ?>
        <div class="form_container">
            <form name="tour" method="get" action="payment.php">
                <label for="Tdate">בחר תאריך לסיור: </label>
                <input id="Tdate" class ="tourDet w3-input w3-border w3-round"  type="date" name="Tdate" required>
                <label for="clientNum"> כמות משתתפים</label>
                <input id="clientNum" class ="numberSize w3-input w3-border w3-round" type="number" name="CNum"  min="1" max="50" required>
                <input type="submit" class = "submit" value="לתשלום">
                <br><br>
                <div> "מחיר סיור הינו 100 שח לאדם</div>
            </form>
        </div>
        <div class="footer">
            <strong> &COPY;</strong>
            רזולוציה מומלצת: 768*1366
        </div>
    </body>
</html>
