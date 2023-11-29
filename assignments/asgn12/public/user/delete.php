<?php

require_once('../../private/initialize.php');

requireLogin();

if(!isset($_GET['id'])) {
  redirectTo(urlFor('/user/index.php'));
}
$id = $_GET['id'];
$user = User::findById($id);
if($user == false) {
  redirectTo(urlFor('/user/index.php'));
}

if(isPostRequest()) {

  // Delete user
  $result = $user->delete();
  $session->message('The user was deleted successfully.');
  redirectTo(urlFor('/users/index.php'));

} else {
}

?>

<?php $pageTitle = 'Delete user'; ?>
<?php include(SHARED_PATH . '/publicHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/user/index.php'); ?>">&laquo; Back to List</a>

  <div class="user delete">
    <h1>Delete user</h1>
    <p>Are you sure you want to delete this user?</p>
    <p class="item"><?php echo h($user->fullName()); ?></p>

    <form action="<?php echo urlFor('/user/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete user" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/publicFooter.php'); ?>
