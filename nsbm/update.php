<?php
include_once './php/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $imgurl = $_POST['imgurl'];
    $lon = $_POST['lon'];
    $lat = $_POST['lat'];
    $about = $_POST['about'];

    // Update the record in the database
    $query = "UPDATE ads SET name='$name', imgurl='$imgurl', lon='$lon', lat='$lat', about='$about' WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script>';
        echo 'if(confirm("Record updated successfully.")) {';
        echo '  window.location.href = "landlords.php";';  
        echo '} else {';
        echo '}';
        echo '</script>';
    } else {
        echo '<script>alert("Error deleting record: ' . mysqli_error($con) . '");</script>';
    }
} else {
    // Redirect if accessed directly without POST request
    header("Location: index.php");
    exit();
}
?>