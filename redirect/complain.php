<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$_title = 'Complains';
require '../inc/header.php';
?>
<hr>
<br><br><br><br>
<span><?php flash(); ?></span>
<section class="section-agents section-t8">
<div class="container">
    <div class="row">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3  class="title-agent" style="text-align: center;">Any complains ?</h3>
        </div>
        <div class="card-body card-block">
            <form action="<?php echo RENDER_URL . '/complain.php' ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="Action" value="Add">
                <div class="form-group row">
                    <label for="" class="col-sm-3">Name: </label>
                    <div class="col-sm-9">
                        <input type="text" name="Name" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Address: </label>
                    <div class="col-sm-9">
                        <input type="text" name="Address" required class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="WardId" class=" form-control-label">Ward:</label>
                    </div>
                    <div class="col col-md-3">
                        <select name="WardId" required id="WardId" class="form-control">
                            <option disabled selected>-- Please select --</option>
                            <option value="1">Thorkapa 1</option>
                            <option value="2">Thorkapa 2</option>
                            <option value="3">Kalika</option>
                            <option value="4">Yamunadanda</option>
                            <option value="5">Sunkhani</option>
                            <option value="6">Thumpakhar</option>
                            <option value="7">Pangretar</option>
                        </select>
                    </div>
                    <div class="col col-md-3">
                        <label for="Problem" class=" form-control-label">Problem related to: </label>
                    </div>
                    <div class="col col-md-3">
                        <select name="Type" required id="Type" class="form-control">
                            <option selected disabled>Please Select</option>
                            <option value="Case">Case</option>
                            <option value="Question">Question</option>
                            <option value="Suggestion">Suggestion</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Description: </label>
                    <div class="col-sm-9">
                        <textarea id="description" name="Description" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="fa fa-paper-plane"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>
</section>
<?php
require '../inc/footer.php';
?>
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
<script>
    setTimeout(function() {
        $('.alert').slideUp();
    }, 4000);
</script>