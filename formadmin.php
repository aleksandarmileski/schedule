<form role="form" action="" method="post" class="login-form">
  <div class="form-group">
    <label class="" for="">Choose User:</label>
    <select class="selectpicker" name="users">
    <?php foreach ($data as $user) {
    	echo "<option value=".$user['username'].">".$user['username']."</option>";
    }
    ?>
    </select>
    <button type="submit" class="btn" name="get-user">View user</button>
  </div>
</form>