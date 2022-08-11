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




<div class="col-md-3">
<a href="seventradenew.php"><button class="btn btn-primary btn-block">Add New Game<br/>&nbsp;</button></a>
</div> 
 

<div class="col-md-3">
<a href="seventradeview.php"><button class="btn btn-success btn-block">Submit Winner/View Bidder<br/>&nbsp;
<?php

$r = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM seventrade_game WHERE status ='0'"));
if ($r[0]>=1)
   {	
$running = mysqli_fetch_array(mysqli_query($conms,"SELECT gid FROM seventrade_game WHERE status ='0'"));
echo "<font color=\"red\">GAME # $running[0] is running</font>";
}
?>

</button></a>
</div> 
 
 
<div class="col-md-3">
<a href="seventradewin.php"><button class="btn btn-info btn-block">Winner List<br/>&nbsp;</button></a>
</div> 
 
 
<div class="col-md-3">
<a href="seventradelose.php"><button class="btn btn-danger btn-block">Loser List<br/>&nbsp;</button></a>
</div> 
 
 





 	
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