 <?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


    <div class="pageheader">
      <h2><i class="fa fa-gamepad"></i> BID NOW </h2>
    </div>

    <div class="contentpanel">

      <div class="row">

        <div class="col-md-12">
 
<center>

 <?php 

if($_POST)
{




$gameid = $_POST["gameid"];
$sub = $_POST["sub"];
$bid = $_POST["bid"];

//echo "$bid  --  $gameid -- $sub";



//////////---------------------------------------->>>> Balance Chk 
if($bid >= $mallu){
echo " <h4 style=\"color:red;\">You Don't Have Enough Coin<br/>";
echo "Currently you have $mallu Coin </h4>";
include("exit.php");
exit();
}

//////////---------------------------------------->>>> CHEAT 
if(0.99 >= $bid){

echo " <h4 style=\"color:red;\">Minimum Bid Amount is 1 Coin</h4>";
include("exit.php");
exit();
}
//////////---------------------------------------->>>> CHEAT 


//////////---------------------------------------->>>> OPTION DISABLE

$dis = mysqli_fetch_array(mysqli_query($conms,"SELECT op1s, op2s FROM bid_game WHERE id='".$gameid."'"));

if($sub==1){
if($dis[0] == 1){

echo " <h4 style=\"color:red;\">Option is Closed !!!!</h4>";
include("exit.php");
exit();
}
}


if($sub==2){
if($dis[1] == 1){

echo " <h4 style=\"color:red;\">Option is Closed !!!!</h4>";
include("exit.php");
exit();
}
}



//////////---------------------------------------->>>> Proceed To Game

$tm = time();
$res = mysqli_query($conms,"INSERT INTO bid_bid SET gid='".$gameid."', userid='".$uid."', opid='".$sub."', bidtm='".$tm."', amount='".$bid."'");
  

if($res){

//////////---------------------------------------->>>> CUT THE BALANCE

$ctn = $mallu-$bid;
mysqli_query($conms,"UPDATE users SET mallu='".$ctn."' WHERE id='".$uid."'");

//////////---------------------------------------->>>> CUT THE BALANCE

//////////---------------------------------------->>>> TRX HISTORY
$gamedetails = mysqli_fetch_array(mysqli_query($conms,"SELECT title FROM bid_game WHERE id='".$gameid."'"));
$tm = time();
mysqli_query($conms,"INSERT INTO trx_history SET usid='".$uid."', des='Bid On ".$gamedetails[0]."', sig='-', amount='".$bid."', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY





echo "<h2>Your Bid Added Successfully.</h2><br/><br/>";

echo "Current Balance: $ctn Coin<br/>";


//////////---------------------------------------->>>> ADD THE BALANCE TO REF ID

$refid =  mysqli_fetch_array(mysqli_query($conms,"SELECT ref FROM users WHERE id='".$uid."'"));

$rct = mysqli_fetch_array(mysqli_query($conms,"SELECT mallu FROM users WHERE id='".$refid[0]."'"));
$rctn = $rct[0]+1;
mysqli_query($conms,"UPDATE users SET mallu='".$rctn."' WHERE id='".$refid[0]."'");

$dt = date("Y-m-d H:i:s", time());

 mysqli_query($conms,"UPDATE bid_bid SET bidaff='1' WHERE gid='".$gameid."' AND userid='".$uid."' AND opid='".$sub."' AND bidtm='".$tm."'");
//////////---------------------------------------->>>> ADD THE BALANCE TO REF ID

//////////---------------------------------------->>>> TRX HISTORY
$uuu = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$uid."'"));
$tm = time();
mysqli_query($conms,"INSERT INTO trx_history SET usid='".$refid[0]."', des='Affiliate Bonus from ".$uuu[0]." for Bid On ".$gamedetails[0]."', sig='+', amount='1', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY


}else{
echo "<h1>Some problem occur....</h1><br/>Please Try again. <br/><br/>";
}



}else {
echo "Please Select your Ball";
}

echo "<h4><a href=\"$baseurl/bid-on-game\">Back To Game Screen</a></h4>"; 

?>


 
</center>                             </div><!-- col-sm-6 -->

        
        

        
      </div><!-- row -->

      
      
      
    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

  


</section>


<?php
 include ('include/footer.php');
 ?>
 	
</body>
</html>