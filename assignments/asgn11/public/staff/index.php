<?php require_once('../../private/initialize.php'); ?>

<?php $pageTitle = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staffHeader.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo urlFor('/staff/bicycles/index.php'); ?>">Bicycles</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/staffFooter.php'); ?>
