<?php
require_once('../function.php');
connectdb();
session_start();

if (!is_user()) {
	redirect('index.php');
}

?>


<?php
 $user = $_SESSION['username'];
 
 if($user!="controller"){
	redirect('signout.php');
 }
 
 
$usid = mysqli_fetch_array(mysqli_query($conms,"SELECT id FROM users WHERE username='".$user."'"));
 $uid = $usid[0];
 $ttl = mysqli_fetch_array(mysqli_query($conms,"SELECT sitename FROM general_setting WHERE id='1'"));
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title> <?php echo $ttl[0]; ?>  ADMIN Panel</title>

  <link href="css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  
