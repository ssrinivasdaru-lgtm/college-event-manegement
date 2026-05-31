<?php
include 'db.php';

if(isset($_POST['submit'])){
$title = $_POST['title'];
$desc = $_POST['description'];
$date = $_POST['date'];

mysqli_query($conn, "INSERT INTO events (title,description,event_date)
VALUES ('$title','$desc','$date')");

header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Event</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5 col-md-6">
<h3>Add Event</h3>
<form method="POST" class="card p-4 bg-secondary">
<input type="text" name="title" placeholder="Event Title" class="form-control mb-3" required>
<textarea name="description" placeholder="Description" class="form-control mb-3" required></textarea>
<input type="date" name="date" class="form-control mb-3" required>
<button name="submit" class="btn btn-warning">Add Event</button>
</form>
</div>

</body>
</html>