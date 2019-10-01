<!DOCTYPE html>
<?php session_start() ?>
<html lang="he">
    <head>
        <title>הזמנת סיורים</title>
        <?php header("Content-type: text/html; charset=utf-8"); ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="media/top2.jpg" />
        <link href="Css/w3.php" rel="stylesheet" type="text/css"/>
        <link href="Css/style.php" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="js/javaFunctions.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#orderTour").addClass("highlite");
            });
        </script>
    </head>
    <body dir="rtl">
        <?php require('menu.php'); ?>
        <?php require('login.php'); ?>
        <?php $_SESSION['timeout'] = time(); ?>
        <div class ="order_tour_container">
                          
					<div class="ordgenized_tour">
						<p> תנו לנו להזמין אתכם למסע קסום</p>
						<p>בו המציאות יותר יפה מהתמונות.</p>
						<p> בתוך מתחם טבעי, בנוף עוצר נשימה </p>
						<p> בואו להכיר אנשים כמוני וכמוך</p>
						<p> שחיים את עולם היינות.</p>
						<p> ולגלות יחד מהיכן מגיע המשקה המופלא</p>
						<p> בעלות מצחיקה של 100 ש"ח.</p>
					</div>
				<div class = "tour_picture">  	
				<img class="circle" src="media/Tour1.jpg" alt="סיור">
				</div>
                <div class = "order_tour_btn_pos" id="order_btn">  
                    <button type ="submit" class ="order_tour_btn"  onclick="orderWindowDisappear()">להזמנת סיור לחץ כאן!</button>
                </div>
            

        </div>
        <div class="footer">
            <strong> &COPY;</strong>
            רזולוציה מומלצת: 768*1366
        </div>
    </body>
</html>
