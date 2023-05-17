<?php
$uid = $_GET['userid'];
$conn = mysqli_connect('localhost', 'root', '011212', 'db');
$sql = "select * from member where id='".$uid."'";
$result = mysqli_query($conn, $sql);
$member = $result->fetch_array();
echo isset($result[0]);
echo $result;
echo $member;
?>