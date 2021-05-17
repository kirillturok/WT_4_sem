<?php
$_COOKIE['page'] = isset($_COOKIE['page']) ? unserialize($_COOKIE['page']) : array();
array_unshift( $_COOKIE['page'], date('H:i:s').' - '.$_SERVER['REQUEST_URI'] );
setcookie('page', serialize($_COOKIE['page']), time()+30 );
///echo cookie_save_path();//sys_get_temp_dir();
?>