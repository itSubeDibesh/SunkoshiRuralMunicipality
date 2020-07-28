<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Industrial List || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$industry = new Industrial();
$industry_info = $industry->getAllIndustrialInfo();
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/industrialAdd.php'; ?>">
            <i class="zmdi zmdi-plus"></i>add Industry</a>
    </div>
</div>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>Industry List</h3>
    </div>
    <br>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <th class="text-center">S.N</th>
                <th class="text-center">Industry Name</th>
                <th class="text-center">Owner Name</th>
                <th class="text-center">Location</th>
                <th class="text-center">Type</th>
                <th class="text-center">Operating</th>
            </thead>
            <tbody>
                <?php
                foreach ($industry_info as $key => $value) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $key+1; ?></td>
                        <td class="text-center"><?php echo $value->Name; ?></td>
                        <td class="text-center"><?php echo $value->OwnerName; ?></td>
                        <td class="text-center"><?php echo $value->Location; ?></td>
                        <td class="text-center"><?php echo $value->Type; ?></td>
                        <td class="text-center"><?php echo $value->isPreasent; ?></td>
                    </tr>
                <?php
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