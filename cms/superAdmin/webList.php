<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Webpage List || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$web = new Website();
$WebList = $web->getAll();
?>
<!--table starts --> 
<div class="col-lg-12">
    <div class="header">
        <h3>Webpage list</h3>
    </div>
    <br>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <th class="text-center">SN</th>
                <th class="text-center">Title</th>
                <th class="text-center">Action</th>
                <th class="text-center">Image</th>
            </thead>
            <tbody>
                <?php
                if ($WebList) {
                    foreach ($WebList as $key => $variableList) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $key + 1; ?></td>
                            <td class="text-center"><strong><?php echo ucfirst($variableList->Title); ?></strong></td>
                            <td class="text-center"><a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/webUpdate.php?id=' . $variableList->Id; ?>" style="border-radius:50%" class="btn btn-success">
                                    <i class="fa fa-edit"></i></a>
                             </td>
                            <td class="text-center"> <img style="max-width: 100px;" src="<?php echo UPLOAD_URL . '/web/' . $variableList->Image; ?>" class="img img-thumbnail img-responsive"></td>
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