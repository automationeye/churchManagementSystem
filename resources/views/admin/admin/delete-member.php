<?php 

require_once "../connection.php";

$id =  $_GET["id"];

$sql = "DELETE FROM member WHERE id = $id ";

mysqli_query($conn , $sql); 

header("Location: manage-member.php?delete-success-where-id=" .$id );


?>
