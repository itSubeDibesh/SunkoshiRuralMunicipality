<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$organizations = new Organization();
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $myId = $_GET['id'];
    $userDetails = $organizations->getByID($myId);
    $action = 'Update';
} else {
    $action = 'Add';
}
$title = ucfirst($_SESSION['Role']) ." ".$action. " Organization || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';

?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/organizationalList.php'; ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to organization List</a>
    </div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> organization information</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo ADMIN_RENDER . '/common/organizational.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <input type="hidden" name="OrganizationId" value="<?php echo @$userDetails[0]->OrganizationId; ?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Organization Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" name="Name" value="<?php echo @$userDetails[0]->Name; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label class=" form-control-label">Contact:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" name="Contact" value="<?php echo @$userDetails[0]->Contact; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Owner Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" name="OwnerName" value="<?php echo @$userDetails[0]->OwnerName; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label class=" form-control-label">Location:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" name="Location" value="<?php echo @$userDetails[0]->Location; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Ward:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="WardId" id="WardId" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            <option value="1" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '1' ? 'selected' : '' ?>>Thorkapa 1</option>
                            <option value="2" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '2' ? 'selected' : '' ?>>Thorkapa 2</option>
                            <option value="3" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '3' ? 'selected' : '' ?>>Kalika</option>
                            <option value="4" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '4' ? 'selected' : '' ?>>Yamunadanda</option>
                            <option value="5" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '5' ? 'selected' : '' ?>>Sunkhani</option>
                            <option value="6" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '6' ? 'selected' : '' ?>>Thumpakhar</option>
                            <option value="7" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '7' ? 'selected' : '' ?>>Pangretar</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label class=" form-control-label">Type:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="Type" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            <option value="Government" <?php echo isset($userDetails, $userDetails[0]->Type) && $userDetails[0]->Type == 'Government' ? 'selected' : '' ?>>Government</option>
                            <option value="Private" <?php echo isset($userDetails, $userDetails[0]->Type) && $userDetails[0]->Type == 'Private' ? 'selected' : '' ?>>Private</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Established Date:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="date" name="EstablishedDate" value="<?php echo @$userDetails[0]->EstablishedDate; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label class=" form-control-label">Registration No:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" name="RegestrationNo" value="<?php echo @$userDetails[0]->RegestrationNo; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Employees Count:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" name="EmployeeCount" value="<?php echo @$userDetails[0]->EmployeeCount; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label class=" form-control-label">Banned:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="IsBanned" class="form-control">
                            <option disabled>Please select</option>
                            <option value="Banned" <?php echo isset($userDetails, $userDetails[0]->IsBanned) && $userDetails[0]->IsBanned == 'Banned' ? 'selected' : '' ?>>Yes</option>
                            <option value="Not Banned" <?php echo isset($userDetails, $userDetails[0]->IsBanned) && $userDetails[0]->IsBanned == 'Not Banned' ? 'selected' : '' ?>>No</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Operating:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="IsPresent" class="form-control">
                            <option disabled>Please select</option>
                            <option value="Present" <?php echo isset($userDetails, $userDetails[0]->IsPresent) && $userDetails[0]->IsPresent == 'Present' ? 'selected' : '' ?>>Yes</option>
                            <option value="Collapsed" <?php echo isset($userDetails, $userDetails[0]->IsPresent) && $userDetails[0]->IsPresent == 'Collapsed' ? 'selected' : '' ?>>No</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-pen"></i><?php echo $action ?>
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/footer.php';
?>