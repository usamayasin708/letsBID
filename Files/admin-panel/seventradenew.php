<?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


    <div class="pageheader">
      <h2><i class="fa fa-gamepad"></i> 7 Trade Game </h2>
    </div>

    <div class="contentpanel">

      <div class="row">
<div class="col-md-12">





<center>

<h1>Adding New Game Schedule</h1>

<?php


if($_POST)

{

$endat = $_POST["endat"];

$shuru = time();
$sesh = $shuru+($endat*3600);

$lgame = mysqli_fetch_array(mysqli_query($conms,"SELECT gid FROM seventrade_game ORDER BY shuru DESC LIMIT 1"));


$gid = $lgame[0]+1;

$res = mysqli_query($conms,"INSERT INTO seventrade_game SET gid='".$gid."', shuru='".$shuru."', sesh='".$sesh."', status='0', winball='0'");

if($res){
echo "<h2>New Game Added Successfully.</h2><br/><br/>";
}else{
echo "<h2>Some problem occur....</h2><br/>Please Try again. <br/><br/>";
}


}
else{
$r = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_game WHERE status ='0'"));

if ($r[0]>=1)
   {	
$running = mysqli_fetch_array(mysqli_query($conms,"SELECT gid FROM seventrade_game WHERE status ='0'"));
echo "<br/><br/><br/><font style=\"font-size: 28px;font-style: bold;text-align: center;color:red;\">Warning: GAME # $running[0] is running. Please end this Game First. Otherwise it will happen a system error.......</font><br/><br/><br/>";
}else{
?>



<form action="" method="post">

<br/><br/><br/><font style="font-size: 28px;font-style: bold;text-align: center;color:red;">
Game End after <input type="text" name="endat"> Hour.....</font><br/><br/>

<input type="submit" value="ADD"> 
</form>
<?php
}
}
?>

</center>

 	
        </div><!-- col-sm-6 -->
      </div><!-- row -->



	  </div><!-- contentpanel -->

  </div><!-- mainpanel -->

  


</section>


<?php
 include ('include/footer.php');
 ?>
 	
</body>
</html>