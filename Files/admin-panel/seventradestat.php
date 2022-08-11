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

<h1>Seven Trade Statistics</h1>
<h2>Statistics For The Game which Winner is Declared (Running Game Data is Not Calculated Here)</h2>



<?php
$games = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_game WHERE status='1'"));
?>


<table style="width:100%;background-color:#fff;text-align:center;" border="1">
                    <tr>
                        <th style="width:70%">TOTAL GAME PLAYED</td>
                        <th style="width:30%"><?php echo $games[0]; ?></td>
                    </tr>
</table>



<br/>

<table style="width:100%;background-color:#fff;text-align:center;" border="1">
                    <tr>
                        <th style="width:30%">Subject</td>
                        <th style="width:15%">Number</td>
                        <th style="width:15%">Rate</td>
                        <th style="width:10%">Sign</td>
                        <th style="width:30%">Amount</td>
                    </tr>


<?php



$bidder = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE gstat='1' AND rewin='0'"));
$totaltred = $bidder[0]*50;

$bidaaa = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE gstat='1' AND rewin='0' AND bidaff='1'"));

$totaltredaff = $bidaaa[0]*1;

echo " <tr>
                        <td>TRADER</td>
                        <td>$bidder[0]</td>
                        <td>50 USD</td>
                        <td>+</td>
                        <td>$totaltred USD</td>
</tr>";


echo " <tr>
                        <td>TRADE Affiliate Bonus</td>
                        <td>$bidaaa[0]</td>
                        <td>1 USD (2%)</td>
                        <td>-</td>
                        <td>$totaltredaff USD</td>
</tr>";

$winner = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE gstat='1' AND rewin='0' AND winstatus='1' "));
$totalwin = $winner[0]*150;

$winaaa = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE gstat='1' AND rewin='0' AND winaff='1'"));

$totalwinaff = $winaaa[0]*3.5;
$totalwincomm = $winner[0]*15;

echo " <tr>
                        <td>Winner</td>
                        <td>$winner[0]</td>
                        <td>150 USD</td>
                        <td>-</td>
                        <td>$totalwin USD</td>
</tr>";


echo " <tr>
                        <td>Winner Commision</td>
                        <td>$winner[0]</td>
                        <td>15 USD (10%)</td>
                        <td>+</td>
                        <td>$totalwincomm USD</td>
</tr>";


echo " <tr>
                        <td>WIN Affiliate Bonus</td>
                        <td>$winaaa[0]</td>
                        <td>1 USD (2%)</td>
                        <td>-</td>
                        <td>$totalwinaff USD</td>
</tr>";





$rewin = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE gstat='1' AND rewin='1'"));
$totalrewin = $rewin[0]*25;
$totalrewincomm = $winner[0]*2.5;

echo " <tr>
                        <td>RE-Winner</td>
                        <td>$rewin[0]</td>
                        <td>25 USD</td>
                        <td>-</td>
                        <td>$totalrewin USD</td>
</tr>";


echo " <tr>
                        <td>RE -Winner Commision</td>
                        <td>$rewin[0]</td>
                        <td>2.5 USD (10%)</td>
                        <td>+</td>
                        <td>$totalrewincomm USD</td>
</tr>";


echo " <tr>
                        <td>RE - WIN Affiliate Bonus</td>
                        <td>$winner[0]</td>
                        <td>0</td>
                        <td>-</td>
                        <td>0.0 USD</td>
</tr>";
echo "</table>";


?>	
<table style="width:100%;background-color:#393939;text-align:center;" border="1">
                    <tr>
                        <th style="width:30%">TOTAL</td>
                        <th style="width:70%">
<?php 

$final = $totaltred-$totaltredaff-$totalwin+$totalwincomm-$totalwinaff-$totalrewin+$totalrewincomm;

echo " $totaltred - $totaltredaff - $totalwin + $totalwincomm - $totalwinaff - $totalrewin + $totalrewincomm - 0.0 = $final";
?>

</td>
                    </tr>
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