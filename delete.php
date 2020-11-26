<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'databasecommy01.mysql.database.azure.com', 'MasterM@databasecommy01', 'Mm093493', 'Database_Gear', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$id = $_GET['id'];
$sql = "delete from guestbook where id = '$id'";


if (mysqli_query($conn, $sql)) {
    echo "Delete!!!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>