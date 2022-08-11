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

<h1>List Of Bidder</h1>

<?php
$r = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_game WHERE status ='0'"));

if ($r[0]>=1)
   {	
$running = mysqli_fetch_array(mysqli_query($conms,"SELECT gid FROM seventrade_game WHERE status ='0'"));
echo "<h4 style=\"color:red;\">GAME # $running[0] is running.</h4>";
?>
<table style="width:100%;background-color:#fff;text-align:center;" border="1">
                    <tr>
                        <th style="width:5%">Ball</td>
                        <th style="width:10%">Bidder</td>
                        <th style="width:75%">Users</td>
                        <th style="width:10%">Action</td>
                    </tr>
					
					
					
					
                    <tr>
                        <td><img src="../seventrade/01.png" alt="1"></td>

<td>
<?php
$a = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE ballid='1' AND gid='".$running[0]."'"));
echo "<b>$a[0]</b>";
?>
</td>
<td>
<?php
$ddaa = mysqli_query($conms,"SELECT userid FROM seventrade_bid WHERE ballid='1' AND gid='".$running[0]."'");
while ($data = mysqli_fetch_array($ddaa))
{
$name = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$data[0]."'"));
echo "$name[0] , ";
}
?>
</td>

<td>

<form action="seventrademakewin.php" method="post">
    <input type="hidden" name="ball" value="1">
    <input type="submit" value="Make Winner">
    </form>
</td>
</tr>

					
                    <tr>
                        <td><img src="../seventrade/02.png" alt="2"></td>
<td>
<?php
$a = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE ballid='2' AND gid='".$running[0]."'"));
echo "<b>$a[0]</b>";
?>
</td>
<td>
<?php
$ddaa = mysqli_query($conms,"SELECT userid FROM seventrade_bid WHERE ballid='2' AND gid='".$running[0]."'");
while ($data = mysqli_fetch_array($ddaa))
{
$name = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$data[0]."'"));
echo "$name[0] , ";
}
?>
</td>

<td>

<form action="seventrademakewin.php" method="post">
    <input type="hidden" name="ball" value="2">
    <input type="submit" value="Make Winner">
    </form>
</td>
</tr>

					
                    <tr>
                        <td><img src="../seventrade/03.png" alt="3"></td>
<td>
<?php
$a = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE ballid='3' AND gid='".$running[0]."'"));
echo "<b>$a[0]</b>";
?>
</td>
<td>
<?php
$ddaa = mysqli_query($conms,"SELECT userid FROM seventrade_bid WHERE ballid='3' AND gid='".$running[0]."'");
while ($data = mysqli_fetch_array($ddaa))
{
$name = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$data[0]."'"));
echo "$name[0] , ";
}
?>
</td>

<td>

<form action="seventrademakewin.php" method="post">
    <input type="hidden" name="ball" value="3">
    <input type="submit" value="Make Winner">
    </form>
</td>
</tr>

					
                    <tr>
                        <td><img src="../seventrade/04.png" alt="4"></td>
<td>
<?php
$a = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE ballid='4' AND gid='".$running[0]."'"));
echo "<b>$a[0]</b>";
?>
</td>
<td>
<?php
$ddaa = mysqli_query($conms,"SELECT userid FROM seventrade_bid WHERE ballid='4' AND gid='".$running[0]."'");
while ($data = mysqli_fetch_array($ddaa))
{
$name = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$data[0]."'"));
echo "$name[0] , ";
}
?>
</td>

<td>

<form action="seventrademakewin.php" method="post">
    <input type="hidden" name="ball" value="4">
    <input type="submit" value="Make Winner">
    </form>
</td>
</tr>

					
                    <tr>
                        <td><img src="../seventrade/05.png" alt="5"></td>
<td>
<?php
$a = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE ballid='5' AND gid='".$running[0]."'"));
echo "<b>$a[0]</b>";
?>
</td>
<td>
<?php
$ddaa = mysqli_query($conms,"SELECT userid FROM seventrade_bid WHERE ballid='5' AND gid='".$running[0]."'");
while ($data = mysqli_fetch_array($ddaa))
{
$name = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$data[0]."'"));
echo "$name[0] , ";
}
?>
</td>

<td>

<form action="seventrademakewin.php" method="post">
    <input type="hidden" name="ball" value="5">
    <input type="submit" value="Make Winner">
    </form>
</td>
</tr>
					
                    <tr>
                        <td><img src="../seventrade/06.png" alt="6"></td>
<td>
<?php
$a = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE ballid='6' AND gid='".$running[0]."'"));
echo "<b>$a[0]</b>";
?>
</td>
<td>
<?php
$ddaa = mysqli_query($conms,"SELECT userid FROM seventrade_bid WHERE ballid='6' AND gid='".$running[0]."'");
while ($data = mysqli_fetch_array($ddaa))
{
$name = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$data[0]."'"));
echo "$name[0] , ";
}
?>
</td>

<td>

<form action="seventrademakewin.php" method="post">
    <input type="hidden" name="ball" value="6">
    <input type="submit" value="Make Winner">
    </form>
</td>
</tr>
					
                    <tr>
                        <td><img src="../seventrade/07.png" alt="7"></td>
<td>
<?php
$a = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_bid WHERE ballid='7' AND gid='".$running[0]."'"));
echo "<b>$a[0]</b>";
?>
</td>
<td>
<?php
$ddaa = mysqli_query($conms,"SELECT userid FROM seventrade_bid WHERE ballid='7' AND gid='".$running[0]."'");
while ($data = mysqli_fetch_array($ddaa))
{
$name = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$data[0]."'"));
echo "$name[0] , ";
}
?>
</td>

<td>

<form action="seventrademakewin.php" method="post">
    <input type="hidden" name="ball" value="7">
    <input type="submit" value="Make Winner">
    </form>
</td>
</tr>

		








                </table>	

















<?php
}else{
echo "br/><br/><br/><font style=\"font-size: 28px;font-style: bold;text-align: center;color:red;\">NO Running Game</font><br/><br/><br/>";
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