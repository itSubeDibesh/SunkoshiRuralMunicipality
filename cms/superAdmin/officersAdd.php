<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$officer = new Officer();
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $Id = $_GET['id'];
    $officerDetails = $officer->getUserByID($Id);
    $action = 'Update';
} else {
    $action = 'Add';
}
$title = ucfirst($_SESSION['Role']) ." ".$action. " Officer || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
?><div class="col-md-12">
<div class="overview-wrap">
    <h2 class="title-1"></h2>
    <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersList.php'; ?>">
        <i class="fa fa-chevron-circle-left"></i> Back to officers List</a>
</div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> Officers information</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo ADMIN_RENDER . '/common/officer.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <input type="hidden" name="Id" value="<?php echo @$officerDetails[0]->OfficerId; ?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class=" form-control-label">Fullname:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" value="<?php echo @$officerDetails[0]->Name ?>" id="Name" name="Name" placeholder="Text" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="address" class=" form-control-label">Address:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" value="<?php echo @$officerDetails[0]->Address ?>" id="address" name="address" placeholder="Text" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="WardId" class=" form-control-label">Ward:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="WardId" id="WardId" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            <option value="1" <?php echo isset($officerDetails, $officerDetails[0]->WardId) && $officerDetails[0]->WardId == '1' ? 'selected' : '' ?>>Thorkapa 1</option>
                            <option value="2" <?php echo isset($officerDetails, $officerDetails[0]->WardId) && $officerDetails[0]->WardId == '2' ? 'selected' : '' ?>>Thorkapa 2</option>
                            <option value="3" <?php echo isset($officerDetails, $officerDetails[0]->WardId) && $officerDetails[0]->WardId == '3' ? 'selected' : '' ?>>Kalika</option>
                            <option value="4" <?php echo isset($officerDetails, $officerDetails[0]->WardId) && $officerDetails[0]->WardId == '4' ? 'selected' : '' ?>>Yamunadanda</option>
                            <option value="5" <?php echo isset($officerDetails, $officerDetails[0]->WardId) && $officerDetails[0]->WardId == '5' ? 'selected' : '' ?>>Sunkhani</option>
                            <option value="6" <?php echo isset($officerDetails, $officerDetails[0]->WardId) && $officerDetails[0]->WardId == '6' ? 'selected' : '' ?>>Thumpakhar</option>
                            <option value="7" <?php echo isset($officerDetails, $officerDetails[0]->WardId) && $officerDetails[0]->WardId == '7' ? 'selected' : '' ?>>Pangretar</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="post" class=" form-control-label">Post :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" value="<?php echo @$officerDetails[0]->Post ?>" id="post" name="post" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="contact" class=" form-control-label">Contact:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" value="<?php echo @$officerDetails[0]->Contact ?>" id="contact" name="contact" placeholder="Number" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Email:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="email" value="<?php echo @$officerDetails[0]->Email ?>" id="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Gender :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="gender" class="form-control">
                            <option disabled selected>--Select Any One--</option>
                            <option value="1" <?php echo isset($officerDetails, $officerDetails[0]->Gender) && $officerDetails[0]->Gender == 'Male' ? 'selected' : '' ?>>Male</option>
                            <option value="1" <?php echo isset($officerDetails, $officerDetails[0]->Gender) && $officerDetails[0]->Gender == 'Female' ? 'selected' : '' ?>>Female</option>
                            <option value="1" <?php echo isset($officerDetails, $officerDetails[0]->Gender) && $officerDetails[0]->Gender == 'Others' ? 'selected' : '' ?>>Others</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Image: </label>
                    <div class="col-sm-4">
                        <input type="file" name="image" accept="image/*">
                    </div>
                    <?php
                    if (@$officerDetails[0]->Image) {
                        ?>
                        <img src="<?php echo UPLOAD_URL . '/officers/' . $officerDetails[0]->Image; ?>" class="responsive" style="max-width: 150px;">
                    <?php
                    }
                    ?>
                </div>
                <input type="hidden" name="old_image" value="<?php echo $officerDetails[0]->Image; ?>">
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