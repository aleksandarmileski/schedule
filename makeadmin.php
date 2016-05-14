<form role="form" action="" method="post" class="login-form selUser">
<fieldset>
  <legend><h1>CHOOSE USER</h1>
  <div class="form-group">
    <select class="selectpicker" name="users-admin">
    <?php 
    $data = getBasicUsers();
    foreach ($data as $user) {
    	echo "<option value=".$user['id'].">".$user['username']."</option>";
    }
    ?>
    </select>
    <button type="submit" class="btn" name="make-admin">Make Admin</button>
  </div>
  </legend>
</fieldset>
</form>