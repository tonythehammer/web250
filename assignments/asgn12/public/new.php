<?php

require_once('../private/initialize.php');

if(isPostRequest()) {
  $args = $_POST['bird'];
  $bird = new Bird($args);
  $result = $bird->save();

  if($result === true) {
    $new_id = $bird->id;
    $_SESSION['message'] = 'The bird was created successfully.';
    redirectTo(urlFor('/detail.php?id=' . $new_id));
  } else {

  }

} else {

  $bird = new Bird;
}

?>

<?php $pageTitle = 'Create Bird'; ?>
<?php include(SHARED_PATH . '/publicHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/birds.php'); ?>">&laquo; Back to List</a>

  <div class="bird new">
    <h1>Create Bird</h1>

    <?php echo displayErrors($bird->errors); ?>

    <form action="<?php echo urlFor('/new.php'); ?>" method="post">

      <?php include('formFields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Bird" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/publicFooter.php'); ?>
