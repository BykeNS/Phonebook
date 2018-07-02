<!DOCTYPE html>
<html>
<head>
	<title>Phonebook</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="wrap">
   <div id="search">
     <img src="img/search.png" width="180" height="180">
     <a href="insert.php"><img src="img/add.png"  height="50px" title="Add contact"></a>
     <a href="remove.php"><img src="img/remove.png"  height="50px" title="Remove contact"></a>

   <form action="#" method="GET">
     <input type="text" name="criteria" placeholder="Criteria...">
     <input type="submit" value="Search"><br>
  </form>
 </div>
 <?php
 require 'inc/glavni.php';
 $con=new Povezi($serverName,$userName,$password,$dbName);
 $con->vratiRedove(); 
 ?>
</div>
</body>
</html>