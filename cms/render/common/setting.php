<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$officer = new Officer();
$login = new Login();
$user_id = $_SESSION['LoginId'];
$lg_user = $login->getUserByLoginID($user_id);
$officer_id = $officer->getOfficerByLoginID($user_id);
$off_id = $officer_id[0]->OfficerId;

if (isset($_POST, $_POST['FormType']) && !empty($_POST) && $_POST['FormType'] == 'Update') {
	$data = array(
		'WardId' => $_POST['Ward'],
		'Name' => $_POST['Name'],
		'Address' => $_POST['Address'],
		'Contact' => $_POST['Contact'],
		'Email' => $_POST['Email'],
		'Gender' => $_POST['Gender']
	);
	$success = $officer->updateOfficer($data, $off_id);
	if ($success) {
		redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/settings.php','success','Profile Updated Successfully');
	}
} elseif (isset($_POST, $_POST['FormType']) && !empty($_POST['FormType']) && $_POST['FormType'] == 'Credentials') {
	$cr_pass = $lg_user[0]->Passwd;
	$data = array(
		'Username' => $_POST['UserName'],
		'Passwd' => sha1($_POST['NewPassword'])

	);

	if ($cr_pass == sha1($_POST['CurrentPassword'])) {
		$filename = uploadSingleImage($_FILES['image'], 'users', $_SESSION['Username']);
		if ($_POST['NewPassword'] != "") {
			if ($_POST['NewPassword'] == $_POST['RetypePassword']) {
				if (isset($_FILES, $_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
					if (isset($_POST['old_image']) && !empty($_POST['old_image'])) {
						if (file_exists(UPLOAD_DIR . '/users/' . $_POST['old_image'])) {
							unlink(UPLOAD_DIR . '/users/' . $_POST['old_image']);
						}
					}

					$data = array(
						'Image' => $filename
					);
				}
				$updat = $login->updateUser($data, $off_id);
				redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/settings.php', 'success', 'Credentials updated');
			} else {
				redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/settings.php', 'error', 'New Password Is Not Matched');
			}
		}
		if (isset($_FILES, $_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
			if (isset($_POST['old_image']) && !empty($_POST['old_image'])) {
				if (file_exists(UPLOAD_DIR . '/users/' . $_POST['old_image'])) {
					unlink(UPLOAD_DIR . '/users/' . $_POST['old_image']);
				}
			}

			$data1 = array(
				'Image' => $filename
			);
			$update = $login->updateUser($data1, $off_id);
			redirect(''.CMS_URL.'/'.lcfirst($_SESSION['Role']).'/settings.php'.'', 'success', 'Credentials updated');
		}
		if (isset($_POST, $_POST['UserName']) && !empty($_POST['UserName'])) {
			$data1 = array(
				'Username' => $_POST['UserName']
			);
			$update = $login->updateUser($data1, $off_id);
			redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/settings.php', 'success', 'Credentials updated');
		}
		redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/settings.php', 'error', 'Please provide New Password');
	} else {
		redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/settings.php', 'error', 'Invalid Current Password');
	}
}
