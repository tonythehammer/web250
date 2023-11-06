<?php require_once('../private/initialize.php');

$id =$_GET['id'] ?? false;
if(!$id){
  redirectTo('birds.php');
}
$bird = Bird::findById($id);
$pageTitle = 'Detail:' . $bird->name();
include(SHARED_PATH . '/publicHeader.php');?>

<div id="main">
  <a href="birds.php">Back to Inventory</a>
  <div class="page">
    <dl>
      <dt>Name:</dt>
      <dd><?php echo h($bird->commonName);?></dd>
    </dl>
    <dl>
      <dt>Habitat:</dt>
      <dd><?php echo h($bird->habitat);?></dd>
    </dl>
    <dl>
      <dt>Food:</dt>
      <dd><?php echo h($bird->food);?></dd>
    </dl>
    <dl>
      <dt>Conservation:</dt>
      <dd><?php echo h($bird->conservation());?></dd>
    </dl>
  </div>
</div>

<?php include(SHARED_PATH . '/publicFooter.php');?>