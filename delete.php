<?php

include 'Connection.php';

$conn = new Connection;

$getId = $_GET['id'];

$conn->update("DELETE FROM avenger WHERE id=$getId",null);

header("location:index.php");

?>
