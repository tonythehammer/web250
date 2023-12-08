<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(isPostRequest()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if(isBlank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(isBlank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  if(empty($errors)) {
    $user = User::findByUsername($username);
    if($user != false && $user->verifyPassword($password)) {
      $session->login($user);
      redirectTo(urlFor('/user/userIndex.php'));
    } else {
      $errors[] = "Log in was unsuccessful.";
    }

  }

}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/publicHeader.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo displayErrors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Log In"  />
  </form>

</div>

<?php include(SHARED_PATH . '/publicFooter.php'); ?>
