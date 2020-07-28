<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$news_event = new News_Event();
if (isset($_POST, $_POST['Action']) && $_POST['Action'] == 'Add') {
	$data = array(
		'Title' => $_POST['title'],
		'Summary' => $_POST['summary'],
		'Description' => $_POST['description'],
		'Type' => $_POST['type'],
		'Location' => $_POST['location'],
		'Status' =>$_POST['status'],
		'UploadedBy' => $_SESSION['LoginId']
	);
	if(empty($_POST['status'])){
		$data['Status']='inactive';
	}
	if ($data) {
		if (isset($_FILES, $_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
			$file_name = uploadSingleImage($_FILES['image'], 'news_event', $_POST['type']);
			if ($file_name) {
				$data['Image'] = $file_name;
			}
		}
		$add = $news_event->addNewsEvents($data);
		if ($add) {
			redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/newsList.php', 'success', 'Added Successfully');
		} else {
			redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/newsList.php', 'error', 'Error while Adding');
		}
	} else {
		redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/newsList.php', 'error', 'Error while Adding');
	}
} elseif (isset($_POST, $_POST['Action']) && $_POST['Action'] == 'Update') {
	$data = array(
		'Title' => sanitize($_POST['title']),
		'Summary' => sanitize($_POST['summary']),
		'Description' => htmlentities($_POST['description']),
		'Type' => sanitize($_POST['type']),
		'Location' => sanitize($_POST['location']),
		'Status' => sanitize($_POST['status']),
		'UploadedBy' => $_SESSION['LoginId']
	);
	if (isset($_FILES, $_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
		$filename = uploadSingleImage($_FILES['image'], 'news_event', $_POST['type']);
		if (isset($_POST['old_image']) && !empty($_POST['old_image'])) {
			if (file_exists(UPLOAD_DIR . '/news_event/' . $_POST['old_image'])) {
				unlink(UPLOAD_DIR . '/news_event/' . $_POST['old_image']);
			}
		}
		$data['Image'] = $filename;
	}
	$update = $news_event->updateNewsEventsById($data, $_POST['id']);
	if ($update) {
		redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/newsList.php', 'success', 'Updated Successfully');
	} else {
		redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/newsList.php', 'error', 'Error while updating');
	}
} elseif (isset($_GET, $_GET['Action']) && !empty($_GET) && $_GET['Action'] == 'Delete') {
	if ($_GET['id'] && !empty($_GET['id'])) {
		$newsdetails=$news_event->getNewsEventsById($_GET['id']);
		$img=$newsdetails[0]->Image;
		$delete = $news_event->deleteNewsEventsById($_GET['id']);
		if ($delete) {
			if (file_exists(UPLOAD_DIR . '/news_event/' . $img)) {
				unlink(UPLOAD_DIR . '/news_event/' . $img);
			}
			redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/newsList.php', 'success', 'Deleted Successfully');
		} else {
			redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/newsList.php', 'error', 'Error while deleting');
		}
	}
}
