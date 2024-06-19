<?php
include_once './php/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the ID of the record to be edited
    $id = $_POST['id'];

    // Fetch the record from the database
    $query = "SELECT * FROM ads WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        // Fetch the record data
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $imgurl = $row['imgurl'];
        $lon = $row['lon'];
        $lat = $row['lat'];
        $about = $row['about'];

        // Display the edit form
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-top: 0;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    textarea {
        height: 100px;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Record</h2>
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>">
            <label for="imgurl">Image URL:</label>
            <input type="text" name="imgurl" id="imgurl" value="<?php echo $imgurl; ?>">
            <label for="lon">Longitude:</label>
            <input type="text" name="lon" id="lon" value="<?php echo $lon; ?>">
            <label for="lat">Latitude:</label>
            <input type="text" name="lat" id="lat" value="<?php echo $lat; ?>">
            <label for="about">About:</label>
            <textarea name="about" id="about"><?php echo $about; ?></textarea>
            <input type="submit" value="Update">
        </form>
    </div>
</body>

</html>
<?php
    } else {
        echo '<script>alert("Record not found.");</script>';
    }
} else {
    // Redirect if accessed directly without POST request
    header("Location: index.php");
    exit();
}
?>