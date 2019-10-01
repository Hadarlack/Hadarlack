<!DOCTYPE html>
<?php session_start(); ?>
<html lang="he">
    <head>
        <title></title>
        <?php header("Content-type: text/html; charset=utf-8"); ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/x-icon" href="media/top2.jpg" />
        <link href="Css/w3.php" rel="stylesheet" type="text/css"/>
        <link href="Css/style.php" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script src="js/javaFunctions.js" type="text/javascript"></script>
        <?php

        function getProduct() {
            $con = mysqli_connect("localhost", "root", "", "rogalit");
            $id = $_GET['id'];
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            mysqli_set_charset($con, "utf8");
            $sql = "SELECT * FROM products WHERE id='" . $id . "'";
            $row = mysqli_fetch_array(mysqli_query($con, $sql));
            mysqli_close($con);
            return $row;
        }
        ?>
        <script>
            $(document).ready(function () {
                $("#productSale").addClass("highlite");
            });
        </script>
    </head>
    <body dir="rtl">
        <?php require('menu.php'); ?>
        <?php require ('login.php'); ?>
        <?php $_SESSION['timeout'] = time(); ?>
        <?php
        $product = getProduct();
        $page = $_GET['page'];
        echo '<div  class="productInfo_container">'
        . '<div class="productInfo_header">'
        . '<a href="productSale.php?page=' . $page . '" class="button" >חזרה</a>'
        . '<h2>'
        . $product[1] //name
        . '</h2>'
        . '<h5>'
        . '<i>'
        . '</i>'
        . '</h5>'
        . '</div>'
        . '<hr>'
        . '<div class="productInfo_contect">'
        . '<img src="' . $product[4] . '" alt="">' //img src
        . '<p>מחיר: ' . $product[2] . '   ש"ח </p>'// price
        . '<p>' . $product[3] . '</p>' // product info
        . '</div>'
        . '</div>';
        ?>
    </body>
</html>
