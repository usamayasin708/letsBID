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

<h1>Seven Trade Winner From Re-win List</h1>





<table style="width:100%;background-color:#fff;text-align:center;" border="1">
                    <tr>
                        <th style="width:10%">Game ID</td>
                        <th style="width:35%">User</td>
                        <th style="width:25%">Re-wined</td>
                    </tr>


<?php
error_reporting(0);

$ddaa = mysqli_query($conms,"SELECT gid, userid, rtime, id FROM seventrade_bid WHERE rewin='1' AND gstat='1' ORDER BY id ASC");
while ($data = mysqli_fetch_array($ddaa))
{

$username = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$data[1]."'"));



echo " <tr>

                        <td>$data[0]</td>
                        <td>$username[0]</td>
                        <td>$data[2] Times</td>


                        
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