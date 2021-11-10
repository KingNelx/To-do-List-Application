<?php
require_once 'connect.php';
    $taskId = $_GET['id'];
    if(isset($_REQUEST['id'])){
        $sql = "DELETE FROM task WHERE taskNumber = $taskId";
        $result = mysqli_query($connect, $sql);

        if(!$result){
            die(mysqli_error($connect));
        }else{
            header('location:viewtask.php');
        }
    }

    mysqli_close($connect);
?>
