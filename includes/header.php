<?php
include("./functions/function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Library Management System</title>
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
        z-index: 1000000000;
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
        z-index: 1000000000;
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