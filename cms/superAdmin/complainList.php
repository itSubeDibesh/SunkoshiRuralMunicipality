<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Complain List || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$problem = new Complain();
$ProblemList = $problem->getAll();
?>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>Complain list</h3>
    </div>
    <br>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <th class="text-center">SN</th>
                <th class="text-center">Name</th>
                <th class="text-center">Address</th>
                <th class="text-center">Action</th>
                <th class="text-center">Type</th>
                <th class="text-center">Status</th>

            </thead>
            <tbody>
                <?php
                if ($ProblemList) {
                    foreach ($ProblemList as $key => $variableList) {
                        if ($variableList->Status != 'Solved') {
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $key + 1; ?></td>
                                <td class="text-center"><strong><?php echo ucfirst($variableList->Name); ?></strong></td>
                                <td class="text-center"><strong><?php echo ucfirst($variableList->Address); ?></strong></td>
                                <td class="text-center"><a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/complainUpdate.php?id=' . $variableList->id; ?>" style="border-radius:50%" class="btn btn-success">
                                        <i class="fa fa-edit"></i></a>
                                </td>
                                <td class="text-center"><strong><?php echo ucfirst($variableList->Type); ?></strong></td>
                                <td class="text-center"><strong><?php echo ucfirst($variableList->Status); ?></strong></td>
                            </tr>
                        <?php
                        }
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