<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$news_event = new News_Event();
$photos = new Photos();
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $info = $news_event->getNewsEventsById($id);
    $action = 'Update';
} else {
    $action = 'Add';
}
$title = ucfirst($_SESSION['Role']) .' '.$action. " News || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';


?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/newsList.php'; ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to news List</a>
    </div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> news and events</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo ADMIN_RENDER . '/common/news_event.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <div class="form-group row">
                    <label for="" class="col-sm-3">Title: </label>
                    <div class="col-sm-9">
                        <input type="text" name="title" required value="<?php echo @$info[0]->Title; ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3">Summary: </label>
                    <div class="col-sm-9">
                        <textarea name="summary" id="summary" rows="5" style="resize: none;" class="form-control"><?php echo @$info[0]->Summary; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Description: </label>
                    <div class="col-sm-9">
                        <textarea id="description" name="description" rows="10" class="form-control"><?php echo @$info[0]->Description; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Type: </label>
                    <div class="col-sm-9">
                        <select name="type" required id="type" class="form-control">
                            <option>Please Select</option>
                            <option value="news" <?php echo isset($info, $info[0]->Type) && $info[0]->Type == 'news' ? 'selected' : "" ?>>News</option>
                            <option value="events" <?php echo isset($info, $info[0]->Type) && $info[0]->Type == 'events' ? 'selected' : "" ?>>Events</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Location: </label>
                    <div class="col-sm-9">
                        <input type="text" value="<?php echo @$info[0]->Location; ?>" name="location" placeholder="Enter location here." class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Status: </label>
                    <div class="col-sm-9">
                        <select name="status" required id="status" class="form-control">
                            <option value="active" <?php echo isset($info, $info[0]->Status) && $info[0]->Status == 'active' ? 'selected' : "" ?>>Active</option>
                            <option value="inactive" <?php echo isset($info, $info[0]->Status) && $info[0]->Status == 'inactive' ? 'selected' : "" ?>>In-Active</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Image: </label>
                    <div class="col-sm-4">
                        <input type="file" name="image" accept="image/*">
                    </div>
                    <?php
                    if (@$info[0]->Image) {
                        ?>
                        <img src="<?php echo UPLOAD_URL . '/news_event/' . $info[0]->Image; ?>" class="responsive" style="max-width: 150px;">
                    <?php
                    }
                    ?>
                </div>
                <input type="hidden" name="old_image" value="<?php echo @$info[0]->Image; ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
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