<?php
require_once('../../private/initialize.php');

$session->logout();

redirectTo(urlFor('/staff/login.php'));

?>
