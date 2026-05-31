<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title>Events</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<h2 class="text-center">Upcoming Events</h2>
<hr>

<?php
$result = mysqli_query($conn, "SELECT * FROM events");
while($row = mysqli_fetch_assoc($result)){
echo "<div class='card p-3 mb-3'>";
echo "<h4>".$row['title']."</h4>";
echo "<p>".$row['description']."</p>";
echo "<p>Date: ".$row['event_date']."</p>";
echo "<a href='register.php?id=".$row['id']."' class='btn btn-primary'>Register</a>";
echo "</div>";
}
?>

</div>
</body>
</html>