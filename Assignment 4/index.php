<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db.php";

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $department = $_POST['department'];

    $conn->query("INSERT INTO student(name,email,mobile,department)
    VALUES('$name','$email','$mobile','$department')");
}

$result = $conn->query("SELECT * FROM student");
?>

<!DOCTYPE html>
<html>
<head>
<title>Student CRUD System</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: linear-gradient(120deg,#1f2937,#111827);
    margin:0;
    padding:0;
    color:white;
}

header{
    text-align:center;
    padding:20px;
    background:#0f172a;
    font-size:24px;
    font-weight:bold;
    letter-spacing:1px;
}

.container{
    width:90%;
    margin:auto;
    margin-top:20px;
}

.card{
    background:white;
    color:black;
    padding:20px;
    border-radius:10px;
    margin-bottom:20px;
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
    padding:10px 15px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-weight:bold;
}

.add-btn{
    background:#16a34a;
    color:white;
}

.edit-btn{
    background:#2563eb;
    color:white;
}

.delete-btn{
    background:#dc2626;
    color:white;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}

th,td{
    padding:10px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

th{
    background:#0f172a;
    color:white;
}

tr:hover{
    background:#f3f4f6;
}

footer{
    text-align:center;
    padding:10px;
    background:#0f172a;
    margin-top:20px;
}

</style>
</head>

<body>

<header>
Student Management CRUD System
</header>

<div class="container">

<div class="card">
<h2>Add Student</h2>

<form method="post">

<input type="text" name="name" placeholder="Student Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="text" name="mobile" placeholder="Mobile Number" required>

<input type="text" name="department" placeholder="Department" required>

<button class="add-btn" name="add">Add Student</button>

</form>
</div>

<div class="card">

<h2>Student Records</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>Department</th>
<th>Actions</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>
<td><?= $row['id']; ?></td>
<td><?= $row['name']; ?></td>
<td><?= $row['email']; ?></td>
<td><?= $row['mobile']; ?></td>
<td><?= $row['department']; ?></td>

<td>
<a href="edit.php?id=<?= $row['id']; ?>">
<button class="edit-btn">Edit</button>
</a>

<a href="delete.php?id=<?= $row['id']; ?>" 
onclick="return confirm('Delete this record?')">
<button class="delete-btn">Delete</button>
</a>
</td>
</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>
