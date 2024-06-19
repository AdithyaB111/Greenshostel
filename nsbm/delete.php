<?php
include_once './php/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the ID of the record to be deleted
    $id = $_POST['id'];

    // Delete the record from the database
    $query = "DELETE FROM ads WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script>';
        echo 'if(confirm("you want delete item")) {';
        echo '  window.location.href = "landlords.php";';  
        echo '} else {';
        echo '  window.location.href = "landlords.php";';  
        echo '}';
        echo '</script>';
    } else {
        echo '<script>alert("Error deleting record: ' . mysqli_error($con) . '");</script>';
    }
} else {
    // Redirect if accessed directly without POST request
    header("Location: landlords.php");
    exit();
}
?>