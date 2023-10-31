<?php require_once('../private/initialize.php');

$id =$_GET['id'] ?? false;
if(!$id){
  redirectTo('bicycles.php');
}
$bike = Bicycle::findById($id);
$pageTitle = 'Detail:' . $bike->name();
include(SHARED_PATH . '/publicHeader.php');?>

<div id="main">
  <a href="bicycles.php">Back to Inventory</a>
  <div class="page">
    <dl>
      <dt>Brand</dt>
      <dd><?php echo h($bike->brand);?></dd>
    </dl>
    <dl>
      <dt>Model</dt>
      <dd><?php echo h($bike->model);?></dd>
    </dl>
    <dl>
      <dt>Year</dt>
      <dd><?php echo h($bike->year);?></dd>
    </dl>
    <dl>
      <dt>Category</dt>
      <dd><?php echo h($bike->category);?></dd>
    </dl>
    <dl>
      <dt>Gender</dt>
      <dd><?php echo h($bike->gender);?></dd>
    </dl>
    <dl>
      <dt>Color</dt>
      <dd><?php echo h($bike->color);?></dd>
    </dl>
    <dl>
      <dt>Weight</dt>
      <dd><?php echo h($bike->weightKg()). '/' . h($bike->weightLbs());?></dd>
    </dl>
    <dl>
      <dt>Condition</dt>
      <dd><?php echo h($bike->condition());?></dd>
    </dl>
    <dl>
      <dt>Price</dt>
      <dd><?php echo h(moneyFormat('$%i',$bike->price));?></dd>
    </dl>
    <dl>
      <dt>Description</dt>
      <dd><?php echo h($bike->description);?></dd>
    </dl>
  </div>
</div>

<?php include(SHARED_PATH . '/publicFooter.php');?>