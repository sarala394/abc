<?php
include_once '../init.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
extract($_GET);
$db = dbConn();
$sql = "DELETE users, employee FROM users INNER JOIN employee ON users.UserId = employee.UserId WHERE users.UserId = '$userid'";
$db->query($sql);
//$result = $db->query($sql); (Optional)
header("Location:manage.php"); 
}
 
?>