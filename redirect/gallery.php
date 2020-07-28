<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$_title = 'Gallery';
$photos = new Photos();
$video = new Video();
$video_info = $video->getAllVideo();
$photos_info = $photos->getAllPhotos();
require '../inc/header.php';
?>
<hr>
<section class="intro-single">
<div class="container">
	<h2  class="title-agent" style="text-align: center;">Photo Gallery</h2>
	<hr>
	<div class="news-wrapper">
		<div class="row">
			<?php
			if (isset($photos_info)) {
				foreach ($photos_info as $value) {
					?>
					<div class="col-lg-3">
						<div class="money-listing">
							<a><i><img style="max-width: 200px; height: auto;" src="<?php echo UPLOAD_URL . '/photos/' . $value->Image; ?>">&nbsp</i></a>
							<h3><a href="<?php echo REDIR_URL . '/gallery-detail.php?id=' . $value->PhotoId; ?>"><?php echo $value->Title; ?></a></h3>
						</div>
					</div>
				<?php
				}
			}
			?>
		</div>
	</div>
</div>
</section>
<div class="container">
	<h2  class="title-agent" style="text-align: center;">Video Gallery</h2>
	<br>
	<hr>
	<div class="news-wrapper">
		<div class="row">
			<?php
			if (isset($video_info)) {
				foreach ($video_info as $value) {
					?>
					<div class="col-lg-3">
						<div class="small-video">
							<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $value->VideoLinkId; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
							<h3><a href="https://www.youtube.com/embed/<?php echo $value->VideoLinkId; ?>"><?Php echo $value->Title; ?></a></h3>

						</div>
					</div>
				<?php
				}
			}
			?>
			<br>
		</div>
	</div>
</div>
<?php
require '../inc/footer.php';
?>