<?php
$vin=$_POST['vin'];
$year=$_POST['year'];
$size=$_POST['size'];
$ty=$_POST['ty'];
$seat=$_POST['seat'];
$door=$_POST['door'];
$fuel= $_POST['fuel'];
$rnmbr=$_POST['rnmbr'];
$target = "welcome.html";
$linkname = "mylink";

echo "Vehicle indetification number: ".$vin."<br/>";
echo "Registered year: ".$year."<br/>";
echo "Size: " .$size."<br/>";
echo "Transmission Type: ".$ty."<br/>";
echo "No of seats: ".$seat."<br/>";
echo "No of Door: ".$door."<br/>";
echo "Fuel type: ".$fuel."<br/>";
echo "Registration number: ".$rnmbr;
echo "<br/>New Car Added Successfully, ";

require('mysql_connect.php');
$db_connnection = mysqli_connect('localhost', 'root',
'mynameisJeff');
mysqli_select_db($db_connection, 'sswd');
mysqli_set_charset($db_connection, 'utf8');

$vin = mysqli_real_escape_string($db_connection, $_POST['vin']);
$year = mysqli_real_escape_string($db_connection, $_POST['year']);
$size = mysqli_real_escape_string($db_connection, $_POST['size']);
$ty = mysqli_real_escape_string($db_connection, $_POST['ty']);
$seat = mysqli_real_escape_string($db_connection, $_POST['seat']);
$door = mysqli_real_escape_string($db_connection, $_POST['door']);
$fuel = mysqli_real_escape_string($db_connection, $_POST['fuel']);
$rnmbr = mysqli_real_escape_string($db_connection, $_POST['rnmbr']);

$errors = array();

$sql = "INSERT INTO carList (vin, year, size, ty, seat, door, fuel, rnmbr)
    VALUES ('$vin','$year','$size','$ty','$seat','$door','$fuel','$rnmbr')";

if(mysqli_query($db_connection, $sql)){
    echo "Car added successfully.";

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db_connection);
}

?>
