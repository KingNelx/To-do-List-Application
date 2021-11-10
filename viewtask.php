<?php
require_once 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Todo List</title>
</head>

<body>
    <div class="container my-5">
        <h2 class = "my-5">Things to do...</h2>
        <table class="table table-striped table-hover table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Task Number</th>
                    <th scope="col">Task Name</th>
                    <th scope="col">Set Time (24hr Format)</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM task";
                $result = mysqli_query($connect, $sql);
                if (!$result) {
                    echo "NO DATA WERE FOUND OR NO QUERY WERE MATCHED IN THE SERVER";
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                            
                        $myTask = $row['taskNumber'];
                        $taskTime = $row['taskTime'];
                        echo '<tbody>
            <tr>
            <th scope="row">' . $myTask . '</th>
            <td>' . $row['taskName'] . '</td>
            <td>' . $row['taskTime'] . '</td>
            <td>
            <button class = "btn btn-primary"> <a href="update.php?id=' .$myTask . '" class="text-light text-decoration-none">Update Task</a></button>
            <button class = "btn btn-danger"> <a href="delete.php?id=' .$myTask. '" class="text-light text-decoration-none">Delete Task</a></button>
            </td>
            
                </tbody>';
                    }
                }

                mysqli_close($connect);
                ?>
            </tbody>
        </table>
        <div class="container text-center">
            <button class="btn btn-primary my-5"><a href="addTask.php" class="text-light text-decoration-none">Add new Task</a></button>
        </div>
    </div>
</body>

</html>
