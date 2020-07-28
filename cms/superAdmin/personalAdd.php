<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$personnel = new Personal();
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $myId = $_GET['id'];
    $userDetails = $personnel->getByID($myId);
    $action = 'Update';
} else {
    $action = 'Add';
}
$title = ucfirst($_SESSION['Role']) ." ".$action. " Person || " . SITE_TITLE;
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
                <input type="hidden" name="PersonalinfoID" value="<?php echo @$userDetails[0]->PersonalinfoID; ?>">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Name" class=" form-control-label">Fullname:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Name" name="Name" value="<?php echo @$userDetails[0]->Name; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="CitizenshipNo" class=" form-control-label">Citizenship No:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="CitizenshipNo" name="CitizenshipNo" value="<?php echo @$userDetails[0]->CitizenshipNo; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="TemporaryAddress" class=" form-control-label">Temporary Address:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="TemporaryAddress" name="TemporaryAddress" value="<?php echo @$userDetails[0]->TemporaryAddress; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="PermanentAddress" class=" form-control-label">Permanent Address:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="PermanentAddress" name="PermanentAddress" value="<?php echo @$userDetails[0]->PermanentAddress; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="FathersName" class=" form-control-label">Fathers Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="FathersName" name="FathersName" value="<?php echo @$userDetails[0]->FathersName; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="MothersName" class=" form-control-label">Mothers Name:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="MothersName" name="MothersName" value="<?php echo @$userDetails[0]->MothersName; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Contact" class=" form-control-label">Contact:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="number" id="Contact" name="Contact" value="<?php echo @$userDetails[0]->Contact; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="DateOfBirth" class=" form-control-label">Date of Birth:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="date" id="DateOfBirth" name="DateOfBirth" value="<?php echo @$userDetails[0]->DateOfBirth; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Gender" class=" form-control-label">Gender :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="Gender" id="Gender" class="form-control">
                            <option disabled>Please select</option>
                            <option value="Male" <?php echo isset($userDetails, $userDetails[0]->Gender) && $userDetails[0]->Gender == 'Male' ? 'Selected' : '' ?>>Male</option>
                            <option value="Female" <?php echo isset($userDetails, $userDetails[0]->Gender) && $userDetails[0]->Gender == 'Female' ? 'Selected' : '' ?>>Female</option>
                            <option value="Others" <?php echo isset($userDetails, $userDetails[0]->Gender) && $userDetails[0]->Gender == 'Others' ? 'Selected' : '' ?>>Others</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="Religion" class=" form-control-label">Religion :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <select name="Religion" id="Religion" class="form-control">
                            <option disabled>Please select</option>
                            <option value="Hinduism" <?php echo isset($userDetails, $userDetails[0]->Religion) && $userDetails[0]->Religion == 'Hinduism' ? 'Selected' : '' ?>>Hinduism</option>
                            <option value="Buddhism" <?php echo isset($userDetails, $userDetails[0]->Religion) && $userDetails[0]->Religion == 'Buddhism' ? 'Selected' : '' ?>>Buddhism</option>
                            <option value="Christanity" <?php echo isset($userDetails, $userDetails[0]->Religion) && $userDetails[0]->Religion == 'Christanity' ? 'Selected' : '' ?>>Christanity</option>
                            <option value="Islam" <?php echo isset($userDetails, $userDetails[0]->Religion) && $userDetails[0]->Religion == 'Islam' ? 'Selected' : '' ?>>Islam</option>
                            <option value="Others" <?php echo isset($userDetails, $userDetails[0]->Religion) && $userDetails[0]->Religion == 'Others' ? 'Selected' : '' ?>>Others</option>
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
                            <option value="Educated" <?php echo isset($userDetails, $userDetails[0]->LiteracyStatus) && $userDetails[0]->LiteracyStatus == 'Educated' ? 'Selected' : '' ?>>Educated</option>
                            <option value="Semieducated" <?php echo isset($userDetails, $userDetails[0]->LiteracyStatus) && $userDetails[0]->LiteracyStatus == 'Semieducated' ? 'Selected' : '' ?>>Semieducated</option>
                            <option value="Uneducated" <?php echo isset($userDetails, $userDetails[0]->LiteracyStatus) && $userDetails[0]->LiteracyStatus == 'Uneducated' ? 'Selected' : '' ?>>Uneducated</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="Profession" class=" form-control-label">Profession :</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="Profession" name="Profession" value="<?php echo @$userDetails[0]->Profession; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="VoterId" class=" form-control-label">Voter Id:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="VoterId" name="VoterId" value="<?php echo @$userDetails[0]->VoterId; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="WardId" class=" form-control-label">Ward:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="WardId" id="WardId" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            <option value="1" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '1' ? 'Selected' : '' ?>>Thorkapa 1</option>
                            <option value="2" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '2' ? 'Selected' : '' ?>>Thorkapa 2</option>
                            <option value="3" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '3' ? 'Selected' : '' ?>>Kalika</option>
                            <option value="4" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '4' ? 'Selected' : '' ?>>Yamunadanda</option>
                            <option value="5" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '5' ? 'Selected' : '' ?>>Sunkhani</option>
                            <option value="6" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '6' ? 'Selected' : '' ?>>Thumpakhar</option>
                            <option value="7" <?php echo isset($userDetails, $userDetails[0]->WardId) && $userDetails[0]->WardId == '7' ? 'Selected' : '' ?>>Pangretar</option>
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
                            <option value="Alive" <?php echo isset($userDetails, $userDetails[0]->IsAlive) && $userDetails[0]->IsAlive == 'Alive' ? 'Selected' : '' ?>>Alive</option>
                            <option value="Dead" <?php echo isset($userDetails, $userDetails[0]->IsAlive) && $userDetails[0]->IsAlive == 'Dead' ? 'Selected' : '' ?>>Dead</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="IsBoarded" class=" form-control-label">Is Boarder:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="IsBoarded" id="IsBoarded" class="form-control">
                            <option disabled>Please select</option>
                            <option value="NO" <?php echo isset($userDetails, $userDetails[0]->IsBoarded) && $userDetails[0]->IsBoarded == 'No' ? 'Selected' : '' ?>>NO</option>
                            <option value="Yes" <?php echo isset($userDetails, $userDetails[0]->IsBoarded) && $userDetails[0]->IsBoarded == 'Yes' ? 'Selected' : '' ?>>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">

                    <div class="col col-md-3">
                        <label for="BoardedCountry" class=" form-control-label">Boarder Country:</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="BoardedCountry" name="BoardedCountry" value="<?php echo @$userDetails[0]->BoardedCountry; ?>" class="form-control">
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