<?php
include 'db.php';
require_once 'divwithimg.php';
$var = $_GET['id'];
$res = mysqli_query($conn,"select * from albums inner join images on albums.id_album=images.id_album where albums.id_album = $var;");
$name_album;
$date_creating;
$album_description;
$id_album = array();
$name_image = array();
if($res !=false){
while($count = mysqli_fetch_assoc($res)){
 $name_album = $count['name_album'];
 $date_creating = $count['date'];
 $album_description = $count['description'];
 $id_album[] = $count['id_album'];
 $name_image[] = $count['name_image'];
}}
?>
<!DOCTYPE html>
<html>
<head>
	<title>title</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../resources/cssforalbum.css">
	<link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.min.css">
	<script type="text/javascript" src="../resources/js/jquery-3.0.0.min.js">
    </script>
</head>
<body>
<?php
echo "<div class=container><h1><b>название альбома : </b><h1 class=h>$name_album</h1></h1><br>";
echo "<h3><b>дата создания : </b><h3 class=h>$date_creating</h3></h3><br>";
echo "<b>описание альбома :</b><p class=h>$album_description</p></div>";
echo "<div class=container>";
        for($i=0;$i<sizeof($name_image);$i++){
           al3($name_image[$i],$id_album[$i],$i);           
        }
echo "</div>";
    ?>


 <div class="zoomimgcontainer" style="max-height: 1500px">
 	
 </div>   
<script>
	$('img').click(
		function(){
		$('.container').css({"display":"none"});	
		$('.zoomimgcontainer').css({"display":"block"});
		$('.zoomimgcontainer').html("<img id=zimg src ="+this.src+" >X");	
	    $('#zimg').css({"width":"900px"});
	    $('.zoomimgcontainer').css({"background":"black","color":"white"});


	}
		);   
	$('.zoomimgcontainer').click(
		function(){
		$('.zoomimgcontainer').css({"display":"none"});	
		$('.container').css({"display":"block"});	
		


	}
		);   	    
</script>
</body>
</html>
