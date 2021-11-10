<?php

    $connect = new mysqli ('localhost:3309', 'root', '', 'todolist');


    if(!$connect){
        die(mysqli_error($connect));
    }
?>
