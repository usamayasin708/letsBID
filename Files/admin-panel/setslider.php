<?php
include ('include/header.php');
?>
</head>
<body>   
 <?php
include ('include/sidebar.php');
?>

    <div class="pageheader">
      <h2><i class="fa fa-cog"></i> Manage Slider</h2>
    </div>

    
    <div class="contentpanel">
      <div class="panel panel-default">

        <div class="panel-body">
		


<?php

if($_POST)
{
$btxt = mysqli_real_escape_string($conms,$_POST["btxt"]);
$stxt = mysqli_real_escape_string($conms,$_POST["stxt"]);

$err1 = 0;

if (empty($_FILES['bgimg']['name'])) {
$err1 = 1;
}else{
// IMAGE UPLOAD //////////////////////////////////////////////////////////
    $folder = "../indx/images/slider/";
    $extention = strrchr($_FILES['bgimg']['name'], ".");
    $new_name = time();
    $bgimg = $new_name.'.jpg';
    $uploaddir = $folder . $bgimg;
    move_uploaded_file($_FILES['bgimg']['tmp_name'], $uploaddir);

//////////////////////////////////////////////////////////////////////////
}

$error = $err1;


if ($error == 0){

$res = mysqli_query($conms,"INSERT INTO slider_home SET img='".$bgimg."', btxt='".$btxt."', stxt='".$stxt."'");
}else{
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    

SLIDER IMAGE IS REQUIRED!!!

</div>";
} 

}
}

?>                  
                    
                    
    
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                        <div class="form-body"> 
                
     
                        <div class="form-group">
              <label class="col-sm-3 control-label"><strong>SLIDER IMAGE</strong></label>
              <div class="col-sm-3"><input type="file" name="bgimg"></div>
          
                 </div>
             

              <div class="form-group">
              <label class="col-sm-3 control-label"><strong>Bold Text</strong></strong></label>
              <div class="col-sm-6"><input type="text" name="btxt" class="form-control input-lg"></div>          
                 </div>
        
              <div class="form-group">
              <label class="col-sm-3 control-label"><strong>Small Text</strong></strong></label>
              <div class="col-sm-6"><input type="text" name="stxt" class="form-control input-lg"></div>          
                 </div>
        
           
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-6">
                                                    <button type="submit" class="btn btn-success btn-block">ADD NEW</button>
                                                </div>
                                            </div>
                      
                                        </div>
                                    </form>
                                </div>
                            </div>




<?php


$ddaa = mysqli_query($conms,"SELECT id, img, btxt, stxt FROM slider_home ORDER BY id");
echo mysql_error();
    while ($data = mysqli_fetch_array($ddaa)){

echo "<div class=\"col-md-6 col-sm-12\" id='$data[0]'>

<img src=\"../indx/images/slider//$data[1]\" alt=\"IMG\" style=\"width:100%; height:360px;\"><br/>

<h3 style=\"font-weight:bold; min-height:40px;\">$data[2] </h3> $data[3] <br><br>

 <a class=\"btn btn-danger btn-lg btn-block\" href=\"delslider.php?id=$data[0]\">Delete</a><br/><br/><br/>


<br><br><br><br>
</div>";





}
?>   
                  
      

      
    </div><!-- contentpanel -->
    
  </div><!-- mainpanel -->

  
</section>


<?php
 include ('include/footer.php');
 ?>


<script src="js/bootstrap-timepicker.min.js"></script>


<script src="js/wysihtml5-0.3.0.min.js"></script>
<script src="js/bootstrap-wysihtml5.js"></script>
<script src="js/ckeditor/ckeditor.js"></script>
<script src="js/ckeditor/adapters/jquery.js"></script>



<script>
jQuery(document).ready(function(){
    
    "use strict";
    
  // HTML5 WYSIWYG Editor
  jQuery('#wysiwyg').wysihtml5({color: true,html:true});
  
  // CKEditor
  jQuery('#ckeditor').ckeditor();
  
  jQuery('#inlineedit1, #inlineedit2').ckeditor();
  
  // Uncomment the following code to test the "Timeout Loading Method".
  // CKEDITOR.loadFullCoreTimeout = 5;

  window.onload = function() {
  // Listen to the double click event.
  if ( window.addEventListener )
	document.body.addEventListener( 'dblclick', onDoubleClick, false );
  else if ( window.attachEvent )
	document.body.attachEvent( 'ondblclick', onDoubleClick );
  };

  function onDoubleClick( ev ) {
	// Get the element which fired the event. This is not necessarily the
	// element to which the event has been attached.
	var element = ev.target || ev.srcElement;

	// Find out the div that holds this element.
	var name;

	do {
		element = element.parentNode;
	}
	while ( element && ( name = element.nodeName.toLowerCase() ) &&
		( name != 'div' || element.className.indexOf( 'editable' ) == -1 ) && name != 'body' );

	if ( name == 'div' && element.className.indexOf( 'editable' ) != -1 )
		replaceDiv( element );
	}

	var editor;

	function replaceDiv( div ) {
		if ( editor )
			editor.destroy();
		editor = CKEDITOR.replace( div );
	}

	 jQuery('#timepicker').timepicker({defaultTIme: false});
  jQuery('#timepicker2').timepicker({showMeridian: false});
  jQuery('#timepicker3').timepicker({minuteStep: 15});

	
	
});



</script>
</body>
</html>



