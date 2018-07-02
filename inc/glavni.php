<?php

require 'parametri.php';
class Povezi
{
	protected $conn;
	public function __construct($serverName,$userName,$password,$dbName)
	{
        
        $this->conn=mysqli_connect($serverName,$userName,$password,$dbName);
        if (!$this->conn) 
        {
	         die("database conection failed");
        }
             //else echo "Uspela konekcija<br>";
    }
    public function vratiRedove()
    {
    	if (isset($_GET['criteria'])) {
	    if(!empty($_GET['criteria'])) {
        $criteria=trim($_GET['criteria']);
        $criteria=mysqli_real_escape_string($this->conn,$criteria);
        $query="SELECT * FROM contacts WHERE fname LIKE'%{$criteria}%' OR lname LIKE'%{$criteria}%'";
        $result=mysqli_query($this->conn,$query);
        if(mysqli_num_rows($result)> 0){
            while ($row=mysqli_fetch_assoc($result)) {
            	?>
                 <div id="result">
                 	<img src="img/user.png">
                 	<p><b>Name: </b><?php echo$row['fname'] ." ". $row['lname'];?></p>
                 	<p><b>Tel: </b><?php echo$row['tel'];?></p>
                 </div>
            	<?php
                }echo "Number of results:" .mysqli_num_rows($result);
                }else{
        	       echo "No result";
                }
	            }else{
		          echo "Criteria is empty.";
	        }
        }
    }
    public function ubaciRedove()//insert
    {
        if(isset($_POST['insert'])){
 		if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['tel'])){ 
 		if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['tel'])){
 			$fname=trim($_POST['fname']);
 			$lname=trim($_POST['lname']);
 			$tel=trim($_POST['tel']);
 			//require 'inc/conect.php';
 			$fname=mysqli_real_escape_string($this->conn,$fname);
 			$lname=mysqli_real_escape_string($this->conn,$lname);
 			$tel=mysqli_real_escape_string($this->conn,$tel);

 			$query="INSERT INTO contacts (fname, lname, tel) VALUES ('{$fname}','{$lname}','{$tel}')";
            if(mysqli_query($this->conn,$query)===TRUE){
            	echo "New contact successfully created";
            }else{
            	echo "Error!!!";
            }
 		    }else{
 			echo "All fields must be filled in!!!";
 		    }
 		    }else{
 			echo "All parameter must be sent!!!";
 		    }
 	    }
    }
    public function izlistajRedove()
    {
         
           $query="SELECT * FROM contacts";
           $result=mysqli_query($this->conn,$query);
          if(mysqli_num_rows($result)> 0){
           while($row=mysqli_fetch_assoc($result)){
          ?>
           <div id="result">
             <a href="?id=<?php echo$row['id'] ?>"><img src="img/remove.png"></a>
             <p><b>Name: </b><?php echo$row['fname'] ." ". $row['lname'];?></p>
             <p><b>Tel: </b><?php echo$row['tel'];?></p>
           </div>

          <?php  
        }
        }else{
        echo "No contacts";
        }

    }
 

    public function ukloniRedove()
    {
        
        $id=$_GET['id'];  
        $query="DELETE FROM contacts WHERE id={$id}";
        mysqli_query($this->conn,$query);
        

    }

   

}


   