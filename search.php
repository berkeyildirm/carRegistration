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

		if (empty($_GET["rnmbr"])) {
			 echo "Registration Number is required";
		}
		else {
		$rnmbr = ($_GET["rnmbr"]);
		echo "<br>The car's Registration Number: ".$rnmbr."<br>";
			if (!preg_match("/^[0-9]*$/",$rnmbr)) {
			}
		}

		if(!empty($_GET["rnmbr"])){

			$query = "SELECT * FROM carList WHERE rnmbr ='$rnmbr'";
			$result = @mysqli_query($db_connection, $query);

			if(@mysqli_num_rows($result)>0){
				while($row = @mysqli_fetch_assoc($result)){
					echo "<br><br>Vehicle Identification Number: ".$row["vin"]."<br>Year: ".$row["year"]."<br>Size: ".$row["size"];
					echo "<br>Transmission Year: ".$row["ty"]."<br>Seat: ".$row["seat"]."<br>Door: ".$row["door"]."<br>Fuel: ".$row["fuel"]."<br>Registration Number: ".$row["rnmbr"];
				}
			}
			else { echo "This car has not been found";}

			mysqli_close($db_connection);
    }
  }
?>
