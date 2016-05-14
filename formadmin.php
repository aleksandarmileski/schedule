<form role="form" action="" method="post" class="login-form selUser">
<fieldset>
  <legend><h1>CHOOSE USER</h1>
  <div class="form-group">
    <select class="selectpicker" name="users">
    <?php 
    $data = getUsers();
    foreach ($data as $user) {
    	echo "<option value=".$user['username'].">".$user['username']."</option>";
    }
    ?>
    </select>
    <button type="submit" class="btn" name="get-user">View user</button>
  </div>
  </legend>
</fieldset>
</form>