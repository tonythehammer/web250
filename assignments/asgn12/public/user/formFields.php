<?php

if(!isset($user)) {
  redirectTo(urlFor('/user/index.php'));
}
?>

<dl>
  <dt>First name</dt>
  <dd><input type="text" name="user[firstName]" value="<?php echo h($user->firstName); ?>" /></dd>
</dl>

<dl>
  <dt>Last name</dt>
  <dd><input type="text" name="user[lastName]" value="<?php echo h($user->lastName); ?>" /></dd>
</dl>

<dl>
  <dt>Email</dt>
  <dd><input type="text" name="user[email]" value="<?php echo h($user->email); ?>" /></dd>
</dl>

<dl>
  <dt>Username</dt>
  <dd><input type="text" name="user[username]" value="<?php echo h($user->username); ?>" /></dd>
</dl>

<dl>
  <dt>Password</dt>
  <dd><input type="password" name="user[password]" value="" /></dd>
</dl>

<dl>
  <dt>Confirm Password</dt>
  <dd><input type="password" name="user[confirmPassword]" value="" /></dd>
</dl>
