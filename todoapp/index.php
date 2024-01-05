<?php
require_once('C:\xampp\htdocs\php-all-projects\todoapp\dbconfig\dbconfig.php');
require_once('C:\xampp\htdocs\php-all-projects\todoapp\functions\TaskController.php');

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
    
<h1 style="margin-top: 50px;"><center>TO DO LIST</center></h1>

<form method="POST" action="./functions/codeAuth.php" style="margin-left:350px;">
<label>
    <input type="textarea" style="width: 500px;" required placeholder="Enter something"
    name="task">
</label>
<input type="submit" value="Submit" name="submit">
</form>


<!-- displaying in table -->

<table class="table table-striped" style="width: 60%; margin-top: 30px; margin-left: 250px";>
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Task</th>
      <th scope="col">Created_at</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $task = new TaskController;
    $result = $task->index();
    if($result)
    {
        foreach($result as $row)
        {
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['task'] ?></td>
                <td><?= $row['created_at'] ?></td>
                <td>
                    <a href="update-task.php?id=<?=$row['id'];?>" class="btn btn-success">Edit</a>
                </td>
                <td>
                    <form action="./functions/codeAuth.php" method="POST">
                        <button type="submit" name="deleteTask" value="<?= $row['id'] ?>" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php
        }
    }else{
      echo "No record found";
    }
    ?>
  </tbody>
</table>
</body>
</html>