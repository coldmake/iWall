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

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
    try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
    } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
    }
}

// Login or logout url will be needed depending on current user state.
$login_params = array(
  'scope' => 'email',
  'redirect_uri' => 'http://localhost/iwall/index.php?id='.$_SESSION['id']
);

$_SESSION['loggedIn'] = true;

$logout_params = array( 'next' => 'http://localhost/iwall/login.php' );

if ($user) {
    $logoutUrl = $facebook->getLogoutUrl($logout_params);
    $_SESSION['loggedIn']=true;
    header('location: index.php?id='.$_SESSION['id']);
} else {
    $loginUrl = $facebook->getLoginUrl($login_params);
}

//$queryInsert = "INSERT INTO customer (customer_authtype, customer_authid, customer_email, customer_name, coupon_id) 
//    VALUES ('" . 'facebook' . "'," . $user . ",'" . $_POST['inputOp1'] . "','" . $_POST['inputOp2'] . "','" . $type1 . "','" . $type2 . "','" . $attributes . "'," . $attrAmount . "," . $_SESSION['user_id'] . ")";
//mysqli_query($conn, $queryInsert) or die("Failed Query of " . $queryInsert);

?>
<!doctype html>
<html>
    <head>
        <title>iWall Login</title>

        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <style>
            body {
                font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
            }
            h1 a {
                text-decoration: none;
                color: #3b5998;
            }
            h1 a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>

        <?php if ($user): ?>
            <a href="<?php echo $logoutUrl; ?>">Logout</a>
        <?php else: ?>
            <div>
                <a href="index.php?id=1"><img src="fb.png"/></a>
            </div>
        <?php endif ?>
      <?php        session_destroy(); ?>
     <script type="text/javascript"> if (window.location.hash == '#_=_')window.location.hash = '';</script>
    </body>
</html>
