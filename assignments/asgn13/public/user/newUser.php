<?php

require_once('../../private/initialize.php');

requireLogin();
requireLevel(2);

if(isPostRequest()) {
  $args = $_POST['user'];
  $user = new User($args);
  $result = $user->save();

  if($result === true) {
    $newId = $user->id;
    $session->message('The user was created successfully.');
    redirectTo(urlFor('/user/show.php?id=' . $newId));
  } else {
  }

} else {
  $user = new User;
}

?>

<?php $page_title = 'Create user'; ?>
<?php include(SHARED_PATH . '/publicHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/user/index.php'); ?>">&laquo; Back to List</a>

  <div class="user new">
    <h1>Create user</h1>

    <?php echo displayErrors($user->errors); ?>

    <form action="<?php echo urlFor('/user/newUser.php'); ?>" method="post">

      <?php include('userFormFields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create user" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/publicFooter.php'); ?>
