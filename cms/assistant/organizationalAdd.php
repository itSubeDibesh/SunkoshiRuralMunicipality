<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$action = 'Add';
$title = ucfirst($_SESSION['Role']) ." ".$action. " || " . SITE_TITLE;
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
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Organization Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" name="Name"  class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label class=" form-control-label">Contact:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" name="Contact"  class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Owner Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" name="OwnerName"  class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label class=" form-control-label">Location:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" name="Location" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Ward:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="WardId" id="WardId" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            <option value="1">Thorkapa 1</option>
                            <option value="2">Thorkapa 2</option>
                            <option value="3">Kalika</option>
                            <option value="4">Yamunadanda</option>
                            <option value="5">Sunkhani</option>
                            <option value="6">Thumpakhar</option>
                            <option value="7">Pangretar</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label class=" form-control-label">Type:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="Type" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            <option value="Government" >Government</option>
                            <option value="Private" >Private</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Established Date:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="date" name="EstablishedDate" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label class=" form-control-label">Registration No:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" name="RegestrationNo" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Employees Count:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" name="EmployeeCount" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label class=" form-control-label">Banned:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="IsBanned" class="form-control">
                            <option disabled>Please select</option>
                            <option value="Banned" >Yes</option>
                            <option value="Not Banned" >No</option>
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
                            <option value="Present" >Yes</option>
                            <option value="Collapsed" >No</option>
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