<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$plansandpolicies = new PlansAndPolicies();
if ((isset($_POST) && !empty($_POST)) || (isset($_GET) && !empty($_GET))) {
    if ($_POST['Action'] == 'Add') {
        if ($_POST['type'] == 'Plan') {
            $datas = array(
                'Type' => $_POST['type'],
                'PlaneName' => $_POST['title'],
                'WardId' => $_POST['WardId'],
                'UploadedBy' => $_SESSION['LoginId'],
                'status' => $_POST['status']
            );
            $fileName = uploadPlansAndPolices($_FILES['file'], 'plansandpolicies', $_POST['type']);
            $datas['PlaneImg'] = $fileName;
            $success = $plansandpolicies->addPlansAndPolicies($datas);
            if (isset($success)) {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php', 'success', 'Plan Added Successfully.');
            } else {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php', 'error', 'Server Down.');
            }
        }
        if ($_POST['type'] == 'Policy') {
            $datas = array(
                'Type' => $_POST['type'],
                'PolicyName' => $_POST['title'],
                'WardId' => $_POST['WardId'],
                'UploadedBy' => $_SESSION['LoginId'],
                'status' => $_POST['status']
            );
            $fileName = uploadPlansAndPolices($_FILES['file'], 'plansandpolicies', $_POST['type']);
            $datas['PolicyImg'] = $fileName;
            $success = $plansandpolicies->addPlansAndPolicies($datas);
            if (isset($success)) {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php', 'success', 'Policy Added Successfully.');
            } else {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php', 'error', 'Server Down.');
            }
        }
    } else if ($_POST['Action'] == 'Update') {
        $id = $_POST['Id'];
        if (isset($_POST['type']) && !empty($_POST['type']) && $_POST['type'] == 'Plan') {
            $data = array(
                'PlaneName' => $_POST['title'],
                'WardId' => $_POST['WardId'],
                'status' => $_POST['status']
            );
            if (isset($_FILES, $_FILES['file']['error']) && $_FILES['file']['error'] == 0) {
                $planDetails = $plansandpolicies->getByID($_POST['Id']);
                $policyFile = $planDetails[0]->PlaneImg;
                if (file_exists(UPLOAD_DIR . '/plansandpolicies/' . $policyFile)) {
                    unlink(UPLOAD_DIR . '/plansandpolicies/' . $policyFile);
                }
                $fileName = uploadPlansAndPolices($_FILES['file'], 'plansandpolicies', 'Plans');
                $data['PlaneImg'] = $fileName;
            } else { }
            $successUpdate = $plansandpolicies->updatePlanPolicies($data, $id);
            if ($successUpdate) {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php', 'success', 'Plan Updated Successfully..');
            } else {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php', 'error', 'Server Down.');
            }
        }
        if (isset($_POST['type']) && !empty($_POST['type']) && $_POST['type'] == 'Policy') {
            $data = array(
                'PolicyName' => $_POST['title'],
                'WardId' => $_POST['WardId'],
                'status' => $_POST['status']
            );
            if (isset($_FILES, $_FILES['file']['error']) && $_FILES['file']['error'] == 0) {
                $policyDetails = $plansandpolicies->getByID($_POST['Id']);
                $policyFile = $policyDetails[0]->PolicyImg;
                if (file_exists(UPLOAD_DIR . '/plansandpolicies/' . $policyFile)) {
                    unlink(UPLOAD_DIR . '/plansandpolicies/' . $policyFile);
                }
                $fileName = uploadPlansAndPolices($_FILES['file'], 'plansandpolicies', 'Policy');
                $data['PolicyImg'] = $fileName;
            } else { }
            $successUpdate = $plansandpolicies->updatePlanPolicies($data, $id);
            if ($successUpdate) {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php', 'success', 'Policy Updated Successfully..');
            } else {
                redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php', 'error', 'Server Down.');
            }
        }
    } else if ($_GET['Action'] == 'Delete') {
        if ($_GET['type'] == 'Plan') {
            $planDetails = $plansandpolicies->getByID($_GET['id']);
            $policyFile = $planDetails[0]->PlaneImg;
            if (file_exists(UPLOAD_DIR . '/plansandpolicies/' . $policyFile)) {
                unlink(UPLOAD_DIR . '/plansandpolicies/' . $policyFile);
            }
        }
        if ($_GET['type'] == 'Policy') {
            $policyDetails = $plansandpolicies->getByID($_GET['id']);
            $policyFile = $policyDetails[0]->PolicyImg;
            if (file_exists(UPLOAD_DIR . '/plansandpolicies/' . $policyFile)) {
                unlink(UPLOAD_DIR . '/plansandpolicies/' . $policyFile);
            }
        }
        $successDelete = $plansandpolicies->deleteById($_GET['id']);
        if ($successDelete) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php', 'success', 'Deleted Successfully..');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php', 'error', 'Server Down.');
        }
    } else {
        redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/plansList.php', 'warning', 'Please insert the data and submit form.');
    }
}
