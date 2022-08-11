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

<h1>Seven Trade Winner List</h1>



<table style="width:100%;background-color:#fff;text-align:center;" border="1">
                    <tr>
                        <th style="width:5%">Game ID</td>
                        <th style="width:5%">Win Ball</td>
                        <th style="width:5%">Bidder</td>
                        <th style="width:5%">Winner</td>
                        <th style="width:60%">Win Users</td>
                        <th style="width:20%">Game Date</td>
                    </tr>


<?php
error_reporting(0);


$ddaa = mysqli_query($conms,"SELECT gid FROM seventrade_game WHERE status='1'");
while ($data = mysqli_fetch_array($ddaa))
{

$winball = mysqli_fetch_array(mysqli_query($conms,"SELECT winball FROM seventrade_game WHERE gid='".$data[0]."'"));
$bidder = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE gid='".$data[0]."'"));
$winner = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE gid='".$data[0]."' AND winstatus='1'"));

echo " <tr>
                        <td>$data[0]</td>
                        <td><img src=\"../seventrade/0$winball[0].png\" alt=\"$winball[0]\"></td>
                        <td>$bidder[0]</td>
                        <td>$winner[0]</td>
                        <td>";

$da = mysqli_query($conms,"SELECT userid FROM seventrade_bid WHERE winstatus='1' AND gid='".$data[0]."'");
while ($daa = mysqli_fetch_array($da))
{
$name = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM member_profile WHERE mid='".$daa[0]."'"));
echo "$name[0] , ";
}

echo "</td><td>";


$tm = mysqli_fetch_array(mysqli_query($conms,"SELECT shuru, sesh FROM seventrade_game WHERE gid='".$data[0]."'"));

$shuru = date("d-m-Y h:i:s A", $tm[0]);
$sesh = date("d-m-Y h:i:s A", $tm[1]);

echo " $shuru<br/>$sesh";
echo "</td></tr>";



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