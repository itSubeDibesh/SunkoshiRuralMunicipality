<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$web = new Website();
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $myId = $_GET['id'];
    $UpdateWeb = $web->getByID($myId);
    $action = 'Update';
} else { 
    redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/webList.php', 'error', 'Unauthorized access');
}
$title = ucfirst($_SESSION['Role']) ." ".$action.  " Webpage || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/webList.php' ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to webpage list</a>
    </div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> webpage</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo ADMIN_RENDER . '/common/web.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <input type="hidden" name="Id" value="<?php echo @$UpdateWeb[0]->Id; ?>">
                <div class="form-group row">
                    <label for="" class="col-sm-3">Title: </label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php echo @$UpdateWeb[0]->Title; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3">Summery: </label>
                    <div class="col-sm-9">
                        <textarea name="Summery" id="Summery" rows="5" style="resize: none;" class="form-control"><?php echo @$UpdateWeb[0]->Summery; ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3">Description: </label>
                    <div class="col-sm-9">
                        <textarea name="description" id="description" rows="10" style="resize: none;" class="form-control"><?php echo @$UpdateWeb[0]->Description; ?></textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="image" class=" form-control-label">Update Image:</label>
                    </div>
                    <div class="col col-md-4">
                        <input type="file" id="image" name="image" class="form-control-file" accept="image/*">
                    </div>
                </div>
                <input type="hidden" name="old_image" value="<?php echo @$UpdateWeb[0]->Image?>">
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