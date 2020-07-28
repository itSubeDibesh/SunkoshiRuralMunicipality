<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$_title='Contacts';
require '../inc/header.php';
$web = new Website();
$webInfo = $web->getByID(2);
?>
<br><br><br><br><br>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="property-agent">
				<h2 class="title-agent" style="text-align: center;">Contacts</h2>
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
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<img style="width:70%;padding-left:30%;" src="<?php echo UPLOAD_URL . '/web/' . $webInfo[0]->Image; ?>">
			</div>
			<div class="col-md-12 col-lg-12">
				<div class="property-agent">
					<p class="color-text-a">
						<?php echo html_entity_decode($webInfo[0]->Description); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php
require '../inc/footer.php';
?>