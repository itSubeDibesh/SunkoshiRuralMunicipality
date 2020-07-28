<?php
$app = $login->selectCountUnapproved();
$alluav = $login->selectCountAll();
$apv = (int) $app[0]->Count;
$all = (int) $alluav[0]->Count;
$unapproved = $all - $apv;
?>
<li>
    <a href="<?php echo CMS_URL . '/dashbord.php'; ?>">
        <i class="fas fa-home"></i>Home</a>
</li>
<li class="has-sub">
    <a class="js-arrow open" href="#">
        <i class="fas fa-info-circle"></i>Information</a>
    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
        <li>
            <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalList.php'; ?>">
                <i class="fas fa-users"></i>Personal</a>
        </li>
        <li>
            <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/organizationalList.php'; ?>">
                <i class="fas fa-building"></i>Organizational</a>
        </li>
        <li>
            <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php'; ?>">
                <i class="fas fa-university"></i>Industrial</a>
        </li>
    </ul>
</li>
<li class="has-sub">
    <a class="js-arrow open" href="#">
        <i class="fas fa-photo-video"></i>Gallery</a>
    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
        <li>
            <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/photoList.php'; ?>">
                <i class="fas fa-file-image"></i>Photo</a>
        </li>
        <li>
            <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php'; ?>">
                <i class="fas fa-file-video"></i>Video</a>
        </li>
    </ul>
</li>
<li class="has-sub">
    <a class="js-arrow open" href="#">
        <i class="fas fa-scroll"></i>Issues and Problems</a>
    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
        <li>
            <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/problemList.php'; ?>">
                <i class="fas fa-dizzy"></i>Problems</a>
        </li>
        <li>
            <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/complainList.php'; ?>">
                <i class="fas fa-scroll"></i>Complains</a>
        </li>
    </ul>
</li>
<li class="has-sub">
    <a class="js-arrow open" href="#">
        <i class="fas fa-newspaper"></i>District Information</a>
    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
        <li>
            <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/newsList.php'; ?>">
                <i class="fas fa-newspaper"></i>News & Events</a>
        </li>
        <li>
            <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php'; ?>">
                <i class="fas fa-hand-holding-usd"></i>Plans & Policies</a>
        </li>
    </ul>
</li>
<li>
    <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersList.php'; ?>">
        <i class="fas fa-users-cog"></i>Officers</a>
</li>
<li>
    <div class="menulist">
        <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php'; ?>">
            <i class="fas fa-user-edit"></i>Accounts</a>
            <?php if($unapproved!=0){
            ?>
                 <span class="approval">
                    <h6 style="color:white;"><?php echo $unapproved ?></h6>
                 </span>
            <?php
                }
            ?>
    </div>
</li>
<li>
    <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/webList.php'; ?>">
        <i class="fas fa-tasks"></i>Manage website</a>
</li>