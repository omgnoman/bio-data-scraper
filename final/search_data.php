<?php
    if (isset($_POST['category'])) {
    	$value=$_POST['category'];
    	if ($value=='id') {
    		  $data['id']='true';
    	}
    	if ($value=='name') {
    		  $data['name']='true';
    	}
    	echo json_encode($data);    
    }
?>