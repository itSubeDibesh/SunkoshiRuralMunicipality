<?php $web = new Website();
$webInfo = $web->getByID(5);
$news = new News_Event();
$news_info = $news->getNewsEventsByType('news'); ?>
<section class="section-footer">
  <div class="container">
  <div class="w-header-a">
        <h3 class="w-title-a text-brand">सुनkoshi feels heaven in earth</h3>
      </div>
      <br>
    <div class="row">
      <div class="col-md-6 col-lg-4 col-12">
        <img style="width:100%;" src="<?php echo UPLOAD_URL . '/web/' . $webInfo[0]->Image; ?>">
      </div>
      <div class="col-md-6 col-lg-8 col-12">
        <div class="w-body-a">
          <p class="w-text-a color-text-a">
            <?php echo $webInfo[0]->Summery; ?>
          </p>
        </div>
      </div>
      <div class="w-footer-a col-12">
        <ul class="list-unstyled">
          <li class="color-a">
            <span class="color-text-a">Phone :</span> 9861315234,9813570528</li>
          <li class="color-a">
            <span class="color-text-a">Email :</span> <a href="mailto:kingraj530@gmail.com">kingraj530@gmail.com</a>
          </li>
          <li class="color-a">
            <span class="color-text-a">CC :</span> <a href="mailto:rohanpuri325@gmail.com">rohanpuri325@gmail.com</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-12">
        <nav class="nav-footer">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a href="<?php echo SITE_URL . '/index.php' ?>">Home</a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo '../redirect/about.php' ?>">About</a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo '../redirect/news_and_events.php' ?>">News and Events</a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo '../redirect/plans_policies.php' ?>">Plans and Policies</a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo '../redirect/organizational_info.php' ?>">Organizations</a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo '../redirect/industrial_info.php' ?>">Industries</a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo '../redirect/contact.php' ?>">Contact</a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo '../redirect/gallery.php' ?>">Gallery</a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo '../redirect/faq.php' ?>">FAQ</a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo '../redirect/complain.php' ?>">Complain</a>
            </li>
            <li class="list-inline-item">
              <a href="<?php echo '../redirect/problem.php' ?>">Problem</a>
            </li>
            <li class="list-inline-item">
              <a href="../cms/index.php">Login</a>
            </li>
          </ul>
        </nav>
        Know more on
        <div class="socials-a">
          <ul class="list-inline">
            <li class="list-inline-item">
              <a href="https://www.facebook.com/SunkoshiRuralMunicipality/">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
            </li>
            <li class="list-inline-item">
                <a href="https://twitter.com/sunkoshimun">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
          </ul>
        </div>
        <div class="copyright-footer">
          <p class="copyright color-text-a">
            &copy; Copyright
            <span class="color-a">2019 Sunkoshi rular minucapility</span> All Rights Reserved. <p class="color-a">Created By <a href="mailto:kingraj530@gmail.com">Dibesh Raj Subedi</a></p>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--/ Footer End /-->
</body>

</html>
<!-- JavaScript Libraries -->
<script src="<?php echo LIB_URL . '/jquery/jquery.min.js' ?>"></script>
<script src="<?php echo LIB_URL . '/jquery/jquery-migrate.min.js' ?>"></script>
<script src="<?php echo LIB_URL . '/popper/popper.min.js' ?>"></script>
<script src="<?php echo LIB_URL . '/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo LIB_URL . '/easing/easing.min.js' ?>"></script>
<script src="<?php echo LIB_URL . '/owlcarousel/owl.carousel.min.js' ?>"></script>
<script src="<?php echo LIB_URL . '/scrollreveal/scrollreveal.min.js' ?>"></script>
<!-- Template Main Javascript File -->
<script src="<?php echo JS_URL . '/main.js' ?>"></script>