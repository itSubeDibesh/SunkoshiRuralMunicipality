<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$title = ucfirst($_SESSION['Role']) . " Update Problem || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
$problem = new Problem();
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $myId = $_GET['id'];
    $UpdateProblem = $problem->getByID($myId);
    $action = 'Update';
} else {
    redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/problemList.php', 'error', 'Unauthorized access');
}
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/problemList.php' ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to problem list</a>
    </div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> problem</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo RENDER_URL . '/problem.php'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <input type="hidden" name="Id" value="<?php echo @$UpdateProblem[0]->Id; ?>">
                <div class="form-group row">
                    <label for="" class="col-sm-3">Name: </label>
                    <div class="col-sm-9">
                        <input type="text" disabled name="Name" value="<?php echo @$UpdateProblem[0]->Name; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Type: </label>
                    <div class="col-sm-9">
                        <input type="text" disabled name="Type" value="<?php echo @$UpdateProblem[0]->Type; ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="Address" class=" form-control-label">Address:</label>
                    </div>
                    <div class="col col-md-3">
                        <input type="text" disabled name="Address" value="<?php echo @$UpdateProblem[0]->Address; ?>" class="form-control">
                    </div>
                    <div class="col col-md-3">
                        <label for="WardId" class=" form-control-label">Ward:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="WardId" id="WardId" disabled class="form-control">
                            <option value="1" <?php echo isset($UpdateProblem, $UpdateProblem[0]->WardId) && $UpdateProblem[0]->WardId == '1' ? 'selected' : '' ?>>Thorkapa 1</option>
                            <option value="2" <?php echo isset($UpdateProblem, $UpdateProblem[0]->WardId) && $UpdateProblem[0]->WardId == '2' ? 'selected' : '' ?>>Thorkapa 2</option>
                            <option value="3" <?php echo isset($UpdateProblem, $UpdateProblem[0]->WardId) && $UpdateProblem[0]->WardId == '3' ? 'selected' : '' ?>>Kalika</option>
                            <option value="4" <?php echo isset($UpdateProblem, $UpdateProblem[0]->WardId) && $UpdateProblem[0]->WardId == '4' ? 'selected' : '' ?>>Yamunadanda</option>
                            <option value="5" <?php echo isset($UpdateProblem, $UpdateProblem[0]->WardId) && $UpdateProblem[0]->WardId == '5' ? 'selected' : '' ?>>Sunkhani</option>
                            <option value="6" <?php echo isset($UpdateProblem, $UpdateProblem[0]->WardId) && $UpdateProblem[0]->WardId == '6' ? 'selected' : '' ?>>Thumpakhar</option>
                            <option value="7" <?php echo isset($UpdateProblem, $UpdateProblem[0]->WardId) && $UpdateProblem[0]->WardId == '7' ? 'selected' : '' ?>>Pangretar</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Description: </label>
                    <div class="col-sm-9">
                        <textarea name="description" readonly id="description" rows="10" style="resize: none;" class="form-control"><?php echo @$UpdateProblem[0]->Description; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Status: </label>
                    <div class="col-sm-9">
                        <select name="Status" id="Status" class="form-control">
                            <option disabled selected value="-- Please select one --"></option>
                            <option value="Solved" <?php echo isset($UpdateProblem, $UpdateProblem[0]->Status) && $UpdateProblem[0]->Status == 'Solved' ? 'selected' : '' ?>>Solved</option>
                            <option value="Pending" <?php echo isset($UpdateProblem, $UpdateProblem[0]->Status) && $UpdateProblem[0]->Status == 'Pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="Rejected" <?php echo isset($UpdateProblem, $UpdateProblem[0]->Status) && $UpdateProblem[0]->Status == 'Rejected' ? 'selected' : '' ?>>Rejected</option>
                            <option value="Working" <?php echo isset($UpdateProblem, $UpdateProblem[0]->Status) && $UpdateProblem[0]->Status == 'Working' ? 'selected' : '' ?>>Working</option>
                        </select>
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