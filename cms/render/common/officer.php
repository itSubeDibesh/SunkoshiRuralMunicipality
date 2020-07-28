<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$officer = new Officer();
if ((isset($_POST) && !empty($_POST)) || (isset($_GET) && !empty($_GET))) {
    if ($_POST['Action'] == 'Add') {
        $datas = array(
            'Name' => $_POST['Name'],
            'Address' => $_POST['address'],
            'WardId' => $_POST['WardId'],
            'Contact' => $_POST['contact'],
            'Email' => $_POST['email'],
            'Gender' => $_POST['gender'],
            'Post' => $_POST['post']
        );
        if (isset($_FILES, $_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
			$file_name = uploadSingleImage($_FILES['image'], 'officers', $_POST['Name']);
			if ($file_name) {
				$datas['Image'] = $file_name;
			}
		}
        $success = $officer->addOfficer($datas);
        if (isset($success)) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersList.php', 'success', 'Officer Added Successfully.');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersList.php', 'error', 'Server Down.');
        }
    } else if ($_POST['Action'] == 'Update') {
        $datas = array(
            'Name' => $_POST['Name'],
            'Address' => $_POST['address'],
            'WardId' => $_POST['WardId'],
            'Contact' => $_POST['contact'],
            'Email' => $_POST['email'],
            'Gender' => $_POST['gender'],
            'Post' => $_POST['post']
        );
        if (isset($_FILES, $_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
            $filename = uploadSingleImage($_FILES['image'], 'officers', $_POST['Name']);
            if (isset($_POST['old_image']) && !empty($_POST['old_image'])) {
                if (file_exists(UPLOAD_DIR . '/officers/' . $_POST['old_image'])) {
                    unlink(UPLOAD_DIR . '/officers/' . $_POST['old_image']);
                }
            }
            $datas['Image'] = $filename;
        }
        $successUpdate = $officer->updateUserByOfficers($datas, $_POST['Id']);
        if ($successUpdate) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersList.php', 'success', 'Officer Updated Successfully..');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersList.php', 'error', 'Server Down.');
        }
    } else if ($_GET['Action'] == 'Delete') {    

        $officerDetails=$officer->getUserByID($_GET['id']);
        $img=$officerDetails[0]->Image;
        $successDelete = $officer->deleteOfficer($_GET['id']);
        if ($successDelete) {
            if (file_exists(UPLOAD_DIR . '/officers/' . $img)) {
				unlink(UPLOAD_DIR . '/officers/' . $img);
			}
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersList.php', 'success', 'Officer Deleted Successfully..');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersList.php', 'error', 'Server Down.');
        }
    } else {
        redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersList.php', 'warning', 'Please insert the data and submit form.');
    }
} else {
    redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/officersList.php', 'warning', 'Please insert the data and submit form.');
}
