<?php
session_start();
include("./functions/function.php");
if(!isset($_SESSION["AdminEmail"]) && !isset($_SESSION["UserName"])){
    if (isset($_GET['signup']) && $_GET['signup'] == "success" && !isset($_SESSION['logup_shown'])) {
        echo '<div class="alert_msg2 show">
        <i class="bi bi-check-lg"></i>
            <span class="fa-solid fa-circle-check text-success "></span>
            <span class="msg" text-success >Success: Sign Up successfully</span>
        </div>';
        $_SESSION['signup_shown'] = true;
    }else if (isset($_GET['logout']) && $_GET['logout'] == "success" && !isset($_SESSION['logout_shown'])) {
        echo '<div class="alert_msg2 show">
            <i class="bi bi-check-lg"></i>
            <span class="fa-solid fa-circle-check text-success "></span>
            <span class="msg" text-success >Success: Logout successfully</span>
        </div>';
        $_SESSION['logout_shown'] = true;
    }else if (isset($_GET['login']) && $_GET['login'] == "failed" && !isset($_SESSION['error_shown'])) {
        echo '<h3>hjksdhfsjkdhjf</h3>';
        $_SESSION['error_shown'] = true;
    } else if (isset($_GET['login']) && $_GET['login'] == "not_exit" && !isset($_SESSION['error_exit'])){
        echo '<div class="alert_msg show">
            <span class="fas fa-exclamation-circle text-danger"></span>
            <span class="msg text-danger ">Warning: Your valid not exit!</span>
        </div>';
        $_SESSION['error_exit'] = true;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .alert_msg {
        background: #fff;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 20px 40px;
        max-width: 480px;
        position: fixed;
        right: 0;
        top: 10px;
        border-radius: 4px;
        border-left: 8px solid #ffa502;
        z-index: 1000;
        overflow: hidden;
    }

    .alert_msg.show {
        animation: show_slide 1s ease forwards;
    }

    @keyframes show_slide {
        0% {
            transform: translateX(100%);
        }

        40% {
            transform: translateX(-10%);
        }

        80% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-10%);
        }
    }

    .alert_msg.hide {
        display: none;
    }

    .alert_msg .fa-exclamation-circle {
        position: absolute;
        top: 50%;
        left: 20px;
        font-size: 30px;
        transform: translateY(-50%);
    }

    .alert_msg .msg {
        font-size: 18px;
        color: #ce8500;
        padding: 0 20px;
    }

    .alert_msg2 {
        background: #fff;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        padding: 20px 40px;
        max-width: 480px;
        position: fixed;
        right: 0;
        top: 10px;
        border-radius: 4px;
        border-left: 8px solid #198754;
        z-index: 1000;
        overflow: hidden;
    }

    .alert_msg2.show {
        animation: show_slide 1s ease forwards;
    }

    @keyframes show_slide {
        0% {
            transform: translateX(100%);
        }

        40% {
            transform: translateX(-10%);
        }

        80% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-10%);
        }
    }

    .alert_msg2.hide {
        display: none;
    }

    .alert_msg2 .fa-circle-check {
        position: absolute;
        top: 50%;
        left: 20px;
        font-size: 30px;
        transform: translateY(-50%);
    }

    .alert_msg2 .msg {
        font-size: 18px;
        color: #198754;
        padding: 0 20px;
    }
    </style>
</head>

<body>

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <form action="./middleware/adminSignin.php" method="post">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="./index.php" class="">
                                    <h4 class="text-primary"><img src="./img/books.png" alt=""
                                            style="width: 45px; height: 45px;"> Library
                                    </h4>
                                </a>
                                <h3>Sign In</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" name="email"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" name="pass"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                            <p class="text-center mb-0">Don't have an Account? <a href="./signup.php">Sign Up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-qFOQ9YFAeGj1gDOuUD61g3D+tLDv3u1ECYWqT82WQoaWrOhAY+5mRMTTVsQdWutbA5FORCnkEPEgU0OF8IzGvA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
    const alertMsg = $(".alert_msg");

    if (alertMsg.length) {
        // Show the alert
        alertMsg.fadeIn();

        // Set a timeout to hide the alert after 5 seconds
        setTimeout(function() {
            alertMsg.fadeOut();
        }, 5000);
    }

    const alertMsg2 = $(".alert_msg2");

    if (alertMsg2.length) {
        // Show the alert
        alertMsg2.fadeIn();

        // Set a timeout to hide the alert after 5 seconds
        setTimeout(function() {
            alertMsg2.fadeOut();
        }, 5000);
    }
    </script>
</body>

</html>
<?php 
}else{
  header("Location: ./dashboard.php");
}
    ?>