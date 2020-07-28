<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'].'/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role'])." Settings || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'].'/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'].'/cms/inc/sidebar.php';
$user_id = $_SESSION['LoginId'];
$offic = new Officer();
$officer = $offic->getOfficerByLoginID($user_id);
$off_wID = $officer[0]->WardId;
$ward = new Wards();
$ward_info = $ward->getWardById($off_wID);
$all_ward = $ward->getAllWards();
$lg_id = $officer[0]->LoginId;
$login = new Login();
$lg_user = $login->getUserByLoginID($lg_id);
?>
<div class="row">
    <!--Update Profile-->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">Update Profile</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <?php
                    if (isset($lg_user[0]->Image) && !empty($lg_user[0]->Image)) {
                        ?>
                        <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo UPLOAD_URL . '/users/' . $lg_user[0]->Image; ?>">
                    <?php } else { ?>
                        <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo ADMIN_IMG . '/defaultuser.png'; ?>">
                    <?php } ?>
                    <br>
                    <h5 class="text-sm-center md-2 mb-1"><?php echo $lg_user[0]->Username; ?></h5>
                </div>
                <hr>
                <div class="card-text text-sm-center">
                    <button type="button" onclick="UP_Show();" id="UP_Show" class="btn btn-success btn-sm"><i class="fa fa-users"></i> Update</button>
                    <button type="button" onclick="UP_Hide();" id="UP_Hide" class="btn btn-success btn-sm"><i class="fa fa-users"></i> Update</button>
                </div>
            </div>
        </div>
    </div>
    <!--Update Profile Ends-->
    <!--Update Credientials-->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">Update Credentials</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <?php
                    if (isset($lg_user[0]->Image) && !empty($lg_user[0]->Image)) {
                        ?>
                        <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo UPLOAD_URL . '/users/' . $lg_user[0]->Image; ?>">
                    <?php } else { ?>
                        <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo ADMIN_IMG . '/defaultuser.png'; ?>">
                    <?php } ?>
                    <br>
                    <h5 class="text-sm-center md-2 mb-1"><?php echo $lg_user[0]->Username; ?></h5>
                </div>
                <hr>
                <div class="card-text text-sm-center">
                    <button type="button" id="UC_Show" onclick="UC_Show();" class="btn btn-warning btn-sm"><i class="fa fa-key"></i> Update</button>
                    <button type="button" id="UC_Hide" onclick="UC_Hide();" class="btn btn-warning btn-sm"><i class="fa fa-key"></i> Update</button>
                </div>
            </div>
        </div>
    </div>
    <!--Update Credientials Ends-->
    <!--View Profile-->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <strong class="card-title mb-3">View Profile</strong>
            </div>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <?php
                    if (isset($lg_user[0]->Image) && !empty($lg_user[0]->Image)) {
                        ?>
                        <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo UPLOAD_URL . '/users/' . $lg_user[0]->Image; ?>">
                    <?php } else { ?>
                        <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo ADMIN_IMG . '/defaultuser.png'; ?>">
                    <?php } ?>
                    <br>
                    <h5 class="text-sm-center md-2 mb-1"><?php echo $lg_user[0]->Username; ?></h5>
                </div>
                <hr>
                <div class="card-text text-sm-center">
                    <button type="button" id="VP_Show" onclick="VP_Show();" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View</button>
                    <button type="button" id="VP_Hide" onclick="VP_Hide();" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View</button>
                </div>
            </div>
        </div>
    </div>
    <!--View Profile Ends-->
</div>
<div class="row">
    <div class="col-md-12 Update_P">
        <div class="card">
            <div class="card-header">
                <h3>&nbsp;Update Profile</h3>
            </div>
            <div class="card-body card-block">
                <!-- Profile Card -->
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <?php
                            if (isset($lg_user[0]->Image) && !empty($lg_user[0]->Image)) {
                                ?>
                                <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo UPLOAD_URL . '/users/' . $lg_user[0]->Image; ?>">
                            <?php } else { ?>
                                <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo ADMIN_IMG . '/defaultuser.png'; ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <!-- Profile card ends -->
                    <form action="<?php echo ADMIN_RENDER.'/common/setting.php';?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" value="Update" name="FormType">
                        <div class="row form-group">
                            <input type="hidden" name="OfficerId" value="1">
                            <div class="col col-md-3">
                                <label for="Name" class=" form-control-label">Name:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="text" id="Name" name="Name" value="<?php echo $officer[0]->Name; ?>" class="form-control">
                            </div>

                            <div class="col col-md-3">
                                <label for="Email" class=" form-control-label">Email:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="Email" id="Email" name="Email" value="<?php echo $officer[0]->Email; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="Ward" class=" form-control-label">Ward:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <select name="Ward" id="Ward" class="form-control">
                                    <?php
                                    if ($ward_info) {
                                        ?>

                                        <?php
                                        foreach ($all_ward as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value->WardId; ?>" <?php echo ($ward_info[0]->WardId == $value->WardId) ? 'selected' : '' ?>>
                                                <?php
                                                echo $value->Wards;
                                                ?>
                                            </option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col col-md-3">
                                <label for="Address" class=" form-control-label">Address:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="text" id="Address" name="Address" value="<?php echo $officer[0]->Address; ?>" class="form-control">
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="Contact" class=" form-control-label">Contact:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="number" id="Contact" name="Contact" value="<?php echo $officer[0]->Contact; ?>" class="form-control">
                            </div>
                            <div class="col col-md-3">
                                <label for="Gender" class=" form-control-label">Gender:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <select name="Gender" id="Gender" class="form-control">
                                    <option value="">Please select</option>
                                    <option value="Male" <?php echo isset($officer, $officer[0]->Gender) && $officer[0]->Gender == 'Male' ? 'selected' : "" ?>>Male</option>
                                    <option value="Female" <?php echo isset($officer, $officer[0]->Gender) && $officer[0]->Gender == 'Female' ? 'selected' : "" ?>>Female</option>
                                    <option value="Others" <?php echo isset($officer, $officer[0]->Gender) && $officer[0]->Gender == 'Others' ? 'selected' : ""; ?>>Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Update
                            </button>
                            &nbsp;
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile Upload completed successfully -->
    <div class="col-md-12 Credientials">
        <div class="card">
            <div class="card-header ">
                <h3>&nbsp;Credentials <small>(Provide Current Password to perform any task)</small></h3>
            </div>
            <div class="card-body card-block">
                <!-- Profile Card -->
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <?php
                            if (isset($lg_user[0]->Image) && !empty($lg_user[0]->Image)) {
                                ?>
                                <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo UPLOAD_URL . '/users/' . $lg_user[0]->Image; ?>">
                            <?php } else { ?>
                                <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo ADMIN_IMG . '/defaultuser.png'; ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <!-- Profile card ends -->
                    <form action="<?php echo ADMIN_RENDER.'/common/setting.php';?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" value="Credentials" name="FormType">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="UserName" class=" form-control-label">User Name:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="text" id="UserName" name="UserName" value="<?php echo $lg_user[0]->Username; ?>" class="form-control">
                            </div>
                            <div class="col col-md-3">
                                <label for="CurrentPassword" class=" form-control-label">Current Password:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="password" id="CurrentPassword" name="CurrentPassword" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="NewPassword" class=" form-control-label">New Password:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="password" id="NewPassword" name="NewPassword" class="form-control">
                            </div>
                            <div class="col col-md-3">
                                <label for="RetypePassword" class=" form-control-label">Retype Password:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="password" id="RetypePassword" name="RetypePassword" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="image" class=" form-control-label">Update Image:</label>
                            </div>
                            <div class="col col-md-4">
                                <input type="file" id="image" name="image" class="form-control-file" accept="image/*">
                            </div>
                        </div>
                        <input type="hidden" name="old_image" value="">
                        <div class="card-footer">
                            <input type="hidden" name="old_image" value="<?php echo $lg_user[0]->Image ?>">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Update
                            </button>
                            &nbsp;
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 My_P">
        <div class="card">
            <div class="card-header">
                <h3>&nbsp;My Profile</h3>
            </div>
            <div class="card-body card-block">
                <!-- Profile Card -->
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <?php
                            if (isset($lg_user[0]->Image) && !empty($lg_user[0]->Image)) {
                                ?>
                                <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo UPLOAD_URL . '/users/' . $lg_user[0]->Image; ?>">
                            <?php } else { ?>
                                <img class="rounded-circle mx-auto d-block" width="150" src="<?php echo ADMIN_IMG . '/defaultuser.png'; ?>">
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label"><strong>Full Name :</strong></label>
                        </div>
                        <div class="col-6 col-md">
                            <p class="form-control-static"><?php echo $officer[0]->Name; ?></p>
                        </div>
                        <div class="col col-md-3">
                            <label class=" form-control-label"><strong>Email :</strong></label>
                        </div>
                        <div class="col-6 col-md">
                            <p class="form-control-static"><?php echo $officer[0]->Email; ?></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label"><strong>Contact :</strong></label>
                        </div>
                        <div class="col-6 col-md">
                            <p class="form-control-static"><?php echo $officer[0]->Contact; ?></p>
                        </div>
                        <div class="col col-md-3">
                            <label class=" form-control-label"><strong> Address :</strong></label>
                        </div>
                        <div class="col-6 col-md">
                            <p class="form-control-static"><?php echo $officer[0]->Address; ?></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label"><strong>Gender :</strong></label>
                        </div>
                        <div class="col-6 col-md">
                            <p class="form-control-static"><?php echo $officer[0]->Gender; ?></p>
                        </div>
                        <div class="col col-md-3">
                            <label class=" form-control-label"><strong>Degination :</strong></label>
                        </div>
                        <div class="col-6 col-md">
                            <p class="form-control-static"><?php echo $officer[0]->Post; ?></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label"><strong>Ward :</strong></label>
                        </div>
                        <div class="col-6 col-md">
                            <p class="form-control-static"><?php echo $ward_info[0]->Wards; ?></p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="V_UP" onclick="V_UP();" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Update
                        </button>
                        &nbsp;
                        <button type="reset" id="V_uP" onclick="V_uP();" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Cancel
                        </button>
                    </div>
                </div>
                <!-- Profile card ends -->
            </div>
        </div>
    </div>
</div>   
<?php
require  $_SERVER['DOCUMENT_ROOT'].'/cms/inc/footer.php';
?>
<!-- Custom Js For setting slide up and down -->
<script>
        setTimeout(function() {
            $('.alert').slideUp();
        }, 4000);

        window.onload = function() {
            $('.Update_P').hide();
            $('.Credientials').hide();
            $('.My_P').hide();
            $('#UP_Hide').hide();
            $('#UC_Hide').hide();
            $('#VP_Hide').hide();
        }

        function UP_Show() {
            $('#UP_Show').hide();
            $('#UP_Hide').show();
            $('.Update_P').slideDown();
            $('.Credientials').slideUp();
            $('#UC_Hide').hide();
            $('#UC_Show').show();
            $('.My_P').slideUp();
            $('#VP_Hide').hide();
            $('#VP_Show').show();
        }

        function UP_Hide() {
            $('#UP_Show').show();
            $('#UP_Hide').hide();
            $('.Update_P').slideUp();
        }

        function UC_Show() {
            $('#UC_Show').hide();
            $('#UC_Hide').show();
            $('.Credientials').slideDown();
            $('.Update_P').slideUp();
            $('#UP_Hide').hide();
            $('#UP_Show').show();
            $('.My_P').slideUp();
            $('#VP_Hide').hide();
            $('#VP_Show').show();
        }

        function UC_Hide() {
            $('#UC_Show').show();
            $('#UC_Hide').hide();
            $('.Credientials').slideUp();
        }

        function VP_Show() {
            $('#VP_Show').hide();
            $('#VP_Hide').show();
            $('.My_P').slideDown();
            $('.Update_P').slideUp();
            $('#UP_Hide').hide();
            $('#UP_Show').show();
            $('.Credientials').slideUp();
            $('#UC_Hide').hide();
            $('#UC_Show').show();
        }

        function VP_Hide() {
            $('#VP_Show').show();
            $('#VP_Hide').hide();
            $('.My_P').slideUp();
        }

        function V_UP() {
            $('.My_P').slideUp();
            $('.Update_P').slideDown();
            $('#VP_Hide').hide();
            $('#VP_Show').show();
        }

        function V_uP() {
            $('.My_P').slideUp();
            $('#VP_Hide').hide();
            $('#VP_Show').show();
        }
</script>
<!-- Custom js Ends -->
