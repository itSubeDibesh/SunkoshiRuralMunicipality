<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$web = new Website();
if (isset($_POST) && !empty($_POST)) {
    if ($_POST['Action'] == 'Update' && !empty($_POST['Id'])) {   
        $data = array(
            'Title' => sanitize($_POST['title']),
            'Description' => htmlentities($_POST['description']),
            'Summery' => sanitize($_POST['Summery']),
        );
        if (isset($_FILES, $_FILES['image']['error']) && $_FILES['image']['error'] == 0) {
            if (isset($_POST['old_image']) && !empty($_POST['old_image'])) {
                if (file_exists(UPLOAD_DIR . '/web/' . $_POST['old_image'])) {
                    unlink(UPLOAD_DIR . '/web/' . $_POST['old_image']);
                }
            }
            $filename = uploadSingleImage($_FILES['image'], 'web',$_POST['title']);
            $data['Image'] = $filename;
        }
        $successUpdate = $web->UpdateById($data, $_POST['Id']);
        if ($successUpdate) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/webList.php', 'success', 'Page Updated successfully.');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/webList.php', 'error', 'Sorry! There was problem while updating Page.');
        }
    } else {
        redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/webList.php', 'warning', 'Please insert the data and submit form.');
    }
} else {
    redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/webList.php', 'error', 'Unauthorized access');
}
