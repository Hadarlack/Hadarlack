<!DOCTYPE html>
<?php session_start() ?>
<html lang="he">
    <head>

        <title>יקבי רוגלית</title>
        <link rel="top icon" type="JPEG image (.jpg)" href="media/top2.jpg" />
        <?php header("Content-type: text/html; charset=utf-8"); ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Css/w3.php" rel="stylesheet" type="text/css"/>
        <link href="Css/style.php" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script src="js/javaFunctions.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#index").addClass("highlite");
            });
        </script>
    </head>
    <body dir="rtl">
        <?php require('menu.php'); ?>
        <?php require('login.php'); ?>
        <?php $_SESSION['timeout'] = time(); ?>

        <div id = "content" class = "wrapper">
            <?php
            if (isset($_SESSION['registered'])) {
                $today = substr(date("Y-m-d"), 5, 10);
                $yourDay = substr($_SESSION['birthday'], 5, 10);
                if ((strcmp("$today", "$yourDay") == 0)) {
                    echo '<img class="birthdayCake background-image" src="media/birthday.gif" alt="ברוכים הבאים ">';
                } else {
                    echo '<img class="background-image" src="media/slider1.jpg" alt="ברוכים הבאים ">';
                }
            } else {
                echo '<img class="background-image" src="media/slider1.jpg" alt="ברוכים הבאים">';
            }
            ?>

            <div class="openMenu">
                <ul class="kitzurim_container">
                   <li>
                        <div class="open_menu_container not_a_link">
                             	 חזון היקב
                            <span class="open_menu_arrow"> > </span>
                            <div class="open_me">
                                <div class="hazon_open">
                                    <h4>חתירה למצויינות </h4>
                                    <p>
                                        יקב רוגלית שואף להיות ממובילי יקבי הבוטיק בארץ. בכל שלב בתהליך מושקעת חשיבה רבה, תוך שילוב טכנולוגיה מתקדמת והמון אהבה למקצוע.
                                    </p><br>
                                    <h4>מקצועיות</h4>
                                    <p>להתעדכן בכל עת בטכנולגיות הקיימות בשוק היין, שיטות הייצור והאחזקה.</p>
                                    <h4>ייצור כחול לבן</h4>
                                    <p>ייצור בגבולות מדינת ישראל ושימוש בחומרי גלם הגדלים אך ורק בארץ במטרה לפתח את כלכלתה של ישראל.</p>
                                </div>
                            </div>
                        </div>
                    </li>
					
					
					 <li>			
                        <a href="orderTour.php" class="open_menu_link">
                            <div class="open_menu_container">
							סיורים
                                <span class="open_menu_arrow"> > </span>
                                <div class="open_me">
                                    <div class="goout_open">
                                        <h2>בואו לגלות את הסודות</h2>
                                        <p>
                                         מחפשים רעיון מעניין ומקורי ליום ההולדת של בן/בת הזוג? אבא חוגג 50? בואו לראות, להריח ולהרגיש איתנו את תהליך ייצור היין. 
                                        </p>
										<p>
                                         את הסיורים מעבירים בעלי היקב, שרון וישי ובסופו ניתן לטעום מכלל תוצרת היקב. 
                                        </p>
                                        <h4>
                                            על מנת להזמין סיור לחץ בכל מקום בתיבה זו
                                        </h4>
                                    </div>
                                </div>
                            </div>
							
                        </a>
                    </li>
					
                    <li>
                        <a href="productSale.php" class="open_menu_link">
                            <div class="open_menu_container">                              
						 יין ישמח לבב אנוש
                                <span class="open_menu_arrow"> > </span>
                                <div class="open_me">
                                    <div class="happyWinery_open">
                                        <h2>
                                            "יין ישמח לבב אנוש" נאמר במקורות.
                                        </h2>
                                        <p> יין הוא אומנם משקה שנהוג לזהות עם העם הצרפתי,  אך אצלנו היהודים, כבר בגיל 8 ימים התינוקות הזכרים טועמים יין.</p>
                                        <p>היין מלווה אותנו בקידוש של יום שישי, בחגים ובכל שמחה. ביהדות היין הוא מקור לשמחה ולהנאה. </p>                                     
										<p>הגפן  אף נמנית על שבעת המינים והסמל של משרד התיירות הוא שני אנשים נושאים אשכול ענבים. ככל הנראה בדרך להכין ממנו יין.</p>
										<h2>
                                            הידעת?
                                        </h2>
										<ul>
                                        <li>על מנת לייצר בקבוק יין אחד, יש לסחוט 625 ענבים.</li>										
										<li>בבקבוק שמפניה אחד יש 49 מיליון בועות.</li>
										<li>טיפות היין הנשארות על הדופן הפנימי של כוס היין לאחר גלגול היין בכוס, נקראות :דמעות היין או רגליים.</li>										
										<li>בישראל מייצרים מידי שנה 30 מיליון ליטר יין.</li>
										</ul>
                                        <h3>
                                         אז למה אתם מחכים? לחצו בכל מקום בתיבה להתחלת קנייה
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </a>						
                    </li>
                      <li>
                        <div class="open_menu_container not_a_link">
			             ביקורות
                            <span class="open_menu_arrow"> > </span>
                            <div class="open_me">
                                <div class="mesaprim_open">
                                    <h2>אז מה אומרים עלינו?</h2>
									<ul>
										<li>"המקום אלגנטי נקי מסודר עם עובדים שפשוט נהנים לעשות את עבודתם היינות פשוט חבל על הזמן אני בטוח יחזור לשם " (דצמבר 2016)</li>	
										<li>"מקום קסום, יין טוב ואווירה טובה. (פברואר 2017)"</li>
										<li>"בתור חובב יינות מושבע, נהניתי מאוד". (מרץ 2017)</li>
									</ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="hide_help"></div>
            <div class="scrollingBarTitle"> הסיורים הקרובים</div>

            <div class="scroll-up scrollingBar">
                <a class="textMrq" href="orderTour.php">
				 <p><strong>סיורים קרובים:</strong><br> ביום שישי 26.5.17 יתקיים סיור מאורגן ביקב. מספר המקומות מוגבל. מהרו להירשם!
                   
                </a>
            </div>
        </div>
        <div class="footer">
            <strong> &COPY;</strong>
            רזולוציה מומלצת: 768*1366
        </div>
    </body>
</html>


