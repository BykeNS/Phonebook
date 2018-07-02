<!DOCTYPE html>
<html>
<head>
	<title>Phonebook</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="wrap">
   <div id="search">
     <img src="img/add.png" width="180px" height="180px">
     <a href="index.php"><img src="img/search.png"  height="50px" title="Search contact"></a>
     <a href="remove.php"><img src="img/remove.png"  height="50px" title="Remove contact"></a>
     <form action="#" method="POST">
       
       <label>First name:<br>
       <input type="text" name="fname"></label><br>
       <label>Last name:<br>
       <input type="text" name="lname"></label><br>
       <label>Tel:<br>
       <input type="text" name="tel"></label><br>
       <input type="submit" name="insert" value="insert"><br>
  </form>
 </div>
 <div id="message">
 	<?php
  
  require 'inc/glavni.php';
  $con=new Povezi($serverName,$userName,$password,$dbName);
  $con->ubaciRedove();
 
 	?>
 </div>
</div>
</body>
</html>