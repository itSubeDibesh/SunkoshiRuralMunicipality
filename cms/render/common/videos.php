<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$video = new Video();
if ((isset($_POST) && !empty($_POST)) || (isset($_GET) && !empty($_GET))) {
    if ($_POST['Action'] == 'Add') {
        $data = array(
            'Title' => sanitize($_POST['title']),
            'Description' => htmlentities($_POST['description']),
            'Status' => sanitize($_POST['status']),
            'VideoLink' => sanitize($_POST['video_link']),
        );
        $data['VideoLinkId'] = getYoutubeIdFromUrl($_POST['video_link']);
        $successAdd = $video->addVideo($data);
        if ($successAdd) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php', 'success', 'Video added successfully.');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php', 'error', 'Sorry! There was problem while adding video.');
        }
    } else if ($_POST['Action'] == 'Update') {
        $data = array(
            'Title' => sanitize($_POST['title']),
            'Description' => htmlentities($_POST['description']),
            'Status' => sanitize($_POST['status']),
            'VideoLink' => sanitize($_POST['video_link']),
        );
        $data['VideoLinkId'] = getYoutubeIdFromUrl($_POST['video_link']);
        $successUpdate = $video->updateVideo($data, $_POST['VideoId']);
        if ($successUpdate) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php', 'success', 'Video Updated successfully.');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php', 'error', 'Sorry! There was problem while updating video.');
        }
    } else if ($_GET['Action'] == 'Delete') {
        if ($_GET['id'] <= 0) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php', 'error', 'Invalid Video Id');
        }
        $video_info = $video->getVideoById($_GET['id']);
        if (!$video_info) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php', 'error', 'Video already deleted or does not exists.');
        }
        $del = $video->deleteVideo($_GET['id']);
        if ($del) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php', 'success', 'Video deleted successfully.');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php', 'error', 'Sorry! There was problem while deleting video.');
        }
    } else {
        redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php', 'warning', 'Please insert the data and submit form.');
    }
} else {
    redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/videoList.php', 'error', 'Unauthorized access');
}
