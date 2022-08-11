<?php
include ('include/header.php');
?>

</head>
<body>   
 <?php
include ('include/sidebar.php');
?>


<div class="pageheader">
<h2><i class="fa fa-home"></i> Home Setting </h2>
</div>

<div class="contentpanel">
<div style="display: block;" class="panel-body panel-body-nopadding">
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

<div class="row">

<?php 
for ($i=1; $i <4 ; $i++) { 

$cc = mysqli_fetch_array(mysqli_query($conms,"SELECT COUNT(*) FROM home_txt WHERE id='".$i."'"));
if ($cc[0]==0) {
  mysqli_query($conms,"INSERT INTO home_txt SET id='".$i."'");
}




if ($_POST) {
$head = mysqli_real_escape_string($conms,$_POST["h$i"]);
$shead = mysqli_real_escape_string($conms,$_POST["sh$i"]);
$dt = mysqli_real_escape_string($conms,$_POST["dt$i"]);
mysqli_query($conms,"UPDATE home_txt SET h='".$head."', sh='".$shead."', dt='".$dt."' WHERE id='".$i."'");


// IMAGE UPLOAD //////////////////////////////////////////////////////////
    $folder = "../indx/icons/";
    $extention = strrchr($_FILES["ic$i"]['name'], ".");
    $new_name = $i;
    $bgimg = $new_name.'.png';
    $uploaddir = $folder . $bgimg;
    move_uploaded_file($_FILES["ic$i"]['tmp_name'], $uploaddir);

//////////////////////////////////////////////////////////////////////////
    

// IMAGE UPLOAD //////////////////////////////////////////////////////////
    $folder = "../indx/images/";
    $extention = strrchr($_FILES["img$i"]['name'], ".");
    $new_name = $i;
    $bgimg = $new_name.'.jpg';
    $uploaddir = $folder . $bgimg;
    move_uploaded_file($_FILES["img$i"]['tmp_name'], $uploaddir);

//////////////////////////////////////////////////////////////////////////




}

$old = mysqli_fetch_array(mysqli_query($conms,"SELECT h, sh, dt FROM home_txt WHERE id='".$i."'"));


?>


<div class="col-md-4">
<div class="panel panel-success">
<div class="panel-body">




<div class="form-group">
<label class="col-sm-12"><strong>icon</strong></label>
<div class="col-sm-6"><input type="file" name="ic<?php echo "$i"; ?>"></div>
<div class="col-sm-6"><img src="../indx/icons/<?php echo "$i"; ?>.png" alt="*" style="width: 100px;"></div>
</div>


<div class="form-group">
<label class="col-sm-12"><strong>Heading</strong></label>
<div class="col-sm-12"><input type="text" name="h<?php echo "$i"; ?>" value="<?php echo $old[0]; ?>" class="form-control input-lg"></div>          
</div>



<div class="form-group">
<label class="col-sm-12"><strong>Sub Heading</strong></label>
<div class="col-sm-12"><input type="text" name="sh<?php echo "$i"; ?>" value="<?php echo $old[1]; ?>" class="form-control input-lg"></div>          
</div>


<div class="form-group">
<label class="col-sm-12"><strong>IMAGE</strong></label>
<div class="col-sm-6"><input type="file" name="img<?php echo "$i"; ?>"></div>
<div class="col-sm-6"><img src="../indx/images/<?php echo "$i"; ?>.jpg" alt="*" style="width: 100%;"></div>
</div>


<div class="form-group">
<label class="col-sm-12"><strong>Details</strong></label>
<div class="col-sm-12"><input type="text" name="dt<?php echo "$i"; ?>" value="<?php echo $old[2]; ?>" class="form-control input-lg"></div>          
</div>




</div>
</div>
</div>

<?php 
}
 ?>



</div>


<div class="row">
  
<button type="submit" class="btn btn-success btn-block btn-lg">UPDATE</button>

</div>




</form>
</div><!-- panel-footer -->
</div><!-- contentpanel -->

<?php
include ('include/footer.php');
?>
</body>
</html>