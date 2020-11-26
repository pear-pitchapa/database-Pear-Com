<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'databasepearcom.mysql.database.azure.com', 'database_PearCom@databasepearcom', 'com_pear25', 'itflab', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM GuestBook WHERE id='$id'");
$row=mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $ID = $_GET['ID'];
    $Name = $_POST['Name'];
    $Comment = $_POST['Comment'];
    $Link = $_POST['Link'];
    $update = "UPDATE Guestbook set Name='$Name', Comment='$Comment', Link='$Link' Where ID='$ID' ";

    if(mysqli_query($conn, $update)){
        header("location:show.php");
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/c
ss/bootstrap.min.css" integrity="sha384-
TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="a
nonymous">
	<title>Comment Form</title>
</head>
<body>
  <form action = "" method = "post" id="CommentForm" >
    <div class = "container">
      <div class = "row">
        <div class = "col-4">
    Name:<br>
    <input type="text" class = "form-control" name = "name" id="idName" value="<?=$row['Name'];?>" > <br>
        </div>
        <div class = "col-4">
    Comment:<br>
    <input type="text" class = "form-control" name = "comment" id="idComment" value="<?=$row['Comment'];?>"> <br>
        </div>
        <div class = "col-4">
    Link:<br>
    <input type="text" class = "form-control" name = "link" id="idLink" value="<?=$row['Link'];?>"> <br><br>
        </div>
        <input name="submit" type="submit" class="btn btn-primary" id="commentBtn">
      </div>
    </div>
  </form> 
</body>
</html>
