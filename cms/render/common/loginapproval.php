<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$logine = new Login();
$officer = new Officer();
if ((isset($_POST) && !empty($_POST)) || (isset($_GET) && !empty($_GET))){
    if ($_POST['Action'] == 'Add') {
        #region
            if(!empty($_POST['Username'])){
                $un=$_POST['Username'];
                }else{
                    $un='';
            }/*un*/
            if(!empty($_POST['Passwd'])){
                $up=sha1($_POST['Passwd']);
                }else{
                    $up='';
            }/*up*/
            if(!empty($_POST['Role'])){
                $ur=$_POST['Role'];
                }else{
                    $ur='';
            } /*ur*/
            if(!empty($_POST['Status'])){
                $us=$_POST['Status'];
                }else{
                    $us='';
            }/*us*/
            if(!empty($_POST['Approval'])){
                $ua=$_POST['Approval'];
                }else{
                    $ua='';
            }/*ua*/
            if(!empty($_POST['Name'])){
                $n=$_POST['Name'];
                }else{
                    $n='';
            }/*n*/
            if(!empty($_POST['Address'])){
                $a=$_POST['Address'];
                }else{
                    $a='';
            }/*a*/
            if(!empty($_POST['Gender'])){
                $g=$_POST['Gender'];
                }else{
                    $g='';
            }/*g*/
            if(!empty($_POST['Email'])){
                $e=$_POST['Email'];
                }else{
                    $e='';
            }/*e*/
            if(!empty($_POST['Contact'])){
                $c=$_POST['Contact'];
                }else{
                    $c='';
            }/*c*/
            if(!empty($_POST['Post'])){
                $p=$_POST['Post'];
                }else{
                    $p='';
            }/*p */
            if(!empty($_POST['WardId'])){
                $w=$_POST['WardId'];
                }else{
                    $w='';
            }/**w */
        #endregion
        if(!empty($ua)||!empty($up)){
            $dataLogin=Array(
                'Username'=>$un,
                'Passwd'=>$up,
                'Role'=>$ur,
                'Status'=>$us,
                'Approval'=>$ua
            );
            if ($_POST['Approval'] == 'Approved') {
                $dataLogin['ApprovedDate'] = date("Y-m-d");
                $dataLogin['ApprovedBy'] = $_SESSION['LoginId'];
            } else {
                $dataLogin['ApprovedDate'] = '';
                $dataLogin['ApprovedBy'] = '';
            }
            if((isset($_FILES, $_FILES['Image']) && $_FILES['Image']['error'] == 0)){
                $fileName = uploadSingleImage($_FILES['Image'], 'users', $_POST['Username']);
                $dataLogin['Image'] = $fileName;

            }else{
                $dataLogin['Image']='';
                if (file_exists(UPLOAD_DIR . '/users/' .  $fileName)) {
                    unlink(UPLOAD_DIR . '/users/' .  $fileName);
                }
                 redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php',  'warning', 'You can\'t create Login account only.');
            }
            $LogineIdFormFirst = $logine->adduser($dataLogin);
        }

        if(!empty($n)||!empty($a)||!empty($e)||!empty($p)){
            $dataOfficer=Array(
                'Name'=>$n,
                'Address'=>$a,
                'Gender'=>$g,
                'Email'=>$e,
                'Contact'=>$c,
                'Post'=>$p,
                'WardId'=>$w
            );
        }

        if(!empty($LogineIdFormFirst) && !empty($dataOfficer)){
            $dataOfficer['LoginId']=$LogineIdFormFirst;
            $OfficerInsert=$officer->addOfficer($dataOfficer);
        }
        else{
            $OfficerInsert=$officer->addOfficer(@$dataOfficer);
        }
        if(!empty($OfficerInsert) && !empty($LogineIdFormFirst)){
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php', 'success', 'Login Account and user added Successfully..');
        }else if(empty($OfficerInsert) && !empty($LogineIdFormFirst)){
            $deleteUserLogine=$logine->deleteLoginID($LogineIdFormFirst);
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php', 'error', 'You are not allowed to make logine account only..');
        }else if(empty($LogineIdFormFirst) && !empty($OfficerInsert)){
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php', 'success', 'Officer added Successfully..');
        }
             
    } else if ($_POST['Action'] == 'Update') {
        $dataLogineApproved = array(
            'Status' => sanitize($_POST['Status']),
            'Approval' => sanitize($_POST['Approval']),
        );
        if ($_POST['Approval'] == 'Approved') {
            $dataLogineApproved['ApprovedDate'] = date("Y-m-d");
            $dataLogineApproved['ApprovedBy'] = sanitize($_POST['ApprovedBy']);
        } else {
            $dataLogineApproved['ApprovedDate'] = '';
            $dataLogineApproved['ApprovedBy'] = '';
        }
        $success = $logine->updateUser($dataLogineApproved, $_POST['LoginId']);
        if (isset($success)) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php', 'success', 'The user is ' . $_POST['Approval'] . '..');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php', 'error', 'Server Down.');
        }
    } else if ($_GET['Action'] == 'Delete') {
        $officerInformation=$officer->getOfficerByLoginID($_GET['LoginId']);
        $officerId=$officerInformation[0]->OfficerId;
        $userdetails=$logine->getUserById($_GET['LoginId']);
        $userImage=$userdetails[0]->Image;
        if (file_exists(UPLOAD_DIR . '/users/' . $userImage)) {
            unlink(UPLOAD_DIR . '/users/' . $userImage);
        }
        $deleteLogine = $logine->deleteLoginID($_GET['LoginId']);
        $deleteOfficer = $officer->deleteOfficer($officerId);
        if ($deleteOfficer && $deleteLogine) {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php', 'success', 'User Deleted Successfully..');
        } else {
            redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php', 'error', 'Server Down.');
        }
    } else if ($_POST['Action'] == 'Cancel') {
        redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php');
    } else {
        redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php', 'warning', 'Please use/select valid information and submit form.');
    }
} else {
    redirect(CMS_URL . '/' . lcfirst($_SESSION['Role']) . '/accountsList.php', 'warning', 'Please use/select valid information and submit form.');
}
