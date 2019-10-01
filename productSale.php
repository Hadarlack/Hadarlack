<!DOCTYPE html>
<?php session_start() ?>
<html lang="he">
    <head>
        <?php header("Content-type: text/html; charset=utf-8"); ?>
        <title>מוצרים למכירה</title>
        <link rel="shortcut icon" type="image/x-icon" href="media/top2.jpg" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Css/w3.php" rel="stylesheet" type="text/css"/>
        <link href="Css/style.php" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script src="js/javaFunctions.php" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $("#productSale").addClass("highlite");
            });
        </script>
    </head>

    <body dir = "rtl">
        <?php require('menu.php'); ?>
        <?php require('login.php'); ?>
        <?php $_SESSION['timeout'] = time(); ?>
        <?php
        $con = mysqli_connect("localhost", "root", "", "rogalit");
        #openning the connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        mysqli_set_charset($con, "utf8");
        (count($_GET) == 0) ? $page = 1 : $page = $_GET['page'];
        #setting the page number

        $rowSpan = 3;
        $startRow = $rowSpan * ($page - 1);
        $sql = "SELECT * FROM products "
                . "LIMIT $startRow, $rowSpan";
        $queryTotalRows = mysqli_query($con, "SELECT count(1) FROM products");
        if (isset($_REQUEST['priority']) || ($_SESSION['priority'] == 'yes')) {
            $sql = "SELECT id, name, price, image, sum(amount) FROM productsinorder as PIO "
                    . "JOIN products as p WHERE PIO.productNumber = p.id GROUP BY id "
                    . "order by sum(amount) desc "
                    . "LIMIT $startRow, $rowSpan";

            $totalRows = "SELECT count(*) FROM (SELECT count(*) FROM productsinorder as PIO JOIN products as p WHERE PIO.productNumber = p.id GROUP BY id) as guy ";
            $queryTotalRows = mysqli_query($con, $totalRows);

            $_SESSION['priority'] = 'yes';
        }if (isset($_REQUEST['regular'])) {
            $sql = "SELECT * FROM products "
                    . "LIMIT $startRow, $rowSpan";
            $queryTotalRows = mysqli_query($con, "SELECT count(1) FROM products");

            $_SESSION['priority'] = 'no';
        }
        $queryData = mysqli_query($con, $sql);
        $totalRowsArray = mysqli_fetch_array($queryTotalRows);

        $totalRows = $totalRowsArray[0];

        $lastPage = ceil($totalRows / $rowSpan);

        $counter = $startRow;
        echo '<div class="products_container">'
        . '<br>'
        . '<ul class="photo-grid">';
        echo '<h4>תצוגה: <h6>';
        if (isset($_SESSION['priority'])) {
            if ($_SESSION['priority'] == 'yes') {
                echo 'מוצרים נמכרים ביותר';
            } else {
                echo 'תצוגה רגילה';
            }
        }
        echo '</h6></h4>';
        while ($row = mysqli_fetch_array($queryData)) {
            $counter = $counter + 1;
            $id = $row[0];
            #fetching each row as assoc and numeric array
            echo '<li>'
            . '<form method="get" action="payment.php">'
            . '<div class="productWrapper"><article>'
            . '<img class="productPic" src="' . $row['image'] . '" alt="">' // img src
            . '<header>'
            . $row[1] //name
            . '</header>'
            . '<p>'
            . '<strong>מחיר: </strong>' . $row[2] . ' ש"ח'// price
            . '</p>'
            . '<p>'
            . '<strong>כמות: </strong><input class="productAmount quantity P' . $counter . '" name="amount" type="number" min="1" max="10" title="חובה להזמין לפחות פריט אחד" required>'
            . '<input type="hidden" name="orderProduct" value="'.$row[0].'">'
            . '<input type="submit" class ="submit addItem" value="הזמן">'
            . '</p>'
            . '</article>'
            . '<a href="productInfo.php?id=' . $row[0] . '&page=' . $page . '"><img class="infoPic" src="media/info.png" alt="">' // id
            . '</a>'
            . '</div>'
            . '</form>'
            . '</li>';
        }

        #set the nav arrows
        $url = $_SERVER["PHP_SELF"];

        $backPage = $page - 1;
        $nextPage = $page + 1;
        if ($page != 1) {
            echo "<a href='" . $url . "?page=1'><img src='media/arrow-right-double.png' class='toTheRightMovePage'></a>";
            echo "<a href='" . $url . "?page=" . $backPage . "'><img src='media/arrow-right.png' class='toTheRightMovePage'></a>";
        }
        if ($page != $lastPage) {
            echo "<a href='" . $url . "?page=" . $lastPage . "'><img src='media/arrow-left-double.png' class='toTheLeftMovePage'></a>";
            echo "<a href='" . $url . "?page=" . $nextPage . "'><img src='media/arrow-left.png' class='toTheLeftMovePage'></a>";
        }
        mysqli_close($con);
        echo '</ul>'
        . '</div>';
        ?>

        <div class="filterProducts">
            <form method ="post" action="<?php $_SERVER["PHP_SELF"] ?>">
                סנן לפי
                <ul>
                    <li><input type="submit" name="priority" value="מוצרים נמכרים ביותר"></li>
                    <li><input type="submit" name="regular" value="תצוגה רגילה"></li>
                </ul>
            </form>
        </div>
        <!--
        <div class="shoppingCart">
            <form name="toPayment" action="form.php">  
                <table id = "shopCart" class="tableContainer">
                    <tr>
                        <th>המוצר</th>
                        <th>כמות יח'</th>
                        <th>מחיר</th>
                        <th>סטטוס</th>
                    </tr>
                </table>
                <div>
                    <span class="total_price">
                        מחיר סופי : <span class="current_price" id="totalPrice">0</span>
                    </span>
                    <span class="order_btn">
                        <input type="submit" class = "submit" value="הזמן">
                    </span>
                </div>
            </form>
        </div>
        <a href="#" class="back-to-top"></a>
        -->
        <!--script must appear inside current html document-->
        <script>
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
