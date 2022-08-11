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
 <?php 

if($_POST)
{

$number = $_POST["number"];


//////////---------------------------------------->>>> Balance Chk 
if(49 >= $mallu){
echo "You Don't Have Enough Coin<br/>";
echo "Currently You Have $mallu Coin";

}else{




//////////---------------------------------------->>>> Proceed To Game

$gid = mysqli_fetch_array(mysqli_query($conms,"SELECT gid FROM seventrade_game WHERE status ='0'"));
$tm = time();
$res = mysqli_query($conms,"INSERT INTO seventrade_bid SET gid='".$gid[0]."', userid='".$uid."', ballid='".$number."', bidtm='".$tm."'");
  

if($res){

//////////---------------------------------------->>>> CUT THE BALANCE

$ctn = $mallu-50;
mysqli_query($conms,"UPDATE users SET mallu='".$ctn."' WHERE id='".$uid."'");
//////////---------------------------------------->>>> CUT THE BALANCE


//////////---------------------------------------->>>> TRX HISTORY
$tm = time();
mysqli_query($conms,"INSERT INTO trx_history SET usid='".$uid."', des='Bid on Seventrade', sig='-', amount='50', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY






echo "<h2>Your Bid for <img src=\"$baseurl/seventrade/0$number.png\" alt=\"$number\">  Added Successfully.</h2><br/><br/>";

echo "Current Balance: $ctn Coin<br/>";


//////////---------------------------------------->>>> ADD THE BALANCE TO REF ID

$refid =  mysqli_fetch_array(mysqli_query($conms,"SELECT ref FROM users WHERE id='".$uid."'"));

$rct = mysqli_fetch_array(mysqli_query($conms,"SELECT mallu FROM users WHERE id='".$refid[0]."'"));
$rctn = $rct[0]+1;
mysqli_query($conms,"UPDATE users SET mallu='".$rctn."' WHERE id='".$refid[0]."'");

$dt = date("Y-m-d H:i:s", time());

 mysqli_query($conms,"UPDATE seventrade_bid SET bidaff='1' WHERE gid='".$gid[0]."' AND userid='".$uid."' AND ballid='".$number."' AND bidtm='".$tm."'");
//////////---------------------------------------->>>> ADD THE BALANCE TO REF ID

//////////---------------------------------------->>>> TRX HISTORY
$uuu = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$uid."'"));
$tm = time();
mysqli_query($conms,"INSERT INTO trx_history SET usid='".$refid[0]."', des='Affiliate Bonus from ".$uuu[0]." for Bid on Seven Trade', sig='+', amount='1', tm='".$tm."'");
//////////---------------------------------------->>>> TRX HISTORY

}else{
echo "<h1>Some problem occur....</h1><br/>Please Try again. <br/><br/>";
}


}
}else {
echo "Please Select your Ball";
}

echo "<h4><a href=\"$baseurl/seventrade\">Back To Game Screen</a></h4>"; 

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