<?php
require_once 'db.php';
?>
<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Создатние альбома</title>
    <link rel="stylesheet" type="text/css" href="resources/cssforadminphp.css">
   <script type="text/javascript" src="resources/js/jquery-3.0.0.min.js">
    </script>
  </head>
  <body>
  <div class="maindiv">
     <h1>Создать альбом</h1>
 
    <form method="post" action="admin.php" enctype="multipart/form-data">
      <h3>название альбома</h3>
      <input type="text" name="albumname"> <br>
      <h3>дата создания</h3>
      <input type="date" name="date"> <br>
      
      <textarea name="description">
        описание альбома
      </textarea><br>



      <input type="file" id="file" name="userfile[]" multiple="multiple"/>
      <br>
      <input type="submit" value="отпрaвить"/>

    </form>  

  </div>




<?php
if ((($_POST['albumname']) && ($_POST['date'])&& ($_POST['description']))!=null){
 
    
    $albumname = $_POST['albumname'];
    $date = $_POST['date'];
    $description = $_POST['description'];

  mysqli_query($conn,"insert into albums values (null,'$albumname',' $description','$date')");

   $dir;
   $res =  mysqli_query($conn,"select id_album from albums where name_album='$albumname'");

  while($count = mysqli_fetch_assoc($res)){
      $dir = $count['id_album'];

    }
   if(!is_dir($dir)&&$res!=false){      
       mkdir('resources/images/'.$dir );
      }
     
   $formatforcd = 0;
   $formatformysql = 0;
   $slash = 'resources/images/';
   //$addedinput;
 foreach ($_FILES["userfile"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["userfile"]["tmp_name"][$key];
        $name = basename($_FILES["userfile"]["name"][$key]);
        $type = basename($_FILES["userfile"]["type"][$key]);
        if($type=='jpeg'||$type=='png'||$type=='bmp'||$type=='GIF'||$type=='jpg'){
           move_uploaded_file($tmp_name,$slash."$dir/".$formatforcd++.".jpg");
           
           mysqli_query($conn,"insert into images values(null,'$formatformysql.jpg',(select id_album from albums where name_album='$albumname'))");

           echo 'Файл загружен!'.'<br>';   
           //не дописанная строка для отбора имен файлов из добавленных админом в текстовых полей.Возникли проблемы с кодировкой и поэтому я решил сохранять файлы используя цифры вместо букв.         
           //echo $_POST['$addedinput'].'<br>';
           
           $formatformysql++;
       
    
        }else{
        echo "Загружать можно только картинки ";

        }
       
       
    }else{
        echo 'Ошибка загрузки';
    }
}
}else{
  echo "Не все поля заполнены!";  
}

?>
<h6 class="filename"></h6>



<script type="text/javascript">
  function validator(c) {
      var ch = new Array(31);
      var ch2 = new Array(31);
  
       ch[0] = 'а';
       ch[1] = 'б';
       ch[2] = 'в';
       ch[3] = 'г';
       ch[4] = 'д';
       ch[5] = 'е';
       ch[6] = 'ё';
       ch[7] = 'ж';
       ch[8] = 'з';
       ch[9] = 'и';
       ch[10] = 'к';
       ch[11] = 'л';
       ch[12] = 'м';
       ch[13] = 'н';
       ch[14] = 'п';
       ch[15] = 'р';
       ch[16] = 'с';
       ch[17] = 'т';
       ch[18] = 'у';
       ch[19] = 'Ф';
       ch[20] = 'й';
       ch[21] = 'х';
       ch[22] = 'ч';
       ch[23] = 'ш';
       ch[24] = 'щ';
       ch[25] = 'ь';
       ch[26] = 'ъ';
       ch[27] = 'э';
       ch[28] = 'ю';
       ch[29] = 'я';
       ch[30] = 'о';

       ch2[0] = 'А';
       ch2[1] = 'Б';
       ch2[2] = 'В';
       ch2[3] = 'Г';
       ch2[4] = 'Д';
       ch2[5] = 'Е';
       ch2[6] = 'Ё';
       ch2[7] = 'Ж';
       ch2[8] = 'З';
       ch2[9] = 'И';
       ch2[10] = 'К';
       ch2[11] = 'Л';
       ch2[12] = 'М';
       ch2[13] = 'Н';
       ch2[14] = 'П';
       ch2[15] = 'Р';
       ch2[16] = 'С';
       ch2[17] = 'Т';
       ch2[18] = 'У';
       ch2[19] = 'ф';
       ch2[20] = 'Й';
       ch2[21] = 'Х';
       ch2[22] = 'Ч';
       ch2[23] = 'Ш';
       ch2[24] = 'Щ';
       ch2[25] = 'Ь';
       ch2[26] = 'Ъ';
       ch2[27] = 'Э';
       ch2[28] = 'Ю';
       ch2[29] = 'Я';
       ch2[30] = 'О';
      for(var k = 0;k<c.length;k++){
         for(var j = 0 ;j<ch.length;j++){
            var v1 = c.charAt(k);
            var v2 = ch[j];
            var v3 = ch2[j];
           
            if(v1===v2||v1===v3){
                 alert("Error!! название файлов должны быть с латинскими буквами");
                
            } 
         }break;
      }     

    }  
</script>
<script type="text/javascript">
   
var c;
$('input[type="file"]').on('change', function (){
  var elemfile = document.getElementById('file').files;
 for(var i = 0 ; i<elemfile.length;i++){
 
   c = document.getElementById('file').files[i].name;
  $('<br><input type=text name=addedinput'+i+'><br>').insertAfter('#file').val(c);
 validator(c);    
 }
 
 
});
</script>
  </body>
</html> 