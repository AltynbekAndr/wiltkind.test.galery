<?php
require_once 'db.php';
$name_user = $_POST['rname'];
$password_user = $_POST['rpassword'];
$password_user2 = $_POST['rpassword2'];

if(($password_user&&$password_user2&&$name_user)!=null){
	if($password_user===$password_user2){

		mysqli_query($conn,"insert into users values (null,'$name_user','$password_user')");

	}else{  
		include 'index.php';
	    echo "<h1 style='color:gray'>Введенные пароли не совпадают</h1>";
		exit;
	}
	
}else{
       include 'index.php';	
   		echo "<h1 style='color:gray'>Введены не корректные данные</h1>";
		exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация успешно завершена</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="resources/cssforregphp.css"/>
</head>
<body>
<div class="container">
	<div class="inner">
	<p class="p1">Регистрация успешно завершена!!!! <br><?php echo $name_user;?></p>	
	<a href="galery.php">Главная</a>
    </div>
</div>
</body>
</html>