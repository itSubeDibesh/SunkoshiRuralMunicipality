<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Videos List || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$vd = new Video();
$vInfo = $vd->getAllVideo();
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoAdd.php'; ?>">
            <i class="zmdi zmdi-plus"></i>add Videos</a>
    </div>
</div>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>Videos List</h3>
    </div>
    <br>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <th class="text-center">SN</th>
                <th class="text-center">Title</th>
                <th class="text-center">Action</th>
                <th class="text-center">Video</th>
                <th class="text-center">Status</th>
            </thead>
            <tbody>
                <?php
                if ($vInfo) {
                    foreach ($vInfo as $key => $var) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $key + 1; ?></td>
                            <td class="text-center"><?php echo ucfirst($var->Title); ?></td>
                            <td class="text-center"><a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoAdd.php?id=' . $var->VideoId; ?>" style="border-radius:50%" class="btn btn-success">
                                    <i class="fa fa-edit"></i></a>
                                <a href="<?php echo ADMIN_RENDER . '/common/videos.php?id=' . $var->VideoId . '&&Action=Delete'; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this gallery?')" style="border-radius: 50%">
                                    <i class="fa fa-trash"></i></a></td>
                            <td class="text-center"><iframe width="150" height="100" src="https://www.youtube.com/embed/<?php echo $var->VideoLinkId; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                            <td class="text-center"><?php echo ucfirst($var->Status); ?></td>
                        </tr>
                    <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!--table Ends -->
<?php
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/footer.php';
?>