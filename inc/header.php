<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo isset($_title) ? $_title . ' || ' . SITE_TITLE : 'Home || ' . SITE_TITLE; ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="Sunkoshi Rular Municapilaty">
  <meta name="author" content="ZeroIndustries">
  <meta name="keywords" content="SRM">
  <!-- Favicons -->
  <link rel='shortcut icon' href='<?php echo UPLOAD_URL . '/home/nepal.gif'; ?>' type='image/x-icon' />

  <!-- Bootstrap CSS File -->
  <link href="<?php echo LIB_URL . '/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo LIB_URL . '/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet">
  <link href="<?php echo LIB_URL . '/animate/animate.min.css' ?>" rel="stylesheet">
  <link href="<?php echo LIB_URL . '/ionicons/css/ionicons.min.css' ?>" rel="stylesheet">
  <link href="<?php echo LIB_URL . '/owlcarousel/assets/owl.carousel.min.css' ?>" rel="stylesheet">
  <!-- Main Stylesheet File -->
  <link href="<?php echo CSS_URL . '/style.css' ?>" rel="stylesheet">

</head>
<body>
  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <a href="<?php echo SITE_URL . '/index.php' ?>"><img style="max-width: 300px;" src="<?php echo UPLOAD_URL . '/home/logo.png'; ?>" style="padding-right: 60%;"></a>
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <button class="btn btn-link navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span aria-hidden="true"><img style="height: 40px;" src="<?php echo UPLOAD_URL . '/home/nepal.gif'; ?>"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php echo (getPagename() == 'index') ? 'active' : '' ?>" href="<?php echo SITE_URL . '/index.php' ?>"><i class="fa fa-home"></i></a>
          </li>
          <li class="nav-item dropdown <?php echo (getPagename() == 'organizational_info' || getPagename() == 'industrial_info' || getPagename() == 'about') ? 'active' : '' ?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Information
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item " href="<?php echo '../redirect/organizational_info.php' ?>">Organizational Information</a>
              <a class="dropdown-item " href="<?php echo '../redirect/industrial_info.php' ?>">Industrial Information</a>
              <a class="dropdown-item" href="<?php echo '../redirect/about.php' ?>">About Sunkoshi</a>
            </div>
          </li>
          <li class="nav-item <?php echo (getPagename() == 'news_and_events') ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo '../redirect/news_and_events.php' ?>">News and Events</a>
          </li>
          <li class="nav-item <?php echo (getPagename() == 'plans_policies') ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo '../redirect/plans_policies.php' ?>">Plans and Policies</a>
          </li>
          <li class="nav-item <?php echo (getPagename() == 'gallery') ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo '../redirect/gallery.php' ?>">Gallery</a>
          </li>
          <li class="nav-item">
            <?php
            if (isset($_SESSION, $_SESSION['Username']) && !empty($_SESSION['Username'])) {
              ?>
              <a class="nav-link" href="../cms/index.php">
                <i class="fa fa-user"></i> <?php echo $_SESSION["Username"] ?>
              </a>
            <?php
            } else {
              ?>
              <a class="nav-link" href="../cms/index.php"><i class="fa fa-user"></i> Login
              </a>
            <?php
            }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>