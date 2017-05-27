<?php
require_once 'db.php';
$name=$_POST['name'];
$password=$_POST['password'];
if($name==='admin'&&$password==='admin'){	
	include 'admin.php';
	exit;
 }
$res=mysqli_query($conn,"select name_user,password_user from users where name_user='$name';");
while($count=mysqli_fetch_assoc($res)){

if($count['name_user']===$name&&$count['password_user']===$password){	
	include 'galery.php';
	exit;
 }
}
echo "<h1 style='color:gray'>Вы не зарегистрированы</h1>";

?>
<!DOCTYPE html>
<html>
<head>
<title>мой тайтл2</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="resources/cssforindexphp.css">
</head>
<body>

		<div class="buttons">
			<button class="btn" id="b1">вход</button>
			<button class="btn" id="b2">регистрация</button>

		</div>
	<div class="con">
		<div class="signin">
			<form action="" method="POST">
			    <p>ваше имя</p> 
				<input type="text" name="name">
				<p>ваш пароль</p> 
				<input type="password" name="password" class="password">
		    	<input type="submit" id="submit" name="signin" value="войти">
			</form>
		</div>
		<div class="registration">
			<form action="registration.php" method="POST"> 
				 <p>ваше имя</p> 
				<input type="text" name="rname">
				<p>ваш пароль</p> 
				<input type="password" name="rpassword">
				<p>подтвердите пароль</p> 
				<input type="password" name="rpassword2" class="password2">
				<input type="submit" name="registration" value="регистрация">
			</form>
		</div>
	</div>	
	



<script type="text/javascript" src="resources/js/jquery-3.0.0.min.js">	
</script>
<script>
 $( "#b1" ).click(function() {
      $('.registration').css({'display':'none'});
        $('.signin').css({'display':'block','display':'inline-block','height':'250px','border-radius':'10px'});
        $(this).css({'background':'black'});
        $('#b2').css({'background':'#89B2FF'});
       $('input[type=submit]').css({'color':'#535153','width':'250px;'});
  });
 $( "#b2" ).click(function() {
       $('.signin').css({'display':'none'});
         $('.registration').css({'display':'block','display':'inline-block','height':'250px','border-radius':'10px'});
         $(this).css({'background':'black'});
        $('#b1').css({'background':'#89B2FF'});
        $('input[type=submit]').css({'color':'#535153','width':'250px;'});
 });
</script>

</body>

</html>