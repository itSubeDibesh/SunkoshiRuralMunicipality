<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$person = new Personal();
if ((isset($_POST) && !empty($_POST)) || (isset($_GET) && !empty($_GET))) {
    if ($_POST['Action'] == 'Add') {
        $datas = array_slice($_POST, 2);
        $datas['Name']=sanitize($_POST['Name']);
        $success = $person->addPerson($datas);
        if ($success) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalList.php', 'success', 'Citizen Added Successfully..');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalList.php', 'error', 'Server Down.');
        }
    } else if ($_POST['Action'] == 'Update') {
        $datasUp = array_slice($_POST, 2);
        $successUpdate = $person->updatePerson($datasUp, $_POST['PersonalinfoID']);
        if ($successUpdate) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalList.php', 'success', 'Citizen Updated Successfully..');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalList.php', 'error', 'Server Down.');
        }
    } else if ($_GET['Action'] == 'Delete') {
        $check = $person->getByID($_GET['id']);
        if (!empty($check) && $_GET['id'] == $check[0]->PersonalinfoID) {
            $successDelete = $person->deleteById($_GET['id']);
            if ($successDelete) {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalList.php', 'success', 'Citizen Deleted Successfully..');
            } else {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalList.php', 'error', 'Server Down.');
            }
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalList.php', 'warning', 'Please delete citizen from the table only');
        }
    } 
} else {
    redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/personalList.php', 'warning', 'Please insert the data and submit form.');
}
