<?php
$servername = "localhost";
$username = "root";
$password = "mynameisJeff";
$dbname = "sswd";

$db_connnection = new mysqli($servername, $username, $password, $dbname);
if ($db_connnection->connect_error) {
    die("Connection failed: " . $db_connnection->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == "GET"){
		if (empty($_GET["rnmbr"])) {
			 echo "Registration Number is required";
		}
		else {
		$rnmbr = ($_GET["rnmbr"]);
		echo "<br>The Registration Number you are looking for: ".$rnmbr."<br>";
			if (!preg_match("/^[0-9]*$/",$rnmbr)) {
			}
		}

		if(!empty($_GET["rnmbr"])){
			require('mysql_connect.php');

			$query = "SELECT * FROM carList WHERE rnmbr ='$rnmbr'";
			$result = @mysqli_query($db_connection, $query);

			if(@mysqli_num_rows($result)>0){
				while($row = @mysqli_fetch_assoc($result)){
					echo "<br><br>Vehicle Identification Number: ".$row["vin"]."<br>Size: ".$row["size"]."<br>Year: ".$row["year"];
					echo "<br>Transission Year: ".$row["ty"]."<br>Seat: ".$row["seat"]."<br>Door: ".$row["door"]."<br>Fuel: ".$row["fuel"]."<br>Registration Number: ".$row["rnmbr"];
				}
			}
			else { echo "This car has not been found.";}

			mysqli_close($db_connection);
		}
}
?>
