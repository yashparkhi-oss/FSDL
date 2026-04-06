<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db.php";

if(!isset($_GET['id'])){
    die("No record selected");
}

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM student WHERE id=$id");
$row = $result->fetch_assoc();

if(!$row){
    die("Record not found");
}

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $department = $_POST['department'];

    $conn->query("
        UPDATE student 
        SET name='$name',
            email='$email',
            mobile='$mobile',
            department='$department'
        WHERE id=$id
    ");

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: linear-gradient(120deg,#1f2937,#111827);
    margin:0;
    color:white;
}

header{
    text-align:center;
    padding:20px;
    background:#0f172a;
    font-size:24px;
    font-weight:bold;
}

.container{
    width:40%;
    margin:50px auto;
}

.card{
    background:white;
    color:black;
    padding:20px;
    border-radius:10px;
    box-shadow:0 5px 15px rgba(0,0,0,0.3);
}

input{
    width:100%;
    padding:10px;
    margin:8px 0;
    border-radius:5px;
    border:1px solid #ccc;
}

button{
    padding:10px;
    width:100%;
    background:#2563eb;
    color:white;
    border:none;
    border-radius:5px;
    font-weight:bold;
    cursor:pointer;
}

button:hover{
    background:#1d4ed8;
}

.back{
    margin-top:10px;
    text-align:center;
}

.back a{
    text-decoration:none;
    color:#2563eb;
    font-weight:bold;
}

</style>
</head>

<body>

<header>Edit Student Record</header>

<div class="container">

<div class="card">

<form method="post">

<input type="text" name="name" value="<?= $row['name']; ?>" required>

<input type="email" name="email" value="<?= $row['email']; ?>" required>

<input type="text" name="mobile" value="<?= $row['mobile']; ?>" required>

<input type="text" name="department" value="<?= $row['department']; ?>" required>

<button name="update">Update Student</button>

</form>

<div class="back">
<a href="index.php">← Back to Records</a>
</div>

</div>

</div>

</body>
</html>
