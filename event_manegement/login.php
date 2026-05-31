<?php
include 'db.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($result) > 0){
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid Login!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5 col-md-4">
<h3 class="text-center">Admin Login</h3>
<form method="POST" class="card p-4 bg-secondary">
<input type="text" name="username" placeholder="Username" class="form-control mb-3" required>
<input type="password" name="password" placeholder="Password" class="form-control mb-3" required>
<button name="login" class="btn btn-warning">Login</button>
</form>
</div>

</body>
</html>