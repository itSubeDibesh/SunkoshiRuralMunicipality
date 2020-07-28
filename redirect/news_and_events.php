<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$news = new News_Event();
$news_info = $news->getNewsEventsByType('news');
$events_info = $news->getNewsEventsByType('events');
$_title = 'News And Events';
require '../inc/header.php';
?>
<hr>
<section class="intro-single">
	<div class="container">
		<h2><a href="all_news.php">News</h2>
		<p>View More <i class="fa fa-bars" aria-hidden="true"></i></a></p>
		<div class="row" id="main_content">
			<?php
			foreach ($news_info as $key => $value1) {
				if ($value1->Type == 'news' && $value1->Status == 'active') {
					if ($key <= 2) {
						?>
			<div class="col-lg-6 col-md-4 col-sm-12">
				<div class="inner-img">
					<img class="img img-responsive" src="<?php echo UPLOAD_URL . '/news_event/' . $value1->Image; ?>" style="max-width: 60%; height: auto;">
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-sm-12">
				<div class="inner-details">
					<h2><a href="news.php?id=<?php echo $value1->InfoId; ?>"><?php echo $value1->Title; ?></a></h2>
					<p><?php echo html_entity_decode($value1->Summary); ?> </p>
				</div>
			</div>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</section>
<section class="events">
	<div class="container" id="events">
		<h2><a href="all_events.php">Events</h2>
		<p>View More <i class="fa fa-bars" aria-hidden="true"></i></a></p>
		<div class="row" id="main_content">
			<?php
			foreach ($events_info as $key2 => $value) {
				if ($value->Type == 'events' && $value->Status == 'active') {
					if ($key2 <= 2) {
						?>
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="inner-img">
					<a>
						<img class="img img-responsive" src="<?php echo UPLOAD_URL . '/news_event/' . $value->Image; ?>" style="max-width: 60%; height: auto;">
					</a>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-sm-6">
				<div class="inner-details">
					<h2><a href="news.php?id=<?php echo $value->InfoId; ?>"><?php echo $value->Title; ?></a></h2>
					<p><?php echo html_entity_decode($value->Summary); ?> </p>
				</div>
			</div>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
</section>
<?php
require '../inc/footer.php';
?>