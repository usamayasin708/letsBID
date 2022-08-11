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

<h1>Loser List</h1>




		<?php
error_reporting(0);


if($_POST)
{

$iidd = $_POST["iidd"];


$res = mysqli_query($conms,"UPDATE seventrade_bid SET rewin='1' WHERE id='".$iidd."'");

if($res){


$dutu = mysqli_fetch_array(mysqli_query($conms,"SELECT userid FROM seventrade_bid WHERE id='".$iidd."'"));
$username = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM member_profile WHERE mid='".$dutu[0]."'"));
echo "<font style=\"font-size: 18px;font-style: bold;text-align: center;color:red;\">$username[0] Re-wined!";



//////////---------------------------------------->>>> ADD THE BALANCE 
$ct = mysqli_fetch_array(mysqli_query($conms,"SELECT trade_balance FROM member_balance WHERE mid='".$dutu[0]."'"));
$ctn = $ct[0]+102;
mysqli_query($conms,"UPDATE member_balance SET trade_balance='".$ctn."' WHERE mid='".$dutu[0]."'");
echo "and Balance Updated $ct[0] to  $ctn <br/> </font>";
//////////---------------------------------------->>>> ADD THE BALANCE



$thenew = mysqli_fetch_array(mysqli_query($conms,"SELECT gid, userid, ballid, winstatus, bidtm, rewin, gstat, bidaff, winaff, rtime FROM seventrade_bid WHERE id='".$iidd."'"));

$rtm = $thenew[9]+1;

mysqli_query($conms,"DELETE FROM seventrade_bid WHERE id='".$iidd."'");

if($rtm>="4"){

mysqli_query($conms,"INSERT INTO seventrade_bid SET gid='".$thenew[0]."', userid='".$thenew[1]."', ballid='".$thenew[2]."', winstatus='1', bidtm='".$thenew[4]."', rewin='".$thenew[5]."', gstat='".$thenew[6]."', bidaff='".$thenew[7]."', winaff='".$thenew[8]."', rtime='".$rtm."'");


}else{
mysqli_query($conms,"INSERT INTO seventrade_bid SET gid='".$thenew[0]."', userid='".$thenew[1]."', ballid='".$thenew[2]."', winstatus='".$thenew[3]."', bidtm='".$thenew[4]."', rewin='".$thenew[5]."', gstat='".$thenew[6]."', bidaff='".$thenew[7]."', winaff='".$thenew[8]."', rtime='".$rtm."'");
}

}
else{
echo "Please try again";
}

}
?>






<table style="width:100%;background-color:#fff;text-align:center;" border="1">
                    <tr>
                        <th style="width:10%">SL#</td>
                        <th style="width:10%">Game ID</td>
                        <th style="width:35%">User</td>
                    </tr>


<?php

$i = 0;

$ddaa = mysqli_query($conms,"SELECT gid, userid, rtime, id FROM seventrade_bid WHERE winstatus='0' AND gstat='1' ORDER BY id ASC");
while ($data = mysqli_fetch_array($ddaa))
{
$i++;
$username = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM member_profile WHERE mid='".$data[1]."'"));



echo " <tr>
                        <td>$i</td>
                        <td>$data[0]</td>
                        <td>$username[0]</td>
                       </tr>";



}


?>	



</table>

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