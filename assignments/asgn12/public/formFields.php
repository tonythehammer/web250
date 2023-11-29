<?php

if(!isset($bird)) {
  redirectTo(urlFor('/index.php'));
}
?>

<dl>
  <dt>Common name</dt>
  <dd><input type="text" name="bird[commonName]" value="<?php echo h($bird->commonName); ?>" /></dd>
</dl>

<dl>
  <dt>Habitat</dt>
  <dd><input type="text" name="bird[habitat]" value="<?php echo h($bird->habitat); ?>" /></dd>
</dl>

<dl>
  <dt>Food</dt>
  <dd><input type="text" name="bird[food]" value="<?php echo h($bird->food); ?>" /></dd>
</dl>

<dl>
  <dt>Conservation</dt>
  <dd>
    <select name="bird[conservationId]">
      <option value=""></option>
    <?php foreach(Bird::CONSERVATION_OPTIONS as $cons_id => $cons_name) { ?>
      <option value="<?php echo $cons_id; ?>" <?php if($bird->conservationId == $cons_id) { echo 'selected'; } ?>><?php echo $cons_name; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Backyard Tips</dt>
  <dd><input type="text" name="bird[backyardTips]" value="<?php echo h($bird->backyardTips); ?>" /></dd>
</dl>
