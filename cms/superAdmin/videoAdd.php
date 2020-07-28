<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$vd = new Video();			
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $myId = $_GET['id'];
    $UpdateVideo = $vd->getVideoById($myId);
    $action = 'Update';
} else {
    $action = 'Add';
}
$title = ucfirst($_SESSION['Role'])  ." ".$action. " Video || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';
?><div class="col-md-12">
<div class="overview-wrap">
    <h2 class="title-1"></h2>
    <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php'; ?>">
        <i class="fa fa-chevron-circle-left"></i> Back to video List</a>
</div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> video gallery</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo ADMIN_RENDER . '/common/videos.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <input type="hidden" name="VideoId" value="<?php echo @$UpdateVideo[0]->VideoId; ?>">
                <div class="form-group row">
                    <label for="" class="col-sm-3">Title: </label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php echo @$UpdateVideo[0]->Title;?>" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3">Description: </label>
                    <div class="col-sm-9">
                        <textarea name="description" id="description" rows="5" style="resize: none;" class="form-control"><?php echo @$UpdateVideo[0]->Description; ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3">Video Link (YouTube): </label>
                    <div class="col-sm-9">
                        <input type="url" name="video_link" value="<?php echo @$UpdateVideo[0]->VideoLink; ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Uploaded Status: </label>
                    <div class="col-sm-9">
                        <select name="status" required id="status" class="form-control" >
                            <option value="Active" <?php echo isset($UpdateVideo,$UpdateVideo[0]->Status) && $UpdateVideo[0]->Status == 'Active' ? 'Selected' : ''?>>Active</option>
                            <option value="Inactive" <?php echo isset($UpdateVideo,$UpdateVideo[0]->Status) && $UpdateVideo[0]->Status == 'Inactive' ? 'Selected' : ''?>>In-Active</option>
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