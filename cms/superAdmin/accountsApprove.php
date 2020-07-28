<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Account Approval || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$log = new Login();
$officer = new Officer();
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $myId = $_GET['id'];
    @$detail = $log->getUserByLoginID($myId);
    @$moredetail = $officer->getByLogineID($myId);
    $action = 'Approve';
} else {
    redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php', 'error', 'Unauthorized access.');
}
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php'; ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to Account List</a>
    </div>
</div>
<br>
<div class="card">
            <div class="card-header">
                <h3>&nbsp; Approval Detail</h3>
            </div>
            <div class="card-body card-block">
                <!-- Profile Card -->
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <?php if (file_exists(UPLOAD_DIR . '/users/' . @$detail[0]->Image) && @$detail[0]->Image != '') {
                                ?>
                                <img class=" rounded-circle mx-auto d-block" width="100" src="<?php echo UPLOAD_URL . '/users/' . $detail[0]->Image; ?>" alt="<?php echo $detail[0]->Image; ?>">
                            <?php
                            } else {
                                ?>
                                <img class="rounded-circle mx-auto d-block" width="100" src="<?php echo ADMIN_IMG . '/defaultuser.png'; ?>" alt="Default user">
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                    <!-- Profile card ends -->
                    <form action="<?php echo ADMIN_RENDER . '/common/loginapproval.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="Action" value="Update">
                        <input type="hidden" name="OfficerId" value="<?php echo $moredetail[0]->OfficerId ?>">
                        <input type="hidden" name="LoginId" value="<?php echo $moredetail[0]->LoginId ?>">
                        <input type="hidden" name="ApprovedBy" value="<?php echo $_SESSION['LoginId']; ?>">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class="form-control-label">Fullname:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="text-input" class="form-control-static"><?php echo @$moredetail[0]->Name; ?></label>
                            </div>
                            <div class="col col-md-3">
                                <label for="select" class="form-control-label">Address:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="select" class="form-control-static"><?php echo @$moredetail[0]->Address; ?></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Contact:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="text-input" class="form-control-static"><?php echo @$moredetail[0]->Contact; ?></label>
                            </div>
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Email:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="text-input" class="form-control-static"><?php echo @$moredetail[0]->Email; ?></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Gender :</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="select" class="form-control-static"><?php echo @$moredetail[0]->Gender; ?></label>
                            </div>
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Post :</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="select" class="form-control-static"><?php echo @$moredetail[0]->Post; ?></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="Status" class=" form-control-label">Status:</label>
                            </div>
                            <div class="col col-md-3">
                                <select name="Status" id="Status" class="form-control">
                                    <option disabled selected>-- Please select --</option>
                                    <option value="inactive" <?php echo isset($detail, $detail[0]->Status) && $detail[0]->Status == 'inactive' ? 'Selected' : '' ?>>In-Active</option>
                                    <option value="active" <?php echo isset($detail, $detail[0]->Status) && $detail[0]->Status == 'active' ? 'Selected' : '' ?>>Active</option>
                                </select>
                            </div>
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Approval :</label>
                            </div>
                            <div class="col col-md-3">
                                <select name="Approval" id="Approval" class="form-control">
                                    <option disabled selected>-- Please select --</option>
                                    <option value="Pending" <?php echo isset($detail, $detail[0]->Approval) && $detail[0]->Approval == 'Pending' ? 'Selected' : '' ?>>Pending</option>
                                    <option value="Approved" <?php echo isset($detail, $detail[0]->Approval) && $detail[0]->Approval == 'Approved' ? 'Selected' : '' ?>>Approved</option>
                                    <option value="Rejected" <?php echo isset($detail, $detail[0]->Approval) && $detail[0]->Approval == 'Rejected' ? 'Selected' : '' ?>>Rejected</option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-user-check"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm" name="Action" value="Cancel">
                        <i class="fa fa-trash"></i> Cancel
                    </button>
                </div>
                </form>
            </div>
        </div>
<?php
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/footer.php';
?>