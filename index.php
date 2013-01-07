<?php
@session_start();

require_once("sdk/facebook.php");

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
            'appId' => '309218405856972',
            'secret' => '2d2b4eb74edc99ba4952085f8939ef19',
        ));

// Get User ID
$user = $facebook->getUser();
if ($user) {
    $logoutUrl = $facebook->getLogoutUrl();
}

//if ($user['name']);

if (isset($_GET['id']))
    $_SESSION['id'] = $_GET['id'];
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true) {
    header('location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>iWall Coupon</title>

        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        echo '<img src="11.jpg"/>';
        ?>
    <script type="text/javascript"> if (window.location.hash == '#_=_')window.location.hash = '';</script>
   
    </body>
</html>
