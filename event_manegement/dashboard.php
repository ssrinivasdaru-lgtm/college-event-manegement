<?php
include 'db.php';
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<h2>Admin Dashboard</h2>
<a href="add_event.php" class="btn btn-success">Add Event</a>
<a href="logout.php" class="btn btn-danger">Logout</a>
<hr>

<?php
$result = mysqli_query($conn, "SELECT * FROM events");
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='card p-3 mb-3'>";
    echo "<h4>".$row['title']."</h4>";
    echo "<p>".$row['description']."</p>";
    echo "<p>".$row['event_date']."</p>";
    echo "<a href='delete_event.php?id=".$row['id']."' 
class='btn btn-danger' 
onclick=\"return confirm('Are you sure you want to delete this event?')\">
Delete</a>";
    echo "</div>";
}
?>

</div>
</body>
</html>