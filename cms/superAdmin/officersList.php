<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Officer List || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$officer = new Officer();
$officerList = $officer->getAll();
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersAdd.php'; ?>">
            <i class="zmdi zmdi-plus"></i>add Officers</a>
    </div>
</div>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>Officers List</h3>
    </div>
    <br>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <th class="text-center">S.N</th>
                <th class="text-center">Fullname</th>
                <th class="text-center">Address</th>
                <th class="text-center">Action</th>
                <th class="text-center">Contact</th>
                <th class="text-center">Post</th>
                <th class="text-center">Image</th>
            </thead>
            <tbody>
                <?php
                if ($officerList) {
                    foreach ($officerList as $key => $details) {
                        if (empty($details->LoginId)) {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $key + 1; ?></td>
                                <td class="text-center"><?php echo $details->Name; ?></td>
                                <td class="text-center"><?php echo $details->Address; ?></td>
                                <td class="text-center"><a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersAdd.php?id=' . $details->OfficerId; ?>" style="border-radius:50%" class="btn btn-success">
                                        <i class="fa fa-edit"></i></a>
                                    <a href="<?php echo ADMIN_RENDER . '/common/officer.php?id=' . $details->OfficerId . '&&Action=Delete'; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this orgainzation?')" style="border-radius: 50%">
                                        <i class="fa fa-trash"></i></a>
                                </td>
                                <td class="text-center"><?php echo $details->Contact; ?></td>
                                <td class="text-center"><?php echo $details->Post; ?></td>
                                <td>
                                    <img style="max-width: 100px;" src="<?php echo UPLOAD_URL . '/officers/' . $details->Image; ?>" alt="" class="img img-thumbnail img-responsive">
                                </td>
                            </tr>
                        <?php
                        }
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