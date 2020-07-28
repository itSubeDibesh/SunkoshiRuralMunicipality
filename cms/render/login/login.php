<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$login  = new Login();
$office= new Officer();
if (isset($_POST) && !empty($_POST)) {
    $typ = $_POST['Role'];
    $usr_name = $_POST['Username'];
    $pswdbs = sha1($_POST['Passwd']);
    $users_info = $login->getUserByUserName($usr_name);
    $officer_info=$office->getByLogineID($users_info[0]->LoginId);
    // debug($users_info);
    // debug($typ);
    // debug($officer_info,true);
    if ($users_info) {
        if ($users_info[0]->Passwd == $pswdbs) {
            if ($users_info[0]->Role == $typ) {
                if ($users_info[0]->Status == 'active') {
                   if($users_info[0]->Approval=='Approved'){
                        if($users_info[0]->LoginId==$officer_info[0]->LoginId){
                            $_SESSION['LoginId'] = $users_info[0]->LoginId;
                            $_SESSION['Username'] = $users_info[0]->Username;
                            $Token = getRandomString(100);
                            $_SESSION['Token'] = $Token;
                            $_SESSION['Role'] = $typ;
                            $data = array(
                                'LastIp' => $_SERVER['REMOTE_ADDR'],
                                'Status'    => 'active'
                            );
                            if (isset($_POST['remember']) && !empty($_POST['remember'])) {
                                setcookie('_ua', $Token, time() + 8640000, '/');
                                $data['Token'] = $Token;
                            }                    
                            $login->updateUser($data, $users_info[0]->LoginId);
                            redirect(ADMIN_RENDER . '/redirect/redirect.php', 'success', "Welcome '".$officer_info[0]->Name."'");
                        }else{
                            redirect(CMS_URL . '/', 'error', 'Unauthorized Access.');
                        }
                   }else{
                    redirect(CMS_URL . '/', 'error', 'Account is not approved please contact admin.');
                   }
                } else {
                    redirect(CMS_URL . '/', 'error', 'Account is deactivated.');
                }
            } else {
                redirect(CMS_URL . '/', 'error', 'You are not allowed on this page.');
            }
        } else {
            redirect(CMS_URL . '/', 'error', 'Incorrect Password!');
        }
    } else {
        redirect(CMS_URL . '/', 'error', 'User not found.!');
    }
} else {
    redirect(CMS_URL . '/', 'error', 'Unauthorized access!');
}
