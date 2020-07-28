<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Photo List || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$photos = new Photos();
$all_photos = $photos->getAllPhotos();
// debug($all_photos);
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/photoAdd.php'; ?>">
            <i class="zmdi zmdi-plus"></i>add Photo Gallery</a>
    </div>
</div>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>Photo Gallery List</h3>
    </div>
    <br>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <th class="text-center">S.N</th>
                <th class="text-center">Title</th>
                <th class="text-center">Summary</th>
                <th class="text-center">Action</th>
                <th class="text-center">Photographer</th>
                <th class="text-center">Images</th>
                <th class="text-center">Status</th>
            </thead>
            <tbody>
                <?php
                foreach ($all_photos as $key => $value) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $key + 1; ?></td>
                        <td class="text-center"><?php echo $value->Title; ?></td>
                        <td class="text-center"><?php echo $value->Summary; ?></td>
                        <td class="text-center"><a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/photoAdd.php?id=' . $value->PhotoId; ?>" style="border-radius:50%" class="btn btn-success">
                                    <i class="fa fa-edit"></i></a>
                        </td>
                        <td class="text-center"><?php echo $value->Photographer; ?></td>
                        <td class="text-center">
                            <img style="max-width: 100px;" src="<?php echo UPLOAD_URL . '/photos/' . $value->Image; ?>" class="img img-thumbnail img-responsive">
                        </td>
                        <td class="text-center"><?php echo $value->Status; ?></td>
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