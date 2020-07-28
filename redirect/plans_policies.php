<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$_title = 'Plans And Policies';
require '../inc/header.php';
$plans = new PlansAndPolicies();
$planInf = $plans->getAllPlans();
$policyInf = $plans->getAllPolicies();
?>
<hr>
<section class="intro-single">
<div class="container">
    <h2>Plans</h2>
    <hr>
    <div class="news-wrapper">
        <div class="row">
            <?php
            if (isset($planInf)) {
                foreach ($planInf as $value) {
                    if ($value->status == 'active') {
                        ?>
                        <div class="col-lg-3">
                            <div class="money-listing">
                                <h5><?php echo $value->PlaneName; ?></h5>
                                <i style="color:red" class="fa fa-file-pdf-o"> </i> <a href="<?php echo UPLOAD_URL . '/plansandpolicies/' . $value->PlaneImg; ?>"><?php echo $value->PlaneImg; ?></a>
                                <?php echo date('Y-m-d h:i:s A', strtotime($value->UploadedDate)) ?>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
            ?>
        </div>
    </div>
    <hr>
</div>
</section>
<div class="container">
    <h2>Policies</h2>
    <hr>
    <div class="news-wrapper">
        <div class="row">
            <?php
            if (isset($policyInf)) {
                foreach ($policyInf as $value) {
                    if ($value->status == 'active') {
                        ?>
                        <div class="col-lg-3">
                            <div class="money-listing">
                                <h5><?php echo $value->PolicyName; ?></h5>
                                <i style="color:red" class="fa fa-file-pdf-o"> </i> <a href="<?php echo UPLOAD_URL . '/plansandpolicies/' . $value->PolicyImg; ?>"><?php echo $value->PolicyImg; ?></a>
                                <?php echo date('Y-m-d h:i:s A', strtotime($value->UploadedDate)) ?>
                            </div>
                        </div>
                    <?php
                    }
                }
            }
            ?>
        </div>
    </div>
    <hr>
</div>

<?php
require '../inc/footer.php';
?>