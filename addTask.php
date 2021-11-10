<?php
require_once 'connect.php';
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Todo List!</title>
</head>

<body>

    <div class="container my-5">
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Input Task</label>
                <input type="text" class="form-control" name="myTask" placeholder="Input your Task." required>
                <div class="form-text">Add your given Task and set the Time to remind you about your task incase you miss it.</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Set Time</label>
                <input type="text" class="form-control" name="taskTime" placeholder="Set Time of the Task." required>
                <div class="form-text">24 hour format (ex. 21:00 == 9:00PM) </div>
            </div>

            <button class="btn btn-primary" name="submit">Update Task</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $myTask = mysqli_real_escape_string($connect, $_REQUEST['myTask']);
    $taskTime = mysqli_real_escape_string($connect, $_REQUEST['taskTime']);

    $sql = "INSERT INTO task (taskName, taskTime) VALUES ('$myTask', '$taskTime')";
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        die(mysqli_error($connect));
    } else {
        header('location: viewtask.php');
    }

    mysqli_close($connect);
}
?>
