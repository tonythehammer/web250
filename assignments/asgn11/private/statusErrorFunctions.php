<?php

function requireLogin() {
  global $session;
  if(!$session->isLoggedIn()) {
    redirectTo(urlFor('/staff/login.php'));
  } else {
    // Do nothing, let the rest of the page proceed
  }
}

function displayErrors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function getAndClearSessionMessage() {
  if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
    $msg = $_SESSION['message'];
    unset($_SESSION['message']);
    return $msg;
  }
}

function displaySessionMessage() {
  $msg = getAndClearSessionMessage();
  if(isset($msg) && $msg != '') {
    return '<div id="message">' . h($msg) . '</div>';
  }
}

?>
