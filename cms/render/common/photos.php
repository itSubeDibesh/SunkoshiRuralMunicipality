<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$photos = new Photos();
$gall_images = new Gallery();
if (isset($_POST, $_POST['Action']) && !empty($_POST) && $_POST['Action'] == 'Add') {
	$data = array(
		'Title' => $_POST['title'],
		'Summary' => $_POST['summary'],
		'Photographer' => $_POST['photographer'],
		'Status' => $_POST['status'],
		'UploadedBy' => $_SESSION['LoginId']
	);

	$filename = uploadSingleImage($_FILES['gallery_images'], 'photos', $_POST['title']);
	if (isset($_FILES, $_FILES['gallery_images']['error']) && $_FILES['gallery_images']['error'] == 0) {
		$data['Image'] = $filename;
	}
	$add = $photos->addPhoto($data);
	if ($_FILES['images']) {
		$file = $_FILES['images'];
		$size = count($file['name']);

		for ($i = 0; $i < $size; $i++) {
			$temp = array(
				'name' => $file['name'][$i],
				'type' => $file['type'][$i],
				'tmp_name' => $file['tmp_name'][$i],
				'error' => $file['error'][$i],
				'size' => $file['size'][$i]
			);
			$file_name = uploadSingleImage($temp, 'photos', $_POST['title']);
			if ($file_name) {
				$img_data = array(
					'photogallery_id' => $add,
					'image' => $file_name
				);
				$gall_images = new Gallery();
				$gall_images->addImages($img_data);
			}
		}
	}
	if ($add) {
		redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/photoList.php', 'success', 'Photo added successfully');
	} else {
		redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/photoList.php', 'error', 'Error while adding photo');
	}
} else if (isset($_POST, $_POST['Action']) && !empty($_POST) && $_POST['Action'] == 'Update') {

	$data = array(
		'Title' => $_POST['title'],
		'Summary' => $_POST['summary'],
		'Photographer' => $_POST['photographer'],
		'Status' => $_POST['status'],
		'UploadedBy' => $_SESSION['LoginId']
	);
	$filename = uploadSingleImage($_FILES['gallery_images'], 'photos',  $_POST['title']);
	if (isset($_FILES, $_FILES['gallery_images']['error']) && $_FILES['gallery_images']['error'] == 0) {
		if (isset($_POST['old_image']) && !empty($_POST['old_image'])) {
			if (file_exists(UPLOAD_DIR . '/photos/' . $_POST['old_image'])) {
				unlink(UPLOAD_DIR . '/photos/' . $_POST['old_image']);
			}
		}
		$data['Image'] = $filename;
	}

	if ($_FILES['images']) {
		$file = $_FILES['images'];
		$size = count($file['name']);

		for ($i = 0; $i < $size; $i++) {
			$temp = array(
				'name' => $file['name'][$i],
				'type' => $file['type'][$i],
				'tmp_name' => $file['tmp_name'][$i],
				'error' => $file['error'][$i],
				'size' => $file['size'][$i]
			);
			$file_name = uploadSingleImage($temp, 'photos', $_POST['title']);
			if ($file_name) {
				$img_data = array(
					'photogallery_id' => $_POST['PhotoId'],
					'image' => $file_name
				);
			
				$gall_images->addImages($img_data);
			}
		}
	}


	if (isset($_POST['del_gall_img']) && !empty($_POST['del_gall_img'])) {
		foreach ($_POST['del_gall_img'] as $del_image) {
			$gallery_image = new Gallery;
			$del = $gallery_image->deleteImageByName($del_image);
			if ($del) {
				if ($del_image != null && file_exists(UPLOAD_DIR . '/photos/' . $del_image)) {
					unlink(UPLOAD_DIR . '/photos/' . $del_image);
				}
			}
		}
	}
	$update = $photos->updatePhotoGalleryById($data, $_POST['PhotoId']);
	if ($update) {
		redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/photoList.php', 'success', 'Photo updated successfully');
	} else {
		redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/photoList.php', 'error', 'Error while updating');
	}
} elseif (isset($_GET, $_GET['Action']) && !empty($_GET) && $_GET['Action'] == 'Delete') {
	if ($_GET['id'] && !empty($_GET['id'])) {
		$ph_id=$gall_images->getImageByPhotoID($_GET['id']);

		foreach($ph_id as $value)
		{
			unlink(UPLOAD_DIR . '/photos/' .$value->image);
		}	
		$phi_id=$photos->getPhotoById($_GET['id']);
		$phi_img=$phi_id[0]->Image;
		$delete = $photos->deletePhotoById($_GET['id']);	
		if ($delete) {
			if (file_exists(UPLOAD_DIR . '/photos/' . $phi_img)) {
				unlink(UPLOAD_DIR . '/photos/' . $phi_img);
			}
			redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/photoList.php', 'success', 'Photo deleted successfully');
		} else {
			redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/photoList.php', 'error', 'Error while deleting');
		}
	}
}
