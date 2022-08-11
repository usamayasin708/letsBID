<?php
include ('include/header.php');
?>

  
  <link href="css/style.default.css" rel="stylesheet">
  <link href="css/jquery.datatables.css" rel="stylesheet">
</head>
<body>   
 <?php
include ('include/sidebar.php');
?>

    <div class="pageheader">
      <h2><i class="fa fa-th-list"></i> Head and Tail Statistics</h2>
    </div>

    
    <div class="contentpanel">
	 <div class="panel panel-default">

        <div class="panel-body">
		
		 <div class="clearfix mb30"></div>

          <div class="table-responsive">
          <table class="table table-striped" id="table2">
              <thead>
                 <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Bid On</th>
                    <th>Amount</th>
                    <th>Status</th>

					</tr>
              </thead>
              <tbody>
                
				
				<?php

$ddaa = mysqli_query($conms,"SELECT id, userid, bidon, amount, winstat FROM head_tail ORDER BY id");
    echo mysql_error();
    while ($data = mysqli_fetch_array($ddaa))
    {				

$usnm = mysqli_fetch_array(mysqli_query($conms,"SELECT username FROM users WHERE id='".$data[1]."'"));

if($data[4]==0){
	$winnn = "<button class=\"btn btn-danger btn-xs\">Lose</button>";
}else{

	$winnn = "<button class=\"btn btn-success btn-xs\">WIN</button>";
}

 echo "                                 <tr>
                                            <td>$data[0]</td>
                                            <td>$usnm[0]</td>
                                            <td>$data[2]</td>
                                            <td>$data[3]</td>
                                            <td>	$winnn </td>

                                        </tr>
	";
	}
?>
				
				
			
				




				
				 
              </tbody>
           </table>
          </div><!-- table-responsive -->
		  
        </div>
      </div>
                  
      

      
    </div><!-- contentpanel -->
    


  
</section>


<?php
 include ('include/footer.php');
 ?>

<script src="js/jquery.datatables.min.js"></script>
<script src="js/select2.min.js"></script>

<script>
  jQuery(document).ready(function() {
    
    "use strict";
    
    jQuery('#table1').dataTable();
    
    jQuery('#table2').dataTable({
      "sPaginationType": "full_numbers"
    });
    
    // Select2
    jQuery('select').select2({
        minimumResultsForSearch: -1
    });
    
    jQuery('select').removeClass('form-control');
    
    // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c)
        jQuery(this).closest('tr').fadeOut(function(){
          jQuery(this).remove();
        });
        
        return false;
    });
    
    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });
  
  
  });
</script>



</body>
</html>



