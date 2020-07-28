<?php
$off_id = $_SESSION['LoginId'];
$offic = new Officer();
$officer = $offic->getOfficerByLoginID($off_id);
$lg_id = $officer[0]->LoginId;
$login = new Login();
$lg_user = $login->getUserByLoginID($lg_id);
?>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE VIEW-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?php echo CMS_URL.'/dashbord.php';?>">
                            <img src="<?php echo ADMIN_IMG . '/icon/bt.png'; ?>" alt="" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <?php require  $_SERVER['DOCUMENT_ROOT'] . '/cms/' . lcfirst($_SESSION['Role']) . '/' . lcfirst($_SESSION['Role']) . '-sidebar-list.php'; ?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE VIEW-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar-desktop.php'; ?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP VIEW-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <img style="height:75px;" src="<?php echo ADMIN_IMG . '/icon/Capture.png'; ?>" />
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item">
                                        <span>
                                            <a href="<?php echo ADMIN_IMG . '/icon/nepal.gif'; ?>"><span> <img style="height:40px;" src="<?php echo ADMIN_IMG . '/icon/nepal.gif'; ?>" /></span></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="noti-wrap">
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <?php
                                                if (file_exists(UPLOAD_DIR . '/users/' . $lg_user[0]->Image) && $lg_user[0]->Image != '') {
                                                    ?>
                                                    <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo UPLOAD_URL . '/users/' . $lg_user[0]->Image; ?>" alt="<?php echo $lg_user[0]->Image; ?>">
                                                <?php
                                                } else {
                                                    ?>
                                                    <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo ADMIN_IMG . '/defaultuser.png';  ?>" alt="Default user">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="#"><?php echo $officer[0]->Name; ?></a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <?php
                                                        if (file_exists(UPLOAD_DIR . '/users/' . $lg_user[0]->Image) && $lg_user[0]->Image != '') {
                                                            ?>
                                                            <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo UPLOAD_URL . '/users/' . $lg_user[0]->Image; ?>" alt="<?php echo $lg_user[0]->Image; ?>">
                                                        <?php
                                                        } else {
                                                            ?>
                                                            <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo ADMIN_IMG . '/defaultuser.png';  ?>" alt="Default user">
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role'] . '/settings.php') ?>"><?php echo $officer[0]->Name; ?></a>
                                                        </h5>
                                                        <span class="email"><?php echo $officer[0]->Email; ?></span>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                        <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role'] . '/settings.php') ?>">
                                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__footer">
                                                    <a href="<?php echo ADMIN_RENDER . '/logout/logout.php'; ?>">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP VIEW-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php flash(); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">