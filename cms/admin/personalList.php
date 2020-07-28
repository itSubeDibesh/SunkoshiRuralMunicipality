<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Citizen List || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$personnel = new Personal();
$userList = $personnel->getAllPerson();
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalAdd.php'; ?>">
            <i class="zmdi zmdi-plus"></i>add citizen</a>
    </div>
</div>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>Citizens List</h3>
    </div>
    <br>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <th class="text-center">S.N</th>
                <th class="text-center">Fullname</th>
                <th class="text-center">Permanent Address</th>
                <th class="text-center">Action</th>
                <th class="text-center">Citizenship No</th>
                <th class="text-center">Ward No</th>
                <th class="text-center">Voter Id</th>
            </thead>
            <tbody>
                <?php
                if ($userList) {
                    foreach ($userList as $key => $details) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $key + 1; ?></td>
                            <td class="text-center"><?php echo $details->Name; ?></td>
                            <td class="text-center"><?php echo $details->PermanentAddress; ?></td>
                            <td class="text-center">
                                <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalAdd.php?id=' . $details->PersonalinfoID; ?>" style="border-radius:50%" class="btn btn-success">
                                    <i class="fa fa-edit"></i></a>
                                <a href="<?php echo ADMIN_RENDER . '/common/personal.php?id=' . $details->PersonalinfoID.'&&Action=Delete';?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this citizen?')" style="border-radius: 50%">
                                    <i class="fa fa-trash"></i></a>
                            </td>
                            <td class="text-center"><?php echo $details->CitizenshipNo; ?></td>
                            <td class="text-center"><?php echo $details->WardId; ?></td>
                            <td class="text-center"><?php echo $details->VoterId; ?></td>
                        </tr>
                    <?php
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