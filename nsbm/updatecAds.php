<?php
include_once './php/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $id = $_POST['id'];
    $confirm = isset($_POST['confirm']) ? 1 : 0; // Check if the checkbox is checked

    // Prepare and execute the SQL query to update the confirm field
    $query = "UPDATE ads SET confirm = '$confirm' WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // If the update was successful, redirect back to the previous page
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        // If an error occurred during the update, display an error message
        echo "Error updating record: " . mysqli_error($con);
    }
} else {
    // If the form is not submitted via POST method, redirect to an error page
    header("Location: error.php");
    exit();
}
?>