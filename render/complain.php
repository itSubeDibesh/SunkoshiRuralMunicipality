<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$complains = new Complain();
if ((isset($_POST) && !empty($_POST))) {
    if ($_POST['Action'] == 'Add') {
        $data = array(
            'Name' => sanitize($_POST['Name']),
            'Address' => sanitize($_POST['Address']),
            'Description' => htmlentities($_POST['Description']),
            'WardId' => sanitize($_POST['WardId']),
        );
        $successAdd = $complains->add($data);
        if ($successAdd) {
            redirect(REDIR_URL . '/complain.php', 'success', 'Complains reported successfully.');
        } else {
            redirect(REDIR_URL . '/complain.php', 'error', 'Sorry! There was error while reporting complains.');
        }
    } else if($_POST['Action'] == 'Update'){
        $data = array(
            'Status' => sanitize($_POST['Status']),
        );
        $successUpdate = $complains->UpdateById($data,$_POST['Id']);
        if ($successUpdate) {
            redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/complainList.php', 'success', 'Complain updated successfully.');
        } else {
            redirect(CMS_URL.'/'.lcfirst($_SESSION['Role']).'/complainList.php', 'error', 'Sorry! There was error while updating complain.');
        }
    }
} else {
    redirect(REDIR_URL . '/complain.php', 'error', 'Unauthorized access');
}
?>