<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'databasepearcom.mysql.database.azure.com', 'database_PearCom@databasepearcom', 'com_pear25', 'itflab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$id = $_GET['id'];
$sql = "delete from Guestbook where ID = '$id'";


if (mysqli_query($conn, $sql)) {
    echo "Delete!!!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>
