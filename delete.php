<?php 
require "config.php";

$id = $_GET["id"];
mysqli_query($database, "DELETE FROM profile_tb WHERE id='$id'");

header("location:index.php");
?>