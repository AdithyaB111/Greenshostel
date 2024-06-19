<?php
// Assuming you have a database connection already established
// Include your database configuration file
include("./php/config.php");

// Retrieve the email and button number from the POST request and sanitize them
$email = mysqli_real_escape_string($con, $_POST['email']);
$buttonNumber = mysqli_real_escape_string($con, $_POST['buttonNumber']);

// Prepare and execute the SQL query to insert the email into the database
$query = "INSERT INTO srequest (lemail, semail) VALUES ('$buttonNumber', '$email')";
if(mysqli_query($con, $query)) {
    // If insertion is successful, show a confirmation message
    echo 'Booking sent successfully';
} else {
    // If insertion fails, handle the error
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>