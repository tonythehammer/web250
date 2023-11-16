<?php

if(!isset($admin)) {
  redirectTo(urlFor('/staff/admins/index.php'));
}
?>

<dl>
  <dt>First name</dt>
  <dd><input type="text" name="admin[firstName]" value="<?php echo h($admin->firstName); ?>" /></dd>
</dl>

<dl>
  <dt>Last name</dt>
  <dd><input type="text" name="admin[lastName]" value="<?php echo h($admin->lastName); ?>" /></dd>
</dl>

<dl>
  <dt>Email</dt>
  <dd><input type="text" name="admin[email]" value="<?php echo h($admin->email); ?>" /></dd>
</dl>

<dl>
  <dt>Username</dt>
  <dd><input type="text" name="admin[username]" value="<?php echo h($admin->username); ?>" /></dd>
</dl>

<dl>
  <dt>Password</dt>
  <dd><input type="password" name="admin[password]" value="" /></dd>
</dl>

<dl>
  <dt>Confirm Password</dt>
  <dd><input type="password" name="admin[confirmPassword]" value="" /></dd>
</dl>
