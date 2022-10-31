<?php
//INCLUDE DATABASE FILE
include('database.php');
//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();




//ROUTING
if (isset($_POST['save']))        saveTask();
if (isset($_POST['update']))      updateTask();
if (isset($_POST['delete']))      deleteTask();


function getTasks()
{
    global $conn;
    $sql = "SELECT tasks.*,types.name as type,statuses.name as status,priorities.name as priority 
    from tasks , types , statuses , priorities 
    where tasks.type_id=types.id and tasks.status_id=statuses.id and tasks.priority_id=priorities.id";

    $res = mysqli_query($conn, $sql);
    return $res;
    //CODE HERE
    //SQL SELECT

}

function saveTask()
{
    global $conn;
    //CODE HERE
    $title = $_POST['title'];
    $type = $_POST['task-type'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    $sql = "INSERT INTO tasks
    ( title, type_id, priority_id, status_id, task_datetime, description)
    VALUES
    ('$title','$type','$priority','$status','$date','$description')";

    mysqli_query($conn, $sql);

    //SQL INSERT
    $_SESSION['message'] = "Task has been added successfully !";
    header('location: index.php');
}

function updateTask()
{
    //CODE HERE
    //SQL UPDATE
    $_SESSION['message'] = "Task has been updated successfully !";
    header('location: index.php');
}

function deleteTask()
{
    global $conn;
    $id = $_POST["task-id"];
    $sql = "DELETE FROM `tasks` WHERE id=$id";

    mysqli_query($conn, $sql);
    //CODE HERE
    //SQL DELETE
    $_SESSION['message'] = "Task has been deleted successfully !";
    header('location: index.php');
}
