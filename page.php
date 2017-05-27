<?php
include 'db.php';
include 'divwithimg.php';

$la = $_GET['la'];
$p = $_GET['p'];
$p++; 
$la2 = $la;
$query2 = mysqli_query($conn,"select * from albums where id_album<$la and id_album>$la-13 ");  
 $arrname_album = array();
 $arrid_album = array();
if($query2!=false){
	while($res = mysqli_fetch_assoc($query2)){  
	 $arrname_album [] = $res['name_album'];
     $arrid_album [] = $res['id_album'];
    
  } 
 
}else{
	echo "<h1>Error! больше данных нет</h1>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>title</title>
	<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../resources/cssforgalery.css">
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
</head>
<body>

	<div class="lastalbom">
		последние альбомы
	</div>
    <div class="container">
    <?php
       
        for($i=0;$i<sizeof($arrid_album);$i++){
           al2($arrname_album[$i],$arrid_album[$i]);                
        }
    ?>
    </div>

    <?php
    
    $numberforpage = $arrid_album[0];
    

   
       echo "<div class='lastalbom page'>
        <a href=#><p><<</p></a>  
          <a href=#><p>$p</p></a> 
          <a href=?p=$p&la=$numberforpage><p>>></p></a>     
          </div>";
  
    ?>
</body>
</html>