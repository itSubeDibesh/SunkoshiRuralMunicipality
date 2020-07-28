<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$action = 'Add';
$title = ucfirst($_SESSION['Role']) . " " . $action . " Citizen || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalList.php'; ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to citizens List</a>
    </div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> citizens information</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo ADMIN_RENDER . '/common/personal.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Name" class=" form-control-label">Fullname:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Name" name="Name" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="CitizenshipNo" class=" form-control-label">Citizenship No:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="CitizenshipNo" name="CitizenshipNo" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="TemporaryAddress" class=" form-control-label">Temporary Address:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="TemporaryAddress" name="TemporaryAddress" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="PermanentAddress" class=" form-control-label">Permanent Address:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="PermanentAddress" name="PermanentAddress" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="FathersName" class=" form-control-label">Fathers Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="FathersName" name="FathersName" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="MothersName" class=" form-control-label">Mothers Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="MothersName" name="MothersName" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Contact" class=" form-control-label">Contact:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="Contact" name="Contact" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="DateOfBirth" class=" form-control-label">Date of Birth:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="date" id="DateOfBirth" name="DateOfBirth" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Gender" class=" form-control-label">Gender :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="Gender" id="Gender" class="form-control">
                            <option disabled>Please select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="Religion" class=" form-control-label">Religion :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="Religion" id="Religion" class="form-control">
                            <option disabled>Please select</option>
                            <option value="Hinduism">Hinduism</option>
                            <option value="Buddhism">Buddhism</option>
                            <option value="Christanity">Christanity</option>
                            <option value="Islam">Islam</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="LiteracyStatus" class=" form-control-label">Literacy Status:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="LiteracyStatus" id="LiteracyStatus" class="form-control">
                            <option disabled>Please select</option>
                            <option value="Educated" >Educated</option>
                            <option value="Semieducated" >Semieducated</option>
                            <option value="Uneducated" >Uneducated</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="Profession" class=" form-control-label">Profession :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Profession" name="Profession" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="VoterId" class=" form-control-label">Voter Id:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="VoterId" name="VoterId" class="form-control">
                    </div>
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
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="IsAlive" class=" form-control-label">Is Alive:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="IsAlive" id="IsAlive" class="form-control">
                            <option disabled>Please select</option>
                            <option value="Alive" >Alive</option>
                            <option value="Dead" >Dead</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="IsBoarded" class=" form-control-label">Is Boarder:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="IsBoarded" id="IsBoarded" class="form-control">
                            <option disabled>Please select</option>
                            <option value="NO" >NO</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">

                    <div class="col col-md-3">
                        <label for="BoardedCountry" class=" form-control-label">Boarder Country:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="BoardedCountry" name="BoardedCountry" class="form-control">
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