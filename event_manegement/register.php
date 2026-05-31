<?php
include 'db.php';
$event_id = $_GET['id'];

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$ticket_no = "TICKET".rand(1000,9999);

mysqli_query($conn, "INSERT INTO registrations (event_id,name,email,ticket_no)
VALUES ('$event_id','$name','$email','$ticket_no')");

header("Location: ticket.php?ticket=$ticket_no");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5 col-md-6">
<h3>Event Registration</h3>
<form method="POST" class="card p-4 bg-secondary">
<input type="text" name="name" placeholder="Your Name" class="form-control mb-3" required>
<input type="email" name="email" placeholder="Your Email" class="form-control mb-3" required>
<button name="submit" class="btn btn-warning">Register</button>
</form>
</div>

</body>
</html>