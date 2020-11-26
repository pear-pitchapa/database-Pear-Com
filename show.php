<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/c
ss/bootstrap.min.css" integrity="sha384-
TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="a
nonymous">

<title>ITF Lab</title>
</head>
<body>
<?php
$conn = mysqli_init();
mysqli_real_connect($conn, 'databasecommy01.mysql.database.azure.com', 'MasterM@databasecommy01', 'Mm093493', 'Database_Gear', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$res = mysqli_query($conn, 'SELECT * FROM guestbook');
?>
<table width="600" border="1" class = "table">
    <thead class = "thead-dark">
        <tr>
            <th width="100"> <div align="center">Name</div></th>
            <th width="350"> <div align="center">Comment </div></th>
            <th width="150"> <div align="center">Link </div></th>
            <th width="50"> <div align="center">Change </div></th>
            
        </tr>
    </thead>
<?php
while($Result = mysqli_fetch_array($res))
{
?>
<tbody>
  <tr>
    <td><?php echo $Result['Name'];?></div></td>
    <td><?php echo $Result['Comment'];?></td>
    <td><?php echo $Result['Link'];?></td>
    <td width = "50"><div align="center" class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group" role="group" aria-label="First group">
    <a href="edit.php?id=<?= $Result['ID']; ?>" class="btn btn-warning">Edit</a>
    <a href="delete.php?id=<?= $Result['ID']; ?>" class="btn btn-danger">Delete</a>
    <a href="form.html" class="btn btn-primary">Add</a>
  </div>
        </div>
    </td>
    
    
  </tr>
</tbody>
<?php
}
?>
</table>
<?php
mysqli_close($conn);
?>
</body>
</html>