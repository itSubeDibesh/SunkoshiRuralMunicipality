<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
require $_SERVER['DOCUMENT_ROOT'] . '/cms/render/login/checklogin.php';
$photos=new Photos();			
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $photo_id = $_GET['id'];
    $photo_info = $photos->getPhotoById($photo_id);
    $gall = new Gallery();
    $gal_info = $gall->getGalleryByphotoId($photo_id);
    $action = 'Update';
} else {
    $action = 'Add';
}
$title = ucfirst($_SESSION['Role']) ." ".$action. " Photos || " . SITE_TITLE;
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/header.php';
require  $_SERVER['DOCUMENT_ROOT'] . '/cms/inc/sidebar.php';

?>
<div class="col-md-12">
    <div class="overview-wrap">
        <h2 class="title-1"></h2>
        <a class="au-btn au-btn-icon au-btn--blue" style="color:aliceblue" href="<?php echo CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/photoList.php'; ?>">
            <i class="fa fa-chevron-circle-left"></i> Back to photo List</a>
    </div>
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3><?php echo $action ?> photo gallery</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo ADMIN_RENDER . '/common/photos.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="PhotoId" value="<?php echo $photo_id ?>">
                <input type="hidden" name="Action" value="<?php echo $action ?>">
                <div class="form-group row">
                    <label for="" class="col-sm-3">Title: </label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php echo @$photo_info[0]->Title; ?>" required placeholder="Enter Gallery name here." class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3">Summary: </label>
                    <div class="col-sm-9">
                        <textarea name="summary" id="summary" rows="5" style="resize: none;" class="form-control"><?php echo @$photo_info[0]->Summary; ?></textarea>
                    </div>
                </div>
               	<div class="form-group row">
                    <label for="" class="col-sm-3">Photographer: </label>
                    <div class="col-sm-9">
                        <input type="text" value="<?php echo @$photo_info[0]->Photographer; ?>" name="photographer" placeholder="Enter Photographer Name here." class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Status: </label>
                    <div class="col-sm-9">
                        <select name="status" required id="status" class="form-control">
                            <option value="active"<?php echo isset($photo_info,$photo_info[0]->Status)&& $photo_info[0]->Status=='active'?'selected':"" ?>>Active</option>
                            <option value="inactive" <?php echo isset($photo_info,$photo_info[0]->Status)&& $photo_info[0]->Status=='inactive'?'selected':"" ?>>In-Active</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="" class="col-sm-3">Thumbnail Image: </label>
                    <div class="col-sm-4">
                        <input type="file" name="gallery_images" accept="image/*">
                    </div>                    
                    <?php 
                	if(@$photo_info[0]->Image)
                	{
                		?>                			
                			<img src="<?php echo UPLOAD_URL.'/photos/'.$photo_info[0]->Image; ?>" class="img img-responsive" style="max-width: 200px;">
                		<?php 
                	}
                 ?>                 
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Gallery Image: </label>
                    <div class="col-sm-4">
                        <input type="file" name="images[]" multiple accept="image/*">
                    </div>                                                   
                </div><br>
                <div class="form-group row">                    
                    <?php                 	
                	if(@$gal_info){?>
                		<label for="" class="col-sm-3">Gallery Images: </label>
                		<?php
                        foreach($gal_info as $value){                        	
                            ?>
                            <div class="col-sm-2">
                                <img src="<?php echo UPLOAD_URL.'/photos/'.$value->image;?>" class="img img-responsive" style="max-width: 150px;"> 
                                Delete <input type="checkbox" name="del_gall_img[]" value="<?php echo $value->image; ?>" style="max-width: 50px;">           
                             </div>
                            <?php
                        }
                    }
                 ?>                 
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