<?php require_once('../../../private/initialize.php'); ?>
<?php requireLogin(); ?>

<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

$admin = Admin::findById($id);

?>

<?php $page_title = 'Show Admin: ' . h($admin->fullName()); ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo urlFor('/staff/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin show">

    <h1>Admin: <?php echo h($admin->fullName()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>First name</dt>
        <dd><?php echo h($admin->firstName); ?></dd>
      </dl>
      <dl>
        <dt>Last name</dt>
        <dd><?php echo h($admin->lastName); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($admin->email); ?></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($admin->username); ?></dd>
      </dl>
    </div>

  </div>

</div>
