<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$organizational = new Organization();
if ((isset($_POST) && !empty($_POST)) || (isset($_GET) && !empty($_GET))) {
    if ($_POST['Action'] == 'Add') {
        $data = array_slice($_POST, 2);
        $data['Name']=sanitize($_POST['Name']);
        $success = $organizational->addOrganization($data);
        if ($success) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/organizationalList.php', 'success', 'Organization Added Successfully..');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/organizationalList.php', 'error', 'Server Down.');
        }
    } else if ($_POST['Action'] == 'Update') {
        $datasUp = array_slice($_POST, 2);
        $successUpdate = $organizational->updateOrganization($datasUp, $_POST['OrganizationId']);
        if ($successUpdate) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/organizationalList.php', 'success', 'Organization Updated Successfully..');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/organizationalList.php', 'error', 'Server Down.');
        }
    } else if ($_GET['Action'] == 'Delete') {
        $check = $organizational->getByID($_GET['id']);
        if (!empty($check) && $_GET['id'] == $check[0]->OrganizationId) {
            $successDelete = $organizational->deleteById($_GET['id']);
            if ($successDelete) {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/organizationalList.php', 'success', 'Organization Deleted Successfully..');
            } else {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/organizationalList.php', 'error', 'Server Down.');
            }
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/organizationalList.php', 'warning', 'Please delete organization from the table only');
        }
    } else {
        redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/organizationalList.php', 'warning', 'Please insert the data and submit form.');
    }
} else {
    redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/organizationalList.php', 'warning', 'Please insert the data and submit form.');
}
