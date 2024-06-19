<?php 
   session_start();
   include_once './php/config.php';
   include("./php/config2nd.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>UNILODGE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/styleaccess.css" rel="stylesheet" />

    <style>
    table {
        margin-bottom: 200px !important;
        display: flex;
        justify-content: center;
        width: 96% !important;
    }

    .logoutlinks {
        width: 150px;
        background: #2fc5a4;

    }

    .logoutlinks .btn {
        color: #fff !important;
    }

    button {
        width: 30px;
        height: 30px;
        border-radius: 5px;
    }

    .card {
        width: 100%;
        height: 50vh;
    }

    small {
        color: #2fc5a4;
    }
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Header Start -->
        <div class="container-fluid bg-dark px-0">
            <div class="row gx-0">
                <div class="col-lg-3 bg-dark d-none d-lg-block">
                    <a href="index.php"
                        class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                        <h1 class="m-0 text-primary text-uppercase">UNILODGE</h1>
                    </a>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                        <a href="index.php" class="navbar-brand d-block d-lg-none">
                            <h1 class="m-0 text-primary text-uppercase">UNILODGE</h1>
                        </a>
                        <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="./index.php" class="nav-item nav-link">Home</a>
                                <a href="./room.php" class="nav-item nav-link">Rooms</a>
                                <a href="./contact.html" class="nav-item nav-link">Contact</a>
                                <a href="./Accounts.html" class="btn-primary py-4 px-md-5">
                                    Access Account
                                </a>
                            </div>

                            <a href="">
                                <div class="logoutlinks"><a class="btn" href="./php/logout.php">Log Out</a></div>
                            </a>
                            <!-- <a class="btn btn-primary py-4 px-md-5 d-none d-lg-block">
                  Load Account
                </a> -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->
        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/locations1\(2\).jpg)">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">
                        Landlords Account
                    </h1>
                </div>
            </div>

        </div>
        <a class="btn">Published Ads</a>
        <small>When you click the delete button(<i class="bi bi-trash-fill"></i>) it will permanently deleted
            ..!</small>
        <div style="margin: 20px;">
            <a href="">
                <div class="logoutlinks"><a class="btn" href="./addAds.php">Add Ads</a></div>
            </a>


            <!-- Page Header End -->
            <?php
                    
                    include_once './php/config.php';
                    $email = $_SESSION['valid'];
                    $result = mysqli_query($con,"SELECT * FROM ads WHERE email='$email'");
                    ?>

            <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
            <table class='table table-bordered table-striped'>

                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Image</td>
                    <td>Longitude</td>
                    <td>Latitude</td>
                    <td>About</td>
                    <td>Confirm</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["imgurl"]; ?></td>
                    <td><?php echo $row["lon"]; ?></td>
                    <td><?php echo $row["lat"]; ?></td>
                    <td><?php echo $row["about"]; ?></td>
                    <td><?php echo $row["confirm"]; ?></td>
                    <td>
                        <form action="edit.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            <button type="submit"><i class="bi bi-pencil"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            <button type="submit"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    </td>
                </tr>
                <?php
                    $i++;
                    }
                    ?>
            </table>
            <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
        </div>

        <!-------------------------------------------------- -->

        <a class="btn">Requested List from students</a>
        <small>When you click the check box it will mark as selected ..!</small>
        <div style="margin: 20px;">



            <!-- Page Header End -->
            <?php
                    
                    include_once './php/config.php';
                    $email = $_SESSION['valid'];
                    $result = mysqli_query($con,"SELECT * FROM srequest WHERE lemail='$email'");
                    ?>

            <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
            <table class='table table-bordered table-striped'>

                <tr>
                    <td>Id</td>
                    <td>Student Email</td>
                    <td>Confirm</td>
                    <td>Mark</td>
                </tr>
                <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["semail"]; ?></td>
                    <td><?php echo $row["confirm"]; ?></td>
                    <td>
                        <form id="confirmForm<?php echo $i; ?>" action="update_confirm.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            <input type="checkbox" name="confirm" value="1"
                                <?php if ($row["confirm"] == 1) echo "checked"; ?>
                                onchange="document.getElementById('confirmForm<?php echo $i; ?>').submit()">
                        </form>
                    </td>
                </tr>
                <?php
                    $i++;
                    }
                    ?>
            </table>
            <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
        </div>
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-primary rounded p-4">
                            <a href="index.html">
                                <h1 class="text-white text-uppercase mb-3">UNILODGE</h1>
                            </a>
                            <p class="text-white mb-0">
                                stay with us UNILODGE – Fast, attention of new visitors upon
                                your stay launch.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">
                            Contact
                        </h6>
                        <p class="mb-2">
                            <i class="fa fa-map-marker-alt me-3"></i>123 Homagama, Pitipana
                            North, Colombo
                        </p>
                        <p class="mb-2">
                            <i class="fa fa-phone-alt me-3"></i>+012 345 67890
                        </p>
                        <p class="mb-2">
                            <i class="fa fa-envelope me-3"></i>info@gmail.com
                        </p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>