<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " News List || " . SITE_TITLE;
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
                <th>SN</th>
                <th>Title</th>
                <th>Summary</th>
                <th>Action</th>
                <th>Type</th>
                <th>Status</th>
                <th>Image</th>
            </thead>
            <tbody>
                <?php
                foreach ($get_all as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $value->Title; ?></td>
                        <td><?php echo $value->Summary; ?></td>
                        <td> <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/newsAdd.php?id=' . $value->InfoId; ?>" style="border-radius:50%" class="btn btn-success">
                                <i class="fa fa-edit"></i></a>
                            <a href="<?php echo ADMIN_RENDER . '/common/news_event.php?id=' . $value->InfoId . '&&Action=Delete'; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news/event?')" style="border-radius: 50%">
                                <i class="fa fa-trash"></i></a>
                        </td>
                        <td><?php echo ucfirst($value->Type); ?></td>
                        <td><?php echo ucfirst($value->Status); ?></td>
                        <td>
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