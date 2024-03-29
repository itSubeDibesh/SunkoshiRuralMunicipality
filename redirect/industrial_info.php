<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$_title = 'Industrial Infromation';
require '../inc/header.php';
$ind = new Industrial();
$web = new Website();
$indInfo = $ind->getAllIndustrialInfo();
$webInfo = $web->getByID(4);
?>
<link href="<?php echo ADMIN_ASSETS . '/DataTables/datatables.min.css'; ?>" rel="stylesheet" media="all">
<br><br><br><br><br>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12 col-12">
			<div class="property-agent">
				<h2 class="title-agent" style="text-align: center;">Industrial Information</h2>
				<p class="color-text-a">
					<?php echo $webInfo[0]->Summery; ?>
				</p>
			</div>
		</div>
	</div>
</div>
<br>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12 col-12">
			<img style="width:70%;padding-left:30%;" src="<?php echo UPLOAD_URL . '/web/' . $webInfo[0]->Image; ?>">
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
<?php
require '../inc/footer.php';
?>
<script src="<?php echo ADMIN_ASSETS . '/DataTables/dataTables.min.js' ?>"></script>
<script>
	$(document).ready(function() {
		$('.table').DataTable();
	});
</script>