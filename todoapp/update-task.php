<?php
require_once('C:\xampp\htdocs\todoapp\dbconfig\dbconfig.php');
require_once('C:\xampp\htdocs\todoapp\functions\TaskController.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
<h1><center>UPDATE TO DO LIST</center></h1>

<?php
$db = new DatabaseConnection;
if(isset($_GET['id']))
{
    $id = mysqli_real_escape_string($db->con, $_GET['id']);
    $task = new TaskController;
    $result = $task->edit($id);
    if($result)
    {
       
?>
<form method="POST" action="./functions/codeAuth.php" style="margin-left:350px;">
<input type="hidden" name="id" value="<?=$result['id']?>">
<label>
    <input type="textarea" style="width: 500px;" required placeholder="Enter something"
    name="task" value="<?=$result['task']?>">
</label>
<input type="submit" value="Update" name="update_task">
</form>
<?php
        }
        else{
            echo "<h4>Result not found</h4>";
        }
    }
    else{
      echo "<h4>No record found</h4>";
    }
    ?>