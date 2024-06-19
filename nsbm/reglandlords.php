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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="./css/member.css">
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
                                <a href="./index.php" class="nav-item nav-link ">Home</a>
                                <a href="./room.php" class="nav-item nav-link">Rooms</a>
                                <a href="./contact.html" class="nav-item nav-link">Contact</a>
                                <a href="./Accounts.html" class="btn-primary py-4 px-md-5 active">
                                    Access Account
                                </a>
                            </div>

                            <!-- <a class="btn btn-primary py-4 px-md-5 d-none d-lg-block">
                  Load Account
                </a> -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Header End -->
        <div class="containerss">
            <div class="box form-box">

                <?php 
         
         include("./php/config2nd.php");
         include("./php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phoneno = $_POST['phoneno'];
            $town = $_POST['town'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT email FROM landlords WHERE email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo '<a href="javascript:self.history.back()"> <div class="links"><a class="btn" href="./registerto.php">Sign Up</a></div></a>';
         }
         else{
            mysqli_query($con,"INSERT INTO landlords(username, email, phoneno, town, password) VALUES('$username','$email','$phoneno', '$town','$password')") or die("Erroe Occured");
            echo '<script>';
            echo 'if(confirm("Registered successfully ! NOW Login..")) {';
            echo '  window.location.href = "loglandlords.php";';  
            echo '} else {';
            echo '}';
            echo '</script>';
         }

         }else{
         
        ?>
                <div class="msgBanner">
                    <div class="mb-5 mb-lg-0">
                        <h1 class="my-5 display-3 fw-bold ls-tight">
                            The best offer <br />
                            <span class="text-primary">for Landlords to share Hostel Ads</span>
                        </h1>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            The registered landlords/rental agencies can take picture(s) of
                            their properties, explain the available facilities, set the
                            location, rental, and advertise through the newly developed web
                            application
                        </p>
                    </div>
                </div>

                <form action="" method="post">
                    <header>Sign Up</header>
                    <div class="field input">
                        <input type="text" name="username" id="username" autocomplete="off" placeholder="Username"
                            required>
                    </div>

                    <div class="field input">
                        <input type="text" name="email" id="email" autocomplete="off" placeholder="Email" required>
                    </div>

                    <div class="field input">
                        <input type="text" name="phoneno" id="phoneno" autocomplete="off" placeholder="Phone No"
                            required>
                    </div>
                    <div class="field input">
                        <input type="text" name="town" id="town" autocomplete="off" placeholder="Home Town" required>
                    </div>
                    <div class="field input">
                        <input type="password" name="password" id="password" autocomplete="off" placeholder="Password"
                            required>
                    </div>

                    <div class="field btn">
                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                    <div class="links">
                        Already a member? <a href="./loglandlords.php">Sign In</a>
                    </div>

                    <div class="links">
                        Go to Home <a href="./index.php">Home</a>
                    </div>
                </form>
            </div>

            <?php } ?>
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
</body>

</html>