<!DOCTYPE html>
<html>
<head>
	<title>Phonebook</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="wrap">
   <div id="search">
     <img src="img/remove.png" width="180px" height="180px">
     <a href="index.php"><img src="img/search.png"  height="50px" title="Search contact"></a>
     <a href="insert.php"><img src="img/add.png"  height="50px" title="Add contact"></a>
     <?php
     
     require 'inc/glavni.php';
     $con=new Povezi($serverName,$userName,$password,$dbName);
     if(isset($_GET['id'])){
     $con->ukloniRedove();}
     $con->izlistajRedove();
     
    
     ?>
          
   
 </div>
</div>
</body>
</html>
