<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Plans And Policies List || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$planspolicies = new PlansAndPolicies();
$get_all = $planspolicies->getAll();
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansAdd.php'; ?>">
            <i class="zmdi zmdi-plus"></i>add Plans and policies</a>
    </div>
</div>
<!--table starts -->
<div class="col-lg-12">
    <div class="header">
        <h3>Plans and policies List</h3>
    </div>
    <br>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <th>SN</th>
                <th>Title</th>
                <th>File</th>
                <th>Action</th>
                <th>Type</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php
                foreach ($get_all as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <?php if ($value->Type == 'Plan') {
                            ?>
                            <td><?php echo $value->PlaneName; ?></td>
                        <?php
                        }else if($value->Type == 'Policy'){
                            ?>
                            <td><?php echo $value->PolicyName; ?></td>
                            <?php
                        } 
                        ?>
                        <?php if ($value->Type == 'Plan') {
                            ?>
                            <td><i style="color:red" class="fa fa-file-pdf"></i> <a href="<?php echo UPLOAD_URL.'/plansandpolicies/'.$value->PlaneImg;?>"><?php echo $value->PlaneImg; ?></a></td>
                        <?php
                        }else if($value->Type == 'Policy'){
                            ?>
                            <td><i style="color:red" class="fa fa-file-pdf"></i> <a href="<?php echo UPLOAD_URL.'/plansandpolicies/'.$value->PolicyImg;?>"><?php echo $value->PolicyImg; ?></a></td>
                            <?php
                        } 
                        ?>
                        <td> <a href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansAdd.php?id=' . $value->Id . '&&type=' . $value->Type; ?>" style="border-radius:50%" class="btn btn-success">
                                <i class="fa fa-edit"></i></a>
                            <a href="<?php echo ADMIN_RENDER . '/common/plansandpolicies.php?id=' . $value->Id . '&&Action=Delete&&type='. $value->Type;; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this news/event?')" style="border-radius: 50%">
                                <i class="fa fa-trash"></i></a>
                        </td>
                        <td><?php echo ucfirst($value->Type); ?></td>
                        <td><?php echo ucfirst($value->status); ?></td>
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