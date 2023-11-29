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

  // Save record using post parameters
  $args = $_POST['user'];
  $user->mergeAttributes($args);
  $result = $user->save();

  if($result === true) {
    $session->message('The user was updated successfully.');
    redirectTo(urlFor('/user/show.php?id=' . $id));
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit user'; ?>
<?php include(SHARED_PATH . '/publicHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/user/index.php'); ?>">&laquo; Back to List</a>

  <div class="user edit">
    <h1>Edit user</h1>

    <?php echo displayErrors($user->errors); ?>

    <form action="<?php echo urlFor('/user/edit.php?id=' . h(u($id))); ?>" method="post">

      <?php include('formFields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit user" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/publicFooter.php'); ?>
