<?php

echo '<div id = "header" class = "menu">'
 . '<div id = "menu" class = "menu_pages">'
 . '<ul id = "nav" class = "navlist">'
 . '<li class = "menu"><a href="index.php" id="index">דף הבית</a></li>'
 . '<li class = "menu"><a href="about.php" id="about">אודות היקב</a></li>';
if (isset($_SESSION['registered'])) {
    echo '<li class = "menu"><a href="productSale.php" id="productSale">מוצרים למכירה</a></li>'
    . '<li class = "menu"><a href="orderTour.php" id="orderTour">הזמנת סיור ביקב</a></li>';
}
echo '<li class = "menu"><a href="gallery.php" id="gallery">גלריה</a></li>'
 . '<li class = "menu"><a href="contact.php" id="contact">צור קשר</a></li>';
if (!isset($_SESSION['registered'])) {
    echo '<li class = "menu"><a href="newUser.php" id="newUser">הירשם</a></li>';
}
if (isset($_SESSION['registered'])) {
    echo '<li class = "menu"><a href="myProfile.php" id="myProfile">כניסה לאזור האישי</a></li>';
}
echo '</ul>'
 . '</div>'
 . '</div>'
 . '<a href="index.php"><img src="media/mainIcon.png" class = "logo" alt="ברוכים הבאים"></a>';
