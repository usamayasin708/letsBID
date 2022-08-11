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

<h1>Game Ended</h1>

<?php


if($_POST)
{
$ball = $_POST["ball"];

$running = mysqli_fetch_array(mysqli_query($conms,"SELECT gid FROM seventrade_game WHERE status ='0'"));

$res = mysqli_query($conms,"UPDATE seventrade_game SET status='1', winball='".$ball."' WHERE gid='".$running[0]."'");


echo "<font style=\"font-size: 28px;font-style: bold;text-align: center;color:red;\">Result for GAME # $running[0]</font><br/><br/>";

if($res){

mysqli_query($conms,"UPDATE seventrade_bid SET gstat='1' WHERE gid='".$running[0]."'");



mysqli_query($conms,"UPDATE seventrade_bid SET winstatus='1' WHERE gid='".$running[0]."' and ballid='".$ball."'");

mysqli_query($conms,"UPDATE seventrade_game SET sesh='".time()."' WHERE gid='".$running[0]."'");

$ddaa = mysqli_query($conms,"SELECT userid, id FROM seventrade_bid WHERE ballid='".$ball."' AND gid='".$running[0]."'");
while ($data = mysqli_fetch_array($ddaa))
{
$name = mysqli_fetch_array(mysqli_query($conms,"SELECT username, email FROM users WHERE id='".$data[0]."'"));



///////////////////------------------------------------->>>>>>>>>Send Email

$to = "$name[1]";
$subject = 'Welcome to Lets Bid';

$message = 'Hi '."$name[0], \r\n YOU Win Seven Trade Game ";

$headers = 'From: ' . "$sender \r\n" .
    'Reply-To: ' . "$sender \r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

///////////////////------------------------------------->>>>>>>>>Send Email






//////////---------------------------------------->>>> ADD THE BALANCE 
$ct = mysqli_fetch_array(mysqli_query($conms,"SELECT mallu FROM users WHERE id='".$data[0]."'"));
$ctn = $ct[0]+100;
mysqli_query($conms,"UPDATE users SET mallu='".$ctn."' WHERE id='".$data[0]."'");
echo "<font style=\"font-size: 18px;font-style: bold;text-align: center;color:green;\">$name[0]'s Balance Updated $ct[0] to  $ctn </font><br/> ";
//////////---------------------------------------->>>> ADD THE BALANCE

//////////---------------------------------------->>>> TRX HISTORY
$tm = time();
mysqli_query($conms,"INSERT INTO trx_history SET usid='".$data[0]."', des='Seven Trade Winner', sig='+', amount='100', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY



//////////---------------------------------------->>>> ADD THE BALANCE TO REF ID

$refid =  mysqli_fetch_array(mysqli_query($conms,"SELECT ref FROM users WHERE id='".$data[0]."'"));
$name = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$refid[0]."'"));
$rct = mysqli_fetch_array(mysqli_query($conms,"SELECT mallu FROM users WHERE id='".$refid[0]."'"));
$rctn = $rct[0]+1;
mysqli_query($conms,"UPDATE users SET mallu='".$rctn."' WHERE id='".$refid[0]."'");
echo "(Referrer $name[0]'s Balance Updated $rct[0] to  $rctn)<br/><br/>";

$dt = date("Y-m-d H:i:s", time());

mysqli_query($conms,"UPDATE seventrade_bid SET winaff='1' WHERE id='".$data[1]."'");


//////////---------------------------------------->>>> ADD THE BALANCE

//////////---------------------------------------->>>> TRX HISTORY
$kida =  mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$data[0]."'"));
$tm = time();
mysqli_query($conms,"INSERT INTO trx_history SET usid='".$refid[0]."', des='Seven Trade Winner Affiliate Bonus for ".$kida[0]."', sig='+', amount='1', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY




}


}else{
echo "<h1>Some problem occur....</h1><br/>Please Try again. <br/><br/>";
}

}else{
echo "Please Select a Winner";
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