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
    // $sql = "SELECT tasks.*,types.name as type,statuses.name as status,priorities.name as priority 
    // from tasks , types , statuses , priorities 
    // where tasks.type_id=types.id and tasks.status_id=statuses.id and tasks.priority_id=priorities.id";


    //requete sql =query
    $sql = " SELECT tasks.*, statuses.name as status, types.name as type, priorities.name as priority 
    from
        tasks
    inner join priorities on priorities.id = tasks.priority_id
    inner join statuses on statuses.id = tasks.status_id 
    inner join types on types.id = tasks.type_id";

    //execute query conextion requete
    $res = mysqli_query($conn, $sql);
    return $res;
    //CODE HERE
    //SQL SELECT

}
function counter($status_id)
{
    global $conn;
    // $sql = "SELECT tasks.*,types.name as type,statuses.name as status,priorities.name as priority 
    // from tasks , types , statuses , priorities 
    // where tasks.type_id=types.id and tasks.status_id=statuses.id and tasks.priority_id=priorities.id";


    //requete sql =query
    $sql = " SELECT count(id) as count from tasks where status_id = '$status_id' ";

    //execute query conextion requete
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($res);
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

    //execute query conextion requete
    mysqli_query($conn, $sql);

    //SQL INSERT
    $_SESSION['message'] = "Task has been added successfully !";
    header('location: index.php');
}

function updateTask()
{
    global $conn;
    //CODE HERE
    $title = $_POST['title'];
    $type = $_POST['task-type'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $id = $_POST['task-id'];


    $sql = "UPDATE `tasks` SET 
    `title`='$title',
    `type_id`='$type',
    `priority_id`='$priority',
    `status_id`='$status',
    `task_datetime`='$date',
    `description`='$description'
     WHERE
     `id`='$id'";  // input hidden 

    //execute query conextion requete
    mysqli_query($conn, $sql);

    //SQL INSERT
    $_SESSION['message'] = "Task has been updated successfully !";
    header('location: index.php');
}

function deleteTask()
{
    global $conn;

    // input hidden
    $id = $_POST["task-id"];
    $sql = "DELETE FROM `tasks` WHERE id=$id";

    mysqli_query($conn, $sql);
    //CODE HERE
    //SQL DELETE
    $_SESSION['message'] = "Task has been deleted successfully !";
    header('location: index.php');
}
