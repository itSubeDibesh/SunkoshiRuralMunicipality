<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$planspolicies = new PlansAndPolicies();
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $planPoliciesDetails = $planspolicies->getByID($id);
    $action = 'Update';
   
} else {
    $action = 'Add';
}
$title = ucfirst($_SESSION['Role']) ." ".$action. " Plans And Policies || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php'; ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to plans and policies List</a>
    </div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> plans and policies</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo ADMIN_RENDER . '/common/plansandpolicies.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <input type="hidden" name="Id" value="<?php echo @$planPoliciesDetails[0]->Id; ?>">
                <div class="form-group row">
                            <label for="" class="col-sm-3">Title: </label>
                            <div class="col-sm-9">
                                <input type="text" name="title" value="<?php if(@$planPoliciesDetails[0]->Type=='Policy'){echo @$planPoliciesDetails[0]->PolicyName;}else{echo @$planPoliciesDetails[0]->PlaneName;}?>" required placeholder="Enter title here." class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="type"value="<?php echo @$planPoliciesDetails[0]->Type;?>">
                        <div class="form-group row">
                            <label for="" class="col-sm-3">Type: </label>
                            <div class="col-sm-3">
                                <select name="type" id="type" required class="form-control"  <?php echo isset($planPoliciesDetails[0]->Type)? 'disabled ': '' ?>>
                                    <option disabled selected>--Select Any One--</option>
                                    <option value="Plan" <?php echo isset($planPoliciesDetails[0]->Type) && $planPoliciesDetails[0]->Type=='Plan'? 'Selected ': '' ?>> Plans</option>
                                    <option value="Policy" <?php echo isset($planPoliciesDetails[0]->Type) && $planPoliciesDetails[0]->Type=='Policy'? 'Selected': '' ?>>Policies</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="WardId" class=" form-control-label">Ward:</label>
                            </div>
                            <div class="col col-md-3">
                                <select name="WardId" id="WardId" class="form-control">
                                    <option disabled selected>-- Please select --</option>
                                    <option value="1" <?php echo isset($planPoliciesDetails, $planPoliciesDetails[0]->WardId) && $planPoliciesDetails[0]->WardId == '1' ? 'selected' : '' ?>>Thorkapa 1</option>
                                    <option value="2" <?php echo isset($planPoliciesDetails, $planPoliciesDetails[0]->WardId) && $planPoliciesDetails[0]->WardId == '2' ? 'selected' : '' ?>>Thorkapa 2</option>
                                    <option value="3" <?php echo isset($planPoliciesDetails, $planPoliciesDetails[0]->WardId) && $planPoliciesDetails[0]->WardId == '3' ? 'selected' : '' ?>>Kalika</option>
                                    <option value="4" <?php echo isset($planPoliciesDetails, $planPoliciesDetails[0]->WardId) && $planPoliciesDetails[0]->WardId == '4' ? 'selected' : '' ?>>Yamunadanda</option>
                                    <option value="5" <?php echo isset($planPoliciesDetails, $planPoliciesDetails[0]->WardId) && $planPoliciesDetails[0]->WardId == '5' ? 'selected' : '' ?>>Sunkhani</option>
                                    <option value="6" <?php echo isset($planPoliciesDetails, $planPoliciesDetails[0]->WardId) && $planPoliciesDetails[0]->WardId == '6' ? 'selected' : '' ?>>Thumpakhar</option>
                                    <option value="7" <?php echo isset($planPoliciesDetails, $planPoliciesDetails[0]->WardId) && $planPoliciesDetails[0]->WardId == '7' ? 'selected' : '' ?>>Pangretar</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Status: </label>
                            <div class="col-sm-9">
                            <select name="status" id="status" class="form-control">
                                    <option disabled selected>-- Please select --</option>
                                    <option value="active" <?php echo isset($planPoliciesDetails, $planPoliciesDetails[0]->status) && $planPoliciesDetails[0]->status == 'active' ? 'selected' : '' ?>>Active</option>
                                    <option value="inactive" <?php echo isset($planPoliciesDetails, $planPoliciesDetails[0]->status) && $planPoliciesDetails[0]->status == 'inactive' ? 'selected' : '' ?>>In-active</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-sm-3">File: </label>
                            <div class="col-sm-4">
                                <input type="file" name="file" accept=".pdf" class="form-control">
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