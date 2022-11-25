<?php
session_start();
include 'dashboard/include/connection.php';


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>كتب pdf</title>
    <!-- bootstarp css -->
    <link rel="stylesheet" type="text/css" href="layout/css/bootstrap.min.css">
    <!-- bootstarp RLT -->
    <link rel="stylesheet" type="text/css" href="layout/css/bootstrap-rtl.css">
    <!--custom css  -->
    <link rel="stylesheet" type="text/css" href="layout/css/custom.css">
    <!-- icon -->
      <link rel="icon" type="image/png" href="layout/images/book.png">

</head>
<body>
<!-- Start navabar -->
<nav class="navbar navbar-expand-sm navbar-light">
    <div  class="container">
        <a href="index.php" class="navbar-brand">كتب  pdf</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"  id="menu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">الرئيسية</a>
                </li>
                
                <?php
                if (isset($_SESSION['adminInfo'])) {
                   ?>
                   <a href="dashboard/dashboard.php" target="_blank" class="dashboard-btn">لوحة التحكم </a>



                  <?php   
                 }



                ?>
            </ul>
        </div>
    </div>

</nav>
<!-- end navbar -->