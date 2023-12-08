<?php
require_once('../../private/initialize.php');

$session->logout();

redirectTo(urlFor('/user/login.php'));

?>
