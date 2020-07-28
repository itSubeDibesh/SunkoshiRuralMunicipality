<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " News And Events List || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$news_event = new News_Event();
$get_all = $news_event->getAll();
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/newsAdd.php'; ?>">
            <i class="zmdi zmdi-plus"></i>add News and events</a>
    </div>
</div>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>News and events List</h3>
    </div>
    <br>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <th class="text-center">SN</th>
                <th class="text-center">Title</th>
                <th class="text-center">Summary</th>
                <th class="text-center">Type</th>
                <th class="text-center">Status</th>
                <th class="text-center">Image</th>
            </thead>
            <tbody>
                <?php
                foreach ($get_all as $key => $value) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $key + 1; ?></td>
                        <td class="text-center"><?php echo $value->Title; ?></td>
                        <td class="text-center"><?php echo $value->Summary; ?></td>
                        <td class="text-center"><?php echo ucfirst($value->Type); ?></td>
                        <td class="text-center"><?php echo ucfirst($value->Status); ?></td>
                        <td class="text-center">
                            <img style="max-width: 100px;" src="<?php echo UPLOAD_URL . '/news_event/' . $value->Image; ?>" alt="" class="img img-thumbnail img-responsive">
                        </td>
                    </tr>
                <?php
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