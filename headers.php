<?php


require "functions.php";



$globCss = "css/global.css";
$mediaCss = "css/media.css";
$headerCss = "css/header.css";
$footerCss = "css/footer.css";




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <style>
        <?php include $globCss; ?>
        <?php include $headerCss; ?>
        <?php include $style; ?>
        <?php include $footerCss; ?>
        <?php include $mediaCss; ?>
    </style>

    <!-- attribute -->

    <!-- fa -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- animate -->

    
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- gf -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:wght@300;400;600&family=Roboto:wght@300;500;700&display=swap" rel="stylesheet">


    <!-- attribute end -->

</head>