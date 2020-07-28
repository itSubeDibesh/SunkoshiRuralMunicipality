<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$problems = new Problem();
if ((isset($_POST) && !empty($_POST))) {
    if ($_POST['Action'] == 'Add') {
        $data = array(
            'Name' => sanitize($_POST['Name']),
            'Address' => sanitize($_POST['Address']),
            'Description' => htmlentities($_POST['Description']),
            'WardId' => sanitize($_POST['WardId']),
        );
        $successAdd = $problems->add($data);
        if ($successAdd) {
            redirect(REDIR_URL . '/problem.php', 'success', 'Problem reported successfully.');
        } else {
            redirect(REDIR_URL . '/problem.php', 'error', 'Sorry! There was error while reporting problems.');
        }
    } else if($_POST['Action'] == 'Update'){
        $data = array(
            'Status' => sanitize($_POST['Status']),
        );
        $successUpdate = $problems->UpdateById($data,$_POST['Id']);
        if ($successUpdate) {
            redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/problemList.php', 'success', 'Problem updated successfully.');
        } else {
            redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/problemList.php', 'error', 'Sorry! There was error while updating problem.');
        }
    }
} else {
    redirect(REDIR_URL . '/problem.php', 'error', 'Unauthorized access');
}
?>