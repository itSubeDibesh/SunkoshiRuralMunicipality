<?php
ob_start();
session_start();

define('SITE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']); /* http://localhost */

define('CMS_URL', SITE_URL . '/cms');/* Root/cms */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');
define('DB_NAME', 'srm');

define('ERROR_LOG', $_SERVER['DOCUMENT_ROOT'] . '/error/error.log');

/** Admin path */
define('ADMIN_ASSETS', CMS_URL . '/assets'); /* Root/cms/assets */

define('ADMIN_CSS', ADMIN_ASSETS . '/css');/* Root/cms/assets/css */
define('ADMIN_JS', ADMIN_ASSETS . '/js');/* Root/cms/assets/js */
define('ADMIN_FONTS', ADMIN_ASSETS . '/fonts');/* Root/cms/assets/fonts */
define('ADMIN_WEBFONTS', ADMIN_ASSETS . '/webfonts');/* Root/cms/assets/webfonts */
define('ADMIN_IMG', ADMIN_ASSETS . '/img');/* Root/cms/assets/img */

define('ADMIN_CMS_INC', CMS_URL . '/inc');/* Root/cms/inc */


define('CONFIG_URL', SITE_URL . '/conf');/* Root/conf */
define('CLASS_URL', SITE_URL . '/class');/* Root/class */

define('ADMIN_RENDER', CMS_URL . '/render');/* Root/cms/render */

/** Home path */
define('ASSETS_URL', SITE_URL.'/assets');/* Root/assets */
define('CSS_URL', ASSETS_URL.'/css');/* Root/assets/css */
define('JS_URL', ASSETS_URL.'/js');/* Root/assets/js */

define('IMAGE_URL', ASSETS_URL.'/img');/* Root/assets/img */

define('LIB_URL', ASSETS_URL.'/lib');/* Root/assets/lib */
define('REDIR_URL', SITE_URL.'/redirect');/* Root/redir */
define('RENDER_URL', SITE_URL.'/render');/* Root/redir */

define('IMAGE_EXTENSIONS', array('jpg', 'jpeg', 'png', 'bmp', 'svg'));
define('FILE_EXTENSIONS', array('pdf','dox','docx'));

define('UPLOAD_DIR', $_SERVER['DOCUMENT_ROOT'] . '/uploads');/* Root/uploads*/
define('UPLOAD_URL', SITE_URL . '/uploads');/* Root/uploads*/

define('SITE_TITLE', 'Sunkoshi Rular Municapilaty, Nepal');
