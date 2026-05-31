<?php
include 'db.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']); // secure number

    $delete = mysqli_query($conn, "DELETE FROM events WHERE id=$id");

    if($delete){
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Delete Failed: " . mysqli_error($conn);
    }
} else {
    echo "No ID Found!";
}
?>