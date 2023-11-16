<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(isPostRequest()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(isBlank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(isBlank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    $admin = Admin::findByUsername($username);
    // test if admin found and password is correct
    if($admin != false && $admin->verifyPassword($password)) {
      // Mark admin as logged in
      $session->login($admin);
      redirectTo(urlFor('/staff/index.php'));
    } else {
      // username not found or password does not match
      $errors[] = "Log in was unsuccessful.";
    }

  }

}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo displayErrors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>
