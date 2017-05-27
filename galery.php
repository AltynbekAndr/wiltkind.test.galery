<?php
include 'db.php';
include 'divwithimg.php';

$query2 = mysqli_query($conn,"select * from albums order by id_album desc limit 12");  
 $arrname_album = array();
 $arrid_album = array();
if($query2!=false){
	while($res = mysqli_fetch_assoc($query2)){  
	 $arrname_album [] = $res['name_album'];
     $arrid_album [] = $res['id_album'];
    
}
}else{
	echo "error";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Галерея</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="resources/cssforgalery.css">
	<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css">
</head>
<body>

	<div class="lastalbom">
		последние альбомы
	</div>
    <div class="container">
    <?php
       
        for($i=0;$i<sizeof($arrid_album);$i++){
           al0($arrname_album[$i],$arrid_album[$i]);                
        }
    ?>
    </div>
    

    <?php

    $numberforpage = $arrid_album[0];
  
    
    $numberforpage2 = $numberforpage - 11;
    echo "<div class='lastalbom page'>
        	<a href=#><p>1</p></a> 
        	<a href=page.php/?p=1&la=$numberforpage2><p>>></p></a>    	
          </div>";
  
    ?>


</body>
</html> 
