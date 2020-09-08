<?php   

 $host = "localhost";
 $db ="a3001736_scpapp";
 $user="a3001736_fintu";
 $pwd="finturaju123";


 $dsn ="mysql:host=$host; dbname=$db";

 try
 {
  $conn = new PDO($dsn, $user, $pwd);
 }
 catch(PDOexception $error)
 {
       echo "<h3>Error</h3>" . $error->getMessage();
 }

 $selectall="select * from scp ";
	$record=$conn->prepare($selectall);
	$record->execute();

?>
 























