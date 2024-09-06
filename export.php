<?php
require('mysql_connect.php');
$db_connnection = mysqli_connect('localhost', 'root',
'mynameisJeff');
mysqli_select_db($db_connection, 'sswd');
mysqli_set_charset($db_connection, 'utf8');
if ($db_connnection->connect_error) {
  die("Connection failed: " . $db_connnection->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == "GET"){
	if(isset($_GET["delete"])){
		$rnmbr = ($_GET["rnmbr"]);
	}
}

if($_SERVER['REQUEST_METHOD'] == "GET"){
	if(isset($_GET['delete'])){
		$rnmbr = ($_GET["rnmbr"]);

    if(!empty($_GET["rnmbr"])){

      // shows the car informations that registered
      $query = "SELECT * FROM carList WHERE rnmbr ='$rnmbr'";
      $result = @mysqli_query($db_connection, $query);

      if(@mysqli_num_rows($result)>0){
        while($row = @mysqli_fetch_assoc($result)){
          echo "<br><br>Vin: ".$row["vin"]."<br>Year: ".$row["year"]."<br>Size: ".$row["size"];
          echo "<br>Transmission Year: ".$row["ty"]."<br>Seat: ".$row["seat"]."<br>Door: ".$row["door"]."<br>Fuel: ".$row["fuel"]."<br>Registration Number: ".$row["rnmbr"];
        }
      }
      else { echo "This car has not been found";}

      //deletes the input
			$query = "DELETE FROM carList WHERE rnmbr = $rnmbr";
			$result = @mysqli_query($db_connection, $query);

			if($result){
				echo "<br>Success in deleting '" . $rnmbr. "'";
			}
			else { echo "0 results".mysqli_error($db_connection);}
		mysqli_close($db_connection);
	}
}
}
?>
