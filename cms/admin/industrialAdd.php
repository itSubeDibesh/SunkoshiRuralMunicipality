<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$industry = new Industrial();
$industry_info = $industry->getAllIndustrialInfo();
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $industry_id = $_GET['id'];
    $idu_id = $industry->getIndustryByID($industry_id);
    $action = 'Update';
} else {
    $action = 'Add';
}
$title = ucfirst($_SESSION['Role']) . " " . $action . " Industry || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';

?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialList.php'; ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to industrial List</a>
    </div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> industrial information</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo ADMIN_RENDER . '/common/industrial.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <input type="hidden" name="IndustryId" value="<?php echo @$idu_id[0]->IndustryId; ?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="name" name="name" value="<?php echo @$idu_id[0]->Name; ?>" placeholder="Text" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Owner Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="ownername" name="ownername" value="<?php echo @$idu_id[0]->OwnerName; ?>" placeholder="Owner Name" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Contact:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="contact" name="contact" value="<?php echo @$idu_id[0]->Contact; ?>" placeholder="Contact Number" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Location:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="location" name="location" value="<?php echo @$idu_id[0]->Location; ?>" placeholder="Location" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Ward:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="ward_id" id="ward_id" class="form-control">
                            <option value="1" <?php echo isset($idu_id, $idu_id[0]->WardId) && $idu_id[0]->WardId == '1' ? 'selected' : '' ?>>Thorkapa 1</option>
                            <option value="2" <?php echo isset($idu_id, $idu_id[0]->WardId) && $idu_id[0]->WardId == '2' ? 'selected' : '' ?>>Thorkapa 2</option>
                            <option value="3" <?php echo isset($idu_id, $idu_id[0]->WardId) && $idu_id[0]->WardId == '3' ? 'selected' : '' ?>>Kalika</option>
                            <option value="4" <?php echo isset($idu_id, $idu_id[0]->WardId) && $idu_id[0]->WardId == '4' ? 'selected' : '' ?>>Yamunadanda</option>
                            <option value="5" <?php echo isset($idu_id, $idu_id[0]->WardId) && $idu_id[0]->WardId == '5' ? 'selected' : '' ?>>Sunkhani</option>
                            <option value="6" <?php echo isset($idu_id, $idu_id[0]->WardId) && $idu_id[0]->WardId == '6' ? 'selected' : '' ?>>Thumpakhar</option>
                            <option value="7" <?php echo isset($idu_id, $idu_id[0]->WardId) && $idu_id[0]->WardId == '7' ? 'selected' : '' ?>>Pangretar</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Regestration No:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="reg_no" name="reg_no" value="<?php echo @$idu_id[0]->RegestrationNo; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Established Date:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="date" id="established_date" value="<?php echo @$idu_id[0]->EstablishedDate; ?>" name="established_date" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Type :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="type" id="type" class="form-control">
                            <option disabled>Please select</option>
                            <option value="Government" <?php echo isset($idu_id, $idu_id[0]->Type) && $idu_id[0]->Type == 'Government' ? 'selected' : "" ?>>Government</option>
                            <option value="Private" <?php echo isset($idu_id, $idu_id[0]->Type) && $idu_id[0]->Type == 'Private' ? 'selected' : "" ?>>Private</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Employee Count :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="employee" name="employee" value="<?php echo @$idu_id[0]->EmployeeCount; ?>" placeholder="Text" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Banned:</label>
                    </div>
                    <div class="col col-md-3">
                        <label class="au-checkbox">
                            <input type="checkbox" name="is_banned" <?php echo isset($idu_id, $idu_id[0]->isBanned) && $idu_id[0]->isBanned == 'Banned' ? 'checked' : "" ?>>
                            <span class="au-checkmark"></span>
                        </label>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Operating:</label>
                    </div>
                    <div class="col col-md-3">
                        <label class="au-checkbox">
                            <input type="checkbox" name="is_present" <?php echo isset($idu_id, $idu_id[0]->isPreasent) && $idu_id[0]->isPreasent == 'Present' ? 'checked' : "" ?>>
                            <span class="au-checkmark"></span>
                        </label>
                    </div>
                    <div class="row form-group">
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