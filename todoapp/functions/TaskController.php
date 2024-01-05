<?php
require_once('C:\xampp\htdocs\todoapp\dbconfig\dbconfig.php');
require_once('C:\xampp\htdocs\todoapp\functions\TaskController.php');
class TaskController{
    public function __construct(){
        $db = new DatabaseConnection;
        $this->con = $db->con;
    }

    public function create($inputData)
    {
        $task = $inputData['task'];

        $taskQuery = "INSERT INTO todoapplist (task) VALUES ('$task')";
        $result = $this->con->query($taskQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function index(){
        $selectQuery = "SELECT * FROM todoapplist";
        $result = $this->con->query($selectQuery);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function edit($id)
    {
        $id = mysqli_real_escape_string($this->con, $id);
        $editQuery = "SELECT * FROM todoapplist WHERE id= '$id' LIMIT 1";
        $result = $this->con->query($editQuery);
        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data;
        }else{
            return false;
        }
    }

    public function updateTask($inputData, $id){
        $id = mysqli_real_escape_string($this->con, $id);
        $task = $inputData['task'];

        $updateQuery = "UPDATE todoapplist SET task='$task' WHERE id='$id' LIMIT 1";
        $result= $this->con->query($updateQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $deleteQuery = "DELETE FROM todoapplist WHERE id='$id' LIMIT 1";
        $result= $this->con->query($deleteQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>