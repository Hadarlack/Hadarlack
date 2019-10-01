<!DOCTYPE html>
<?php session_start() ?>
<html lang="he">
    <head>
        <title>תמונות מהיקב</title>
        <?php header("Content-type: text/html; charset=utf-8"); ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="media/top2.jpg"/>
        <link href="Css/w3.php" rel="stylesheet" type="text/css"/>
        <link href="Css/style.php" rel="stylesheet" type="text/css"/>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="js/javaFunctions.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#gallery").addClass("highlite");
            });
        </script>
    </head>
    <body dir = "rtl">
        <?php require('menu.php'); ?>
        <?php require('login.php'); ?>
        <?php $_SESSION['timeout'] = time(); ?>
        <div class = "gallery_container">
            <span><img src="media/winery1.jpg" alt="" class = "big_pic w3-border w3-padding-hor-4 w3-padding-tiny" id = "big_pic"></span>
            <div class = "picture_gallery_content" id = "small_pics" onmouseover = "changeImg(event)">
                <ul>
                    <li><img src="media/winery1.jpg" alt="יין בטבע" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery2.jpg" alt="חביות" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery3.jpg" alt="מרתף" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery4.jpg" alt="כרם" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery5.jpg" alt="אשכול ענבים" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery6.jpg" alt="ענבים" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery7.jpg" alt="בעלים" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery8.jpg" alt="הכנה" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery9.jpg" alt="בקבוק רוגלית" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery10.jpg" alt="כוסות" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery11.jpg" alt="בר" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery12.jpg" alt="חביות מעוצבות" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery13.jpg" alt="כוס יין לבן" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery14.jpg" alt="מזיגה" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery15.jpg" alt="עשייה" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery16.jpg" alt="מדרגות" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery17.jpg" alt="טבע" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                    <li><img src="media/winery18.jpg" alt="מוס" class = "small_pics_design w3-border w3-padding-hor-4 w3-padding-tiny"></li>
                </ul>
            </div>
        </div>
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
