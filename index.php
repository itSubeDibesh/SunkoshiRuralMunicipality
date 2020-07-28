<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$news = new News_Event();
$photos = new Photos();
$video = new Video();
$web = new Website();
$news_info = $news->getNewsEventsByType('news');
$events_info = $news->getNewsEventsByType('events');
$photos_info = $photos->getAllPhotos();
$video_info = $video->getAllVideo();
$webInfo = $web->getByID(5);
require 'inc/header.php';
?>
<!--Image slider-->
<div class="intro intro-carousel">
  <div id="carousel" class="owl-carousel owl-theme">
    <div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo UPLOAD_URL . '/home/3.jpg'; ?>)">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                  <p class="intro-title-top">Where water flows like in heaven.
                  </p>
                  <h1 class="intro-title mb-4">
                    <span class="color-b">सुनकोशी </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo UPLOAD_URL . '/home/4.jpg'; ?>)">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                  <p class="intro-title-top">Where greenery surrounds.
                  </p>
                  <h1 class="intro-title mb-4">
                    सुनकोशी
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item-a intro-item bg-image" style="background-image: url(<?php echo UPLOAD_URL . '/home/2.jpg'; ?>)">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                  <p class="intro-title-top">Where journey begins.
                  </p>
                  <h1 class="intro-title mb-4">
                    <span class="color-b">सुनकोशी </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<hr>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
      <div class="property-agent">
        <h2 class="title-agent" style="text-align: center;">Feel heaven in earth</h2>
      </div>
    </div>
  </div>
</div>
<br>
<!--Image slider Ends-->
<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-12 col-12">
      <img style="width:100%;" src="<?php echo UPLOAD_URL . '/web/' . $webInfo[0]->Image; ?>">
    </div>
    <div class="col-md-12 col-lg-12 col-12">
      <div class="property-agent">
        <p class="color-text-a">
          <?php echo html_entity_decode($webInfo[0]->Description); ?>
        </p>
      </div>
    </div>
  </div>
</div>
<hr>
<br>
<section class="news">
  <div class="container">
    <div>
      <h2><a href="#">News</a></h2>
      <p><a href="./redirect/news_and_events.php">View More <i class="fa fa-bars" aria-hidden="true"></i></a></p>
    </div>
    <div class="news-wrapper">
      <div class="row">

        <div class="col-lg-5 col-md-6 col-sm-12">
          <div class="politics-img-news news-title">
            <?php
            if (isset($news_info[0]) && @$news_info[0]->Type == 'news') {
              ?>
            <img class="carousel-item-a intro-item bg-image" src="<?php echo UPLOAD_URL . '/news_event/' . @$news_info[0]->Image; ?>" style="max-width: 300px; height: auto;">
            <h2><a href="./redirect/news.php?id=<?php echo @$news_info[0]->InfoId; ?>"> <?php echo @$news_info[0]->Title; ?></a></h2>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-12">
          <div class="politics-news-list">
            <div class="listing">
              <div class="row">
                <?php
                if (@$news_info) {
                  ?>
                <div class="col-md-4">
                  <?php
                    if (isset($news_info[1])) {
                      ?>
                  <a><i><img style="max-width: 200px; height: auto;" src="<?php echo UPLOAD_URL . '/news_event/' . $news_info[1]->Image; ?>">&nbsp</i></a>
                  <?php
                    }
                    ?>
                </div>
                <div class="col-md-8">
                  <h3><a href="./redirect/news.php?id=<?php echo @$news_info[1]->InfoId; ?>">
                      <?php echo @$news_info[1]->Title; ?></a></h3>
                  <p>
                    <?php echo @$news_info[1]->Summary; ?>
                  </p>
                </div>
                <div class="col-md-4">
                  <?php
                    if (isset($news_info[2])) {
                      ?>
                  <a><i><img style="max-width: 200px; height: auto;" src="<?php echo UPLOAD_URL . '/news_event/' . $news_info[2]->Image; ?>">&nbsp</i></a>
                  <?php
                    }
                    ?>
                </div>
                <div class="col-md-8">
                  <h3><a href="./redirect/news.php?id=<?php echo @$news_info[2]->InfoId; ?>">
                      <?php echo @$news_info[2]->Title; ?></a></h3>
                  <p>
                    <?php echo @$news_info[2]->Summary; ?>
                  </p>
                </div>
                <div class="col-md-4">
                  <?php
                    if (isset($news_info[3])) {
                      ?>
                  <a><i><img style="max-width: 200px; height: auto;" src="<?php echo UPLOAD_URL . '/news_event/' . $news_info[3]->Image; ?>">&nbsp</i></a>
                  <?php
                    }
                    ?>
                </div>
                <div class="col-md-8">
                  <h3><a href="./redirect/news.php?id=<?php echo @$news_info[3]->InfoId; ?>">
                      <?php echo @$news_info[3]->Title; ?></a></h3>
                  <p>
                    <?php echo @$news_info[3]->Summary; ?>
                  </p>
                </div>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<hr>
<br>
<br>
<section class="events">
  <div class="container">
    <div>
      <h2><a href="#">Events</a></h2>
      <p><a href="./redirect/news_and_events.php">View More <i class="fa fa-bars" aria-hidden="true"></i></a></p>
    </div>
    <div class="news-wrapper">
      <div class="row">

        <div class="col-lg-5 col-md-6 col-sm-12">
          <div class="politics-img-news news-title">
            <?php
            if (@$events_info[0]->Type == 'events') {
              ?>
            <img class="carousel-item-a intro-item bg-image" src="<?php echo UPLOAD_URL . '/news_event/' . @$events_info[0]->Image; ?>" style="max-width: 300px; height: auto;">
            <h2><a href="./redirect/news.php?id=<?php echo @$events_info[0]->InfoId; ?>"><?php echo @$events_info[0]->Title; ?></a></h2>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-12">
          <div class="politics-news-list">
            <div class="listing">
              <div class="row">
                <?php
                if (@$events_info) {
                  foreach (@$events_info as $key => $events_in) {
                    if ($key > 0 && $key <= 3) {
                      ?>
                <div class="col-md-4">
                  <a><i><img style="max-width: 200px; height: auto;" src="<?php echo UPLOAD_URL . '/news_event/' . $events_in->Image; ?>">&nbsp</i></a>
                </div>
                <div class="col-md-8">
                  <h3><a href="./redirect/news.php?id=<?php echo $events_in->InfoId; ?>">
                      <?php echo $events_in->Title; ?></a></h3>
                  <p>
                    <?php echo $events_in->Summary; ?>
                  </p>
                </div>
                <?php
                    }
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<hr>
<br>
<br>
<section class="photos">
  <div class="container">
    <div class="section-title">
      <h2><a href="#">Photos</a></h2>
      <p><a href="./redirect/gallery.php">View All <i class="fa fa-bars" aria-hidden="true"></i></a></p>
    </div>
    <div class="news-wrapper">
      <div class="row">
        <div class="col-lg-3">
          <?php if (isset($photos_info[0])) {
            ?>
          <a href="<?php echo UPLOAD_URL . '/photos/' . $photos_info[0]->Image; ?>"><i><img style="max-width: 200px; height: auto;" src="<?php echo UPLOAD_URL . '/photos/' . $photos_info[0]->Image; ?>">&nbsp</i></a>
          <h3><a href="./redirect/gallery-detail.php?id=<?php echo $photos_info[0]->PhotoId; ?>"><?php echo $photos_info[0]->Title; ?></a></h3>
          <?php
          }
          ?>
        </div>
        <div class="col-lg-3">
          <?php if (isset($photos_info[1])) {
            ?>
          <a href="<?php echo UPLOAD_URL . '/photos/' . $photos_info[1]->Image; ?>"><i><img style="max-width: 200px; height: auto;" src="<?php echo UPLOAD_URL . '/photos/' . $photos_info[1]->Image; ?>">&nbsp</i></a>
          <h3><a href="./redirect/gallery-detail.php?id=<?php echo $photos_info[1]->PhotoId; ?>"><?php echo $photos_info[1]->Title; ?></a></h3>
          <?php
          }
          ?>
        </div>
        <div class="col-lg-3">
          <?php if (isset($photos_info[2])) {
            ?>
          <a href="<?php echo UPLOAD_URL . '/photos/' . $photos_info[2]->Image; ?>"><i><img style="max-width: 200px; height: auto;" src="<?php echo UPLOAD_URL . '/photos/' . $photos_info[2]->Image; ?>">&nbsp</i></a>
          <h3><a href="./redirect/gallery-detail.php?id=<?php echo $photos_info[2]->PhotoId; ?>"><?php echo $photos_info[2]->Title; ?></a></h3>
          <?php
          }
          ?>
        </div>
        <div class="col-lg-3">
          <?php if (isset($photos_info[3])) {
            ?>
          <a href="<?php echo UPLOAD_URL . '/photos/' . $photos_info[3]->Image; ?>"><i><img style="max-width: 200px; height: auto;" src="<?php echo UPLOAD_URL . '/photos/' . $photos_info[3]->Image; ?>">&nbsp</i></a>
          <h3><a href="./redirect/gallery-detail.php?id=<?php echo $photos_info[3]->PhotoId; ?>"><?php echo $photos_info[3]->Title; ?></a></h3>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<hr>
<br>
<br>
<section class="videos">
  <div class="container">
    <div class="section-title">
      <h2><a href="#">Videos</a></h2>
      <p><a href="./redirect/gallery.php">View All <i class="fa fa-bars" aria-hidden="true"></i></a></p>
    </div>
    <div class="news-wrapper">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="big-video">
            <?php if (isset($video_info[0])) {
              ?>
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo @$video_info[0]->VideoLinkId; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <h3><a href="https://www.youtube.com/embed/<?php echo @$video_info[0]->VideoLinkId; ?>"><?Php echo @$video_info[0]->Title; ?></a></h3>
          </div>
          <?php
          }
          ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="big-video">
            <?php if (isset($video_info[1])) {
              ?>
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo @$video_info[1]->VideoLinkId; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <h3><a href="https://www.youtube.com/embed/<?php echo @$video_info[1]->VideoLinkId; ?>"><?Php echo @$video_info[1]->Title; ?></a></h3>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          <?php if (isset($video_info[2])) {
            ?>
          <div class="small-video">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo @$video_info[2]->VideoLinkId; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <h3><a href="https://www.youtube.com/embed/<?php echo @$video_info[2]->VideoLinkId; ?>"><?Php echo @$video_info[2]->Title; ?></a></h3>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="col-lg-3">
          <?php if (isset($video_info[3])) {
            ?>
          <div class="small-video">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo @$video_info[3]->VideoLinkId; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <h3><a href="https://www.youtube.com/embed/<?php echo @$video_info[3]->VideoLinkId; ?>"><?Php echo @$video_info[3]->Title; ?></a></h3>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="col-lg-3">
          <?php if (isset($video_info[4])) {
            ?>
          <div class="small-video">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo @$video_info[4]->VideoLinkId; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <h3><a href="https://www.youtube.com/embed/<?php echo @$video_info[4]->VideoLinkId; ?>"><?Php echo @$video_info[4]->Title; ?></a></h3>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="col-lg-3">
          <?php if (isset($video_info[5])) {
            ?>
          <div class="small-video">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo @$video_info[5]->VideoLinkId; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <h3><a href="https://www.youtube.com/embed/<?php echo @$video_info[5]->VideoLinkId; ?>"><?Php echo @$video_info[5]->Title; ?></a></h3>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<hr>
<?php
require 'inc/footer.php';
?>