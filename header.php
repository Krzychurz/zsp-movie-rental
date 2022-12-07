<?php
session_start();
$con = new mysqli("localhost","root","","mydb");
$res = $con->query($sql);
$row = $res->fetch_all(MYSQLI_ASSOC);
?>
