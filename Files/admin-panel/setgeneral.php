<?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


    <div class="pageheader">
      <h2><i class="fa fa-cog"></i> General Setting </h2>
    </div>

    <div class="contentpanel">

      <div class="row">
        <div class="col-md-12">
      <div class="panel panel-default">
         <div style="display: block;" class="panel-body panel-body-nopadding">
          
          <form action="" method="post" class="form-horizontal form-bordered">
         
		<?php

if($_POST)
{

$sitename = mysqli_real_escape_string($conms,$_POST["sitename"]);
$txt1 = mysqli_real_escape_string($conms,$_POST["txt1"]);
$txt2 = mysqli_real_escape_string($conms,$_POST["txt2"]);

$res = mysqli_query($conms,"UPDATE general_setting SET sitename='".$sitename."', txt1='".$txt1."', txt2='".$txt2."' WHERE id='1'");
echo mysql_error();
if($res){
	echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Updated Successfully!

</div>";
}else{
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Demo Version!! You Cant Change!!

</div>";
}

}

$data = mysqli_fetch_array(mysqli_query($conms,"SELECT sitename, txt1, txt2 FROM general_setting WHERE id='1'"));
?>
			
			
            <div class="form-group">
              <label class="col-sm-3 control-label">WEBSITE TITLE</label>
              <div class="col-sm-6"><input name="sitename" value="<?php echo $data[0]; ?>" class="form-control" type="text"></div>
            </div>
                
            
                        
            <div class="form-group">
              <label class="col-sm-3 control-label">Bold Text</label>
              <div class="col-sm-6"><input name="txt1" value="<?php echo $data[1]; ?>" class="form-control" type="text"></div>
            </div>
                
            
                       
            <div class="form-group">
              <label class="col-sm-3 control-label">Small Text</label>
              <div class="col-sm-6"><input name="txt2" value="<?php echo $data[2]; ?>" class="form-control" type="text"></div>
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
        
      </div><!-- panel -->
      
     
      
     
      
      


	  
       

               </div><!-- col-md-12 -->
      
      </div><!-- row -->

      
      
      
    </div><!-- contentpanel -->



 




<?php
 include ('include/footer.php');
 ?>
 
 	
</body>
</html>