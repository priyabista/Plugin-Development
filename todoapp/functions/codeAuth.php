<?php
require_once('C:\xampp\htdocs\todoapp\dbconfig\dbconfig.php');
require_once('C:\xampp\htdocs\todoapp\functions\TaskController.php');
$db = new DatabaseConnection;

if(isset($_POST['submit']))
{
    $inputData = [
        'task' => mysqli_real_escape_string($db->con,$_POST['task'])
    ];

    $task = new TaskController;
    $result = $task->create($inputData);

    if($result)
    {
        echo "Task added sucessfully";
    }
    else{
        echo "Failed to add task";
    }
}

if(isset($_POST['update_task'])){
    $id = mysqli_real_escape_string($db->con,$_POST['id']);
    $inputData= [
         'task' => mysqli_real_escape_string($db->con, $_POST['task'])
    ];
    $task = new TaskController;
    $result = $task->updateTask($inputData, $id);

    if($result){
        echo "Student updated Sucessfully";
        header("Location: ../index.php");
    }
    else
    {
       echo "Student Not Updated";
      
    }


}

if(isset($_POST['deleteTask']))
{
    $id = mysqli_real_escape_string($db->con, $_POST['deleteTask']);
    $task = new TaskController;
    $result = $task->delete($id);
    if($result)
    {
        echo "Task Deleted";
        header("Location: ../index.php");
    }
    else{
        header("Location: ../index.php");
        exit(0);
    }
}
?>