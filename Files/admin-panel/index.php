<?php
 
require_once('../function.php');
connectdb();
session_start();
if (is_user()) {
	redirect('home.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title>Admin</title>

  <link href="css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="signin">


<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-2">
                
               
            </div><!-- col-sm-7 -->
            
            <div class="col-md-8">
                
                <form method="post" action="">
                    <h4 class="nomargin">Sign In</h4>
                    <p class="mt5 mb20">Login to access your account.</p>
                		
<?php 

if ($_POST){
$username = $_POST['username'];
$password = md5($_POST['password']);

$count = mysqli_fetch_array(mysql_unbuffered_query("SELECT COUNT(*) FROM users WHERE username='".$username."' AND password='".$password."'"));
if ($count[0]==1) {
$uu = $_POST['username']; 
$tm = time();
$si = "$uu$tm";
$sid = md5($si);
$_SESSION['sid'] = $sid;
$_SESSION['username'] = $username;
mysqli_query($conms,"UPDATE users SET sid='".$sid."' WHERE username='".$uu."'");
redirect("home.php");
}else{
echo '
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  
Wrong username or password
</div>';
  }
}
 ?>
								
                    <input type="text" class="form-control uname" name="username" placeholder="Username" />
                    <input type="password" class="form-control pword" name="password" placeholder="Password" />
                 
                    <button class="btn btn-success btn-block">Sign In</button>
                    
                </form>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; <?php echo date("Y") ?>. All Rights Reserved. 
            </div>
            <div class="pull-right">
        
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/jquery.cookies.js"></script>

<script src="js/toggles.min.js"></script>
<script src="js/retina.min.js"></script>

<script src="js/custom.js"></script>
<script>
    jQuery(document).ready(function(){
        
        // Please do not use the code below
        // This is for demo purposes only
        var c = jQuery.cookie('change-skin');
        if (c && c == 'greyjoy') {
            jQuery('.btn-success').addClass('btn-orange').removeClass('btn-success');
        } else if(c && c == 'dodgerblue') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        } else if (c && c == 'katniss') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        }
    });
</script>

</body>
</html>



