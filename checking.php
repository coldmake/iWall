<?php
@session_start();
if (isset($_GET['id']))
    $_SESSION['id'] = $_GET['id'];
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true)
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>iWall Checking</title>

        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
