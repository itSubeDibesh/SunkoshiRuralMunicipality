 <!-- FOOTER -->
 <section>
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12">
                 <div class="copyright">
                     <p class="copyright color-text-b">
                         &copy; Copyright
                         <span style="color:black;">2019 Sunkoshi rular minucapility</span> All Rights Reserved.
                     </p>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- END FOOTER -->
 </div>
 </body>

 </html>
 <!-- Jquery JS -->
 <script src="<?php echo ADMIN_JS; ?>/jquery-3.2.1.min.js"></script>
 <!-- Bootstrap JS -->
 <script src="<?php echo ADMIN_JS; ?>/popper.min.js"></script>
 <script src="<?php echo ADMIN_JS; ?>/bootstrap.min.js"></script>
 <!-- Vendor JS -->
 <script src="<?php echo ADMIN_JS; ?>/slick.min.js">
 </script>
 <script src="<?php echo ADMIN_JS; ?>/wow.min.js"></script>
 <script src="<?php echo ADMIN_JS; ?>/animsition.min.js"></script>
 <script src="<?php echo ADMIN_JS; ?>/jquery.waypoints.min.js"></script>
 <script src="<?php echo ADMIN_JS; ?>/jquery.counterup.min.js">
 </script>
 <script src="<?php echo ADMIN_JS; ?>/circle-progress.min.js"></script>
 <script src="<?php echo ADMIN_JS; ?>/perfect-scrollbar.js"></script>
 <script src="<?php echo ADMIN_JS; ?>/select2.min.js"></script>
 <!-- Main JS -->
 <script src="<?php echo ADMIN_JS; ?>/main.js"></script>
 <!-- Change JS -->
 <script>
     setTimeout(function() {
         $('.alert').slideUp();
     }, 4000);
 </script>
 <script src="<?php echo ADMIN_ASSETS . '/tinymce/js/tinymce/tinymce.min.js' ?>"></script>
 <script>
     tinymce.init({
         selector: "#description",
         plugins: 'print preview searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount  imagetools textpattern help ',
         toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
         paste_data_images: true,
         theme: 'silver',
         mobile: {
             theme: 'mobile',
             plugins: ['autosave', 'lists', 'autolink'],
             toolbar: ['undo', 'bold', 'italic', 'styleselect']
         }
     });
 </script>
 <script src="<?php echo ADMIN_ASSETS . '/DataTables/dataTables.min.js' ?>"></script>
 <script>
     $(document).ready(function() {
         $('.table').DataTable();
     });
 </script>
 <!-- end document-->