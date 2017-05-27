<?php
function al0($name,$id)
{
	 echo "<a class=col-md-4 col-sm-4 col-xs-4 href=album.php?id=$id><img src=resources/images/".$id."/0.jpg>
    <p>".$name."</p>
    </a>";
}
function al2($name,$id)
{
	 echo "<a class=col-md-4 col-sm-4 col-xs-4 href=../album.php?id=$id><img src=../resources/images/".$id."/0.jpg>
    <p>".$name."</p>
    </a>";
}
function al3($name_img,$id_album,$count)
{   $this_cnt = 3;
 echo "<img class=img src=../resources/images/".$id_album."/".$name_img.">";
	 if($count==$this_cnt){
        echo '<br>';
        $this_cnt=$this_cnt+4;
        
	 }
	
}

?>
