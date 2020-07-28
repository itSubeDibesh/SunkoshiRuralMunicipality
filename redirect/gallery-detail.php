<?php require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$gallery = new Photos;
$gallery_images = new Gallery;
$no_gallery = false;
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    if ($id <= 0) {
        $no_gallery = true;
    } else {
        $gallery_info = $gallery->getPhotoById($id);
        if ($gallery_info) {
            $images = $gallery_images->getGalleryByphotoId($id);
        }
    }
} else {
    redirect('./');
}
$_title = @$gallery_info[0]->Title . ' || ' . SITE_TITLE;
require '../inc/header.php';
?>
<br><br><br><br><br><br><br><br>
<div class="gallery-inner">
    <div class="container">
        <h2 style="padding-left:40%;">Photo Gallery</h2>
        <br>
        <?php
        if ($no_gallery) {
            echo "Gallery not found.";
        } else {
            ?>
            <div class="full-gallery">
                <h2><?php echo $gallery_info[0]->Title; ?><span>
                        <h6><?php echo $gallery_info[0]->Summary; ?></h6>
                    </span></h2>
                <br>
                <div class="row">
                    <?php
                    if ($images) {
                        foreach ($images as $gal_image) {
                            ?>
                            <div class="col-sm-3">
                                <a href="<?php echo UPLOAD_URL . '/photos/' . $gal_image->image; ?>" data-lightbox="image" data-title="My caption">
                                    <img src="<?php echo UPLOAD_URL . '/photos/' . $gal_image->image; ?>" alt="" class="img img-responsive img-thumbnail">
                                </a>
                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<div id="lightboxOverlay" class="lightboxOverlay" style="width: 1343px; height: 785px; display: none;"></div>
<?php require '../inc/footer.php'; ?>