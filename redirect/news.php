<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$news = new News_Event;
$no_news = false;
if (isset($_GET, $_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    if ($id <= 0) {
        $no_news = true;
    } else {
        $news_info = $news->getNewsEventsById($id);
        if ($news_info) {
            $related_news = $news->getNewsEventsByType($news_info[0]->Type);
        }
    }
} else {
    redirect('./');
}

$_title = @$news_info[0]->Title . ' || ' . SITE_TITLE;
?>
<?php 
require '../inc/header.php'; ?>
<br><br><br><br><br><br><br><br>
<section class="news-inner">
    <div class="container">
        <?php
        if ($no_news) {
            echo "News not found.";
        } else {
            ?>
            <div class="full-news">
                <h2><?php echo $news_info[0]->Title; ?></h2>               
                <img style="max-width: 100%;" class="img img-responsive" src="<?php echo UPLOAD_URL . '/news_event/' . $news_info[0]->Image; ?>">
               <br><br>
                <?php echo html_entity_decode($news_info[0]->Description); ?>
                <span>
                	<br>
                	<br>
                    <em>Posted On: <?php echo date('Y-m-d h:i:s A', strtotime($news_info[0]->DateInserted)); ?></em>
                </span>
            </div>
            <br>                        
            <div class="news-wrapper">
                <div class="section-title more">
                    <h2>Related <?php echo @ucfirst($news_info[0]->Type);?></h2>
                </div>
                <br>
                <div class="more-list"></div>
                <div class="row">
                    <?php                           
                    foreach ($related_news as $value) {
                    if ($value->Type=='news'&&$value->Status=='active') {                    	
                    	if($value->InfoId!=$id)                    	
                    	{                    		
                    		?>
                    		<div class="col-lg-3 col-md-4 col-12">
                                <div class="more-news">
                                    <a>
                                        <img class="img img-responsive" src="<?php echo UPLOAD_URL . '/news_event/' . $value->Image; ?>" style="max-width: 250px; height: auto;">
                                    </a>
                                    <h5><a href="news.php?id=<?php echo $value->InfoId; ?>"><?php echo $value->Title; ?></a></h5>
                                </div>
                            </div>
                            <?php
                    	}                        
                }
                elseif($value->Type=='events'&&$value->Status=='active')
                {           
                	if($value->InfoId!=$id)    	
                	{
                	?>
            		<div class="col-lg-3 col-md-4 col-12">
                        <div class="more-news">
                            <a>
                                <img class="img img-responsive" src="<?php echo UPLOAD_URL . '/news_event/' . $value->Image; ?>" style="max-width: 200px; height: auto;">
                            </a>
                            <h5><a href="news.php?id=<?php echo $value->InfoId; ?>"><?php echo $value->Title; ?></a></h5>
                        </div>
                    </div>
                    <?php
                }
                }
                }

                 ?>
                </div>
            </div>
        </div>

    <?php
}
?>
    </div>
</section>

<?php require '../inc/footer.php'; ?>