<?php
require $_SERVER['DOCUMENT_ROOT'] . '/conf/init.php';
$login = new Login();
$LoginId = $_SESSION['LoginId'];
if (isset($_COOKIE, $_COOKIE['_ua'])) {
    setcookie('_ua', '', (time() - 60), '/');
    $data = array(
        'Token' => ''
    );
    debug($data);
    $login->updateUser($data, $LoginId);
}
session_destroy();
redirect(CMS_URL);
