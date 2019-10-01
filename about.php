<!DOCTYPE html>
<?php session_start() ?>
<html lang="he">
    <head>
        <title>אודות </title>
		<?php header("Content-type: text/html; charset=utf-8"); ?> 
        <link rel="top icon" type="JPEG image (.jpg)" href="media/top2.jpg" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Css/w3.css" rel="stylesheet" type="text/css"/>
        <link href="Css/style.php" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="js/javaFunctions.js" type="text/javascript"></script>
		<script>
            $(document).ready(function () {
                $("#about").addClass("highlite");
            });
        </script>
    </head>
    <body dir = rtl>
		<?php require('menu.php'); ?>
        <?php require('login.php'); ?>
        <?php $_SESSION['timeout'] = time(); ?>
        <?php
		    if (isset($_SESSION['gender'])) {
            if ($_SESSION['gender'] === 'male') {
                $imageGender = 'media/male.jpg';
            } else {
                $imageGender = 'media/female.jpg';
            }
        } else {
            $imageGender = 'media/undifined.jpg';
        }
        ?>
        <script>
            function pushToBuy() {
                var gender = "<?php echo $_SESSION['gender'] ?>";
                var userName = "<?php echo $_SESSION['username'] ?>";

                if (gender === "male") {
                    alert("היי " + userName + " לחץ על קטגורית המוצרים למכירה לצורך רכישת פריטים");
                } else {
                    alert("היי " + userName + " לחצי על קטגורית המוצרים למכירה לצורך רכישת פריטים");
                }
            }

        </script>
        <div id = "body" class= "about_content">
            <div>
                <span class = "">
                    <img src= "media/winery7.jpg" class = "about_winery" alt="הבעלים">
                </span>
                <h1> אודות יקב רוגלית </h1>
            </div>
			<div>
                <span>
                    <img src = "<?php echo $imageGender; ?>" onmouseover = "pushToBuy()" class = "newImageAbout" alt="אודות יקב רוגלית">
                </span>
			</div>
            <div class="about_txt_container" >
                <p class="about_text">יקב "רוגלית" שוכן בעמק האלה במשק 46 שבמושב נווה מיכאל .</p>
                <p class="about_text">מקור השם "רוגלית" הוא גפן השרועה קרוב לקרקע "ויקח מזרע הארץ ויתנהו בשדה זרע, קח על מים רבים, צפצפה שמו. </p>
                <p class="about_text">"ויצמח ויהי לגפן סורחת, שפלת קומה, לפנות דליותיו אליו ושרשיו תחתיו יהיו. ותהי לגפן ותעש בדים ותשלח פארות (יחזקאל פסוקים ה,ו)"</p>
                <p class="about_text">העסק מנוהל על ידי שרון וישי אשר גרים במושב במשך 7 שנים.  </p>
                <p class="about_text">"מה שמשך אותנו זה הטבע ומזג האויר הנוח."</p>
				<p class="about_text">"האזור עשיר בכרמים, יקבים, מבשלות בירה ואוכל טוב."</p>
				<p class="about_text">זה סיקרן אותנו, התחלנו ללמוד את זני הענבים ואת מלאכת עשיית היין וזה שאב אותנו לעשות יין בכמויות קטנות ואיכותיות  במרתף שנמצא בחצר הבית."</p>
            </div>
        </div>
		    <div class="footer">
            <strong> &COPY;</strong>
           רזולוציה מומלצת 1080*1920
        </div>
    </body>
</html>
