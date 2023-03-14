<?php
require_once("db_utils.php");
/* Getting demo_viewer table data */
$sql = "SELECT * FROM mytable";
$dogs = mysqli_query($mysqli, $sql);
$dogsArray = array();
while ($row = $dogs->fetch_assoc()) {
	$dogsArray[] = $row;
}
$dogsJSON = json_encode($dogsArray);
echo $dogsJSON;
?>