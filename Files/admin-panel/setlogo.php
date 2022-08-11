<?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


    <div class="pageheader">
      <h2><i class="fa fa-cog"></i> LOGO </h2>
    </div>

    <div class="contentpanel">

      <div class="row">

        <div class="col-md-12">
      
      <div class="panel panel-default">
        <div style="display: block;" class="panel-body panel-body-nopadding">
          

    <?php
if ($_POST) {

// IMAGE UPLOAD //////////////////////////////////////////////////////////
	$folder = "../indx/";
	$extention = strrchr($_FILES['bgimg']['name'], ".");
	$new_name = "lets-bid";
	$bgimg = $new_name.'.png';
	$uploaddir = $folder . $bgimg;
	move_uploaded_file($_FILES['bgimg']['tmp_name'], $uploaddir);
//////////////////////////////////////////////////////////////////////////

}

?>
							 <form name="" id="" action="" method="post" enctype="multipart/form-data" >
<br/>
				  
            <div class="form-group">
              <label class="col-sm-3 control-label">LOGO</label>
              <div class="col-sm-6"><input name="bgimg" type="file" id="bgimg" /></div>
              <input type="hidden" name="a" value="1">
            </div>
                
            
            

            
            
        </div><!-- panel-body -->
        
        <div style="display: block;" class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				  <button class="btn btn-primary">Submit</button>
				</div>
			 </div>
			 
			 
          </form>
          
			 
		  </div><!-- panel-footer -->
        
		
Current Image : <br/><img src="../indx/lets-bid.png" width="300px;" height="120px" alt="IMG">

<br/><br/><br/><br/>
		
		
      </div><!-- panel -->
      
     
      
     
      
      

     
     
    </div>
	  
	  
	  
       

       
      
      </div><!-- row -->

      
      
      
    </div><!-- contentpanel -->



 




<?php
 include ('include/footer.php');
 ?>
 
 	
</body>
</html>