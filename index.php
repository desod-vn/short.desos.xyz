<?php session_start(); ?>
<?php include_once "inc/db.php"; ?>
<?php include_once "inc/home.php"; ?>
<?php include_once "library/Home.php"; ?>
<?php include "view/master/head.php"; ?>
<?php include "view/master/menu.php"; ?>
<header class="container">
    <div class="space-wrap">
        <div class="call-12">
            <div class="banner">
                RÚT GỌN LINK MIỄN PHÍ - AN TOÀN
            </div>
        </div>
<?php include "view/index.php"; ?>
<svg id="wave" viewBox="0 3 100 15">
    <path fill="#41A6C2" opacity="0.5" d="M0 30 V15 Q30 3 60 15 V30z"></path>
    <path fill="#41A6C2" d="M0 30 V12 Q30 17 55 12 T100 11 V30z"></path>
</svg>

<?php include "view/master/foot.php"; ?>
