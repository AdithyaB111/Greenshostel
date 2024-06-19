<?php 
session_start();

include("./php/config2nd.php");
include("./php/config.php");
if(!isset($_SESSION['valid'])){
    header("Location: index.php");
    exit(); 
}




$result = mysqli_query($con, "SELECT lat, lon, name FROM ads WHERE confirm='1'");

$locations = array();
while($row = mysqli_fetch_assoc($result)) {
    $locations[] = array(
        'lat' => $row['lat'],
        'lon' => $row['lon'],
        'name' => $row['name']
    );
}

$locations_json = json_encode($locations);
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v8.2.0/ol.css">
    <script src="https://cdn.jsdelivr.net/npm/ol@v8.2.0/dist/ol.js"></script>

    <script src="https://cdn.maptiler.com/maptiler-sdk-js/v1.2.0/maptiler-sdk.umd.js"></script>
    <link href="https://cdn.maptiler.com/maptiler-sdk-js/v1.2.0/maptiler-sdk.css" rel="stylesheet" />

    <style>
    body {
        margin: 0;
        padding: 0;
    }

    .map_class {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80%;
        height: 80vh;
        margin: 50px;
    }

    #map {
        position: absolute;
        width: 100%;
        top: 0;
        bottom: 0;
    }

    .logoutlinks {
        background: #dd3838;

    }

    .logoutlinks .btn {
        color: #fff !important;
    }

    #results {
        position: absolute;
        top: 0;
        left: 0;
        width: 30%;
        overflow: auto;
        background:
            rgba(255, 255, 255, 0.8);
    }

    #results ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    #results ul li {
        padding: 10px;
        cursor: pointer;
        border-bottom: 1px solid gray;
    }

    #results ul li:hover {
        color:
            gray;
    }

    #results ul li:last-child {
        border-bottom-width: 0;
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
                        Student Account
                    </h1>
                </div>
            </div>

        </div>
        <div>
            <?php
                    
                    include_once './php/config.php';
                    $email = $_SESSION['valid'];
                    $result = mysqli_query($con,"SELECT * FROM srequest WHERE semail='$email'");
                    ?>

            <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
            <table class='table table-bordered table-striped'>

                <tr>
                    <td>Landlord Email</td>
                    <td>Status</td>

                </tr>
                <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                    <td><?php echo $row["lemail"]; ?></td>
                    <td><?php echo $row["confirm"]; ?></td>

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

        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">
                Map
            </h6>
            <h1 class="mb-5">
                All the
                <span class="text-primary text-uppercase"> Locations </span>of Rooms
            </h1>
        </div>
        <!-- Page Header End -->

        <div class="map_class">
            <div id="map"></div>


        </div>


        <div class="container-xxl py-5">
            <div class="container" id="upperratings">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">
                        Rooms
                    </h6>
                    <h1 class="mb-5">
                        Here
                        <span class="text-primary text-uppercase"> All available </span>Rooms
                    </h1>
                </div>
                <div class="row g-4">
                    <?php
                    
                    include_once './php/config.php';
                    $email = $_SESSION['valid'];
                    $result = mysqli_query($con,"SELECT * FROM ads WHERE confirm='1'");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>

                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="<?php echo $row["imgurl"]; ?>" alt="" />
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"><?php echo $row["name"]; ?></h5>
                                    <div class="ps-2">
                                        4.9 <small class="fa fa-star text-primary"></small>
                                    </div>
                                </div>

                                <p class="text-body mb-3">
                                    <?php echo $row["about"]; ?>
                                </p>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-sm btn-primary rounded py-2 px-4 book" href=""
                                        data-value="<?php echo $row["email"]; ?>">Book</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $i++;
                    }
                    ?>

                </div>

                <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
            </div>
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


    <script>
    maptilersdk.config.apiKey = 'wKr9aUVpTcakZUavPyIj';
    const map = new maptilersdk.Map({
        container: 'map',
        style: maptilersdk.MapStyle.STREETS,
        center: [79.861244, 6.927079],
        zoom: 11
    });

    const savedLocations = <?php echo $locations_json; ?>;

    map.on('load', () => {
        map.addSource('search-results', {
            type: 'geojson',
            data: {
                "type": "FeatureCollection",
                "features": []
            }
        });

        map.addLayer({
            'id': 'point-result',
            'type': 'symbol', // Use 'symbol' type for icon-based markers
            'source': 'search-results',
            'layout': {
                'icon-image': 'icon-marker', // Name of the icon image
                'icon-size': 1, // Adjust icon size as needed
                'icon-anchor': 'bottom', // Anchor point of the icon
                'text-field': '{place_name}', // Display place name as text
                'text-font': ['Open Sans Regular'], // Font for place name text
                'text-offset': [0, -4], // Offset of place name text
                'text-anchor': 'top' // Anchor point of place name text
            }
        });

        // Add the icon image to the map resources
        map.loadImage('img/icons8-pin-32.png', function(error, image) {
            if (error) throw error;
            map.addImage('icon-marker', image);
        });
    });
    </script>

    <script>
    const savedLocations = <?php echo $locations_json; ?>;
    </script>

    <script>
    map.on('click', async (e) => {
        const {
            lng,
            lat
        } = e.lngLat;

        // Create a GeoJSON object to store all locations
        const features = savedLocations.map(location => ({
            type: 'Feature',
            geometry: {
                type: 'Point',
                coordinates: [location.lon, location.lat]
            },
            properties: {
                place_name: location.name
            }
        }));

        const results = {
            type: 'FeatureCollection',
            features: features
        };

        // Use the results for updating map and UI
        const map = e.target;
        map.getSource('search-results').setData(results);

        // Calculate bounds to fit all points
        let bounds = new maptilersdk.LngLatBounds();
        features.forEach(feature => bounds.extend(feature.geometry.coordinates));
        map.fitBounds(bounds, {
            padding: 50
        });

        // Update the list with all locations
        const resultList = features.map((feature) => {
            return `<li onClick="zoomToLocation(${feature.geometry.coordinates[0]}, ${feature.geometry.coordinates[1]})">${feature.properties.place_name}</li>`;
        });
        document.getElementById('search-results').innerHTML = resultList.join('');
    });

    function zoomToLocation(lon, lat) {
        map.flyTo({
            center: [lon, lat],
            zoom: 19
        });
    }
    </script>



    <script>
    document.querySelectorAll('.book').forEach(function(button) {
        button.addEventListener('click', function() {
            var buttonNumber = this.getAttribute('data-value');
            saveEmailPrompt(buttonNumber);
        });
    });

    function saveEmailPrompt(buttonNumber) {
        var email = prompt('Please enter your email:');
        if (email !== null && email !== '') {
            saveEmailToDatabase(email, buttonNumber);
        }
    }

    function saveEmailToDatabase(email, buttonNumber) {
        var xhr = new XMLHttpRequest();
        var url = 'saveEmail.php';
        var params = 'email=' + encodeURIComponent(email) + '&buttonNumber=' + encodeURIComponent(buttonNumber);

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText);
            }
        }
        xhr.send(params);
    }
    </script>
</body>

</html>