<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Account List || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$log = new Login();
$officer = new Officer();
$details = $log->getAll();
$moredetails = $officer->getAllOfficer();
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsAdd.php'; ?>">
            <i class="zmdi zmdi-plus"></i>add Account</a>
    </div>
</div>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>Account Lists</h3>
    </div>
    <br>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <th class="text-center">S.N</th>
                <th class="text-center">Name</th>
                <th class="text-center">Post</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
                <th class="text-center">Image</th>
            </thead>
            <tbody>
                <?php
                if ($details && $moredetails) {
                    foreach ($details as $key => $value) {
                        if ($value->Approval != 'Approved' || $value->Status != 'active') {
                            foreach ($moredetails as $moor => $valv) {
                                if ($value->LoginId == $valv->LoginId) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo$key+1 ?></td>
                                        <td class="text-center"><?php echo $valv->Name; ?></td>
                                        <td class="text-center"><?php echo $valv->Post; ?></td>
                                        <td class="text-center"><?php echo $value->Approval; ?>/<?php echo $value->Status; ?></td>
                                        <td class="text-center"><a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsApprove.php?id=' . $valv->LoginId; ?>" style="border-radius:50%" class="btn btn-success">
                                                <i class="fa fa-user-check"></i></a>
                                            <a href="<?php echo ADMIN_RENDER . '/common/loginapproval.php?LoginId='. $valv->LoginId.'&&Action=Delete'; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this account?')" style="border-radius: 50%">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                        <td class="text-center"><img style="max-width: 100px;" src="<?php echo UPLOAD_URL . '/users/' . $value->Image; ?>" alt="" class="img img-thumbnail img-responsive"></td>
                                    </tr>
                                <?php
                                }
                            }
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