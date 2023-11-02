<?php

require_once('../../../private/initialize.php');

if(isPostRequest()) {
  $args = $_POST['bicycle'];
  $bicycle = new Bicycle($args);
  $result = $bicycle->save();

  if($result === true) {
    $new_id = $bicycle->id;
    $_SESSION['message'] = 'The bicycle was created successfully.';
    redirect_to(urlFor('/staff/bicycles/show.php?id=' . $new_id));
  } else {

  }

} else {

  $bicycle = new Bicycle;
}

?>

<?php $pageTitle = 'Create Bicycle'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/staff/bicycles/index.php'); ?>">&laquo; Back to List</a>

  <div class="bicycle new">
    <h1>Create Bicycle</h1>

    <?php echo displayErrors($bicycle->errors); ?>

    <form action="<?php echo urlFor('/staff/bicycles/new.php'); ?>" method="post">

      <?php include('formFields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Bicycle" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>
