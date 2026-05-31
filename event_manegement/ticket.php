<?php
include 'db.php';
$ticket = $_GET['ticket'];
$result = mysqli_query($conn, "SELECT * FROM registrations WHERE ticket_no='$ticket'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>E-Ticket</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="card p-5 shadow-lg text-center">
<h2 class="text-success">E-Ticket</h2>
<hr>
<h4>Name: <?php echo $row['name']; ?></h4>
<h4>Email: <?php echo $row['email']; ?></h4>
<h4>Ticket No: <?php echo $row['ticket_no']; ?></h4>
<p class="text-muted">Show this ticket at event entry.</p>
</div>
</div>

</body>
</html>