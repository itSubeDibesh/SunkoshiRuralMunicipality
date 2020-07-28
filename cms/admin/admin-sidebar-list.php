<li>
    <a href="<?php echo CMS_URL . '/dashbord.php'; ?>">
        <i class="fas fa-home"></i>Home</a>
</li>
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
<li>
    <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/photoList.php'; ?>">
        <i class="fas fa-file-image"></i>Photo</a>
</li>
<li>
    <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php'; ?>">
        <i class="fas fa-file-video"></i>Video</a>
</li>
<li>
    <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/newsList.php'; ?>">
        <i class="fas fa-newspaper"></i>News & Events</a>
</li>
<li>
    <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/problemList.php'; ?>">
        <i class="fas fa-dizzy"></i>Problems</a>
</li>
<li>
    <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/complainList.php'; ?>">
        <i class="fas fa-scroll"></i>Complains</a>
</li>