<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Add Account || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$action = 'Add';
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php'; ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to Account List</a>
    </div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> Account</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo ADMIN_RENDER . '/common/loginapproval.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <h5>&nbsp;Login Details</h5>
                <hr>
                <br>
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Username" class=" form-control-label">Username:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Username" name="Username" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="Passwd" class=" form-control-label">Password:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="Password" id="Passwd" name="Passwd" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Role" class=" form-control-label">Role:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="Role" id="Role" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            <option value="SuperAdmin">Super Admin</option>
                            <option value="Admin">Admin</option>
                            <option value="Assistant">Assistant</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="Status" class=" form-control-label">Status:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="Status" id="Status" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            <option value="inactive">In-Active</option>
                            <option value="active">Active</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Approval" class=" form-control-label">Approval:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="Approval" id="Approval" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            <option value="Pending">Pending</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="Image" class=" form-control-label">Image:</label>
                    </div>
                    <div class="col col-md-3">
                        <input type="file" id="Image" name="Image" class="form-control-file" accept="image/*">
                    </div>
                </div>
                <hr>
                <h5>&nbsp;Officers Details</h5>
                <br>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Name" class=" form-control-label">Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Name" name="Name" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="Address" class=" form-control-label">Address:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Address" name="Address" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Gender" class=" form-control-label">Gender :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="Gender" id="Gender" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="Email" class=" form-control-label">Email:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="Email" id="Email" name="Email" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Contact" class=" form-control-label">Contact :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="Contact" name="Contact" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="Post" class=" form-control-label">Designation :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Post" name="Post" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="WardId" class=" form-control-label">Ward:</label>
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