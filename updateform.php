<form method="post" action="">
  <select class="updatef" name="update-days" >
    <option value="1" <?php echo ($task['day']=='1') ? 'selected' : ''; ?>>Monday</option>
    <option value="2" <?php echo ($task['day']=='2') ? 'selected' : ''; ?>>Tuesday</option>
    <option value="3" <?php echo ($task['day']=='3') ? 'selected' : ''; ?>>Wednesday</option>
    <option value="4" <?php echo ($task['day']=='4') ? 'selected' : ''; ?>>Thursday</option>
    <option value="5" <?php echo ($task['day']=='5') ? 'selected' : ''; ?>>Friday</option>
  </select>
  <select class="updatef" name="update-hours">
    <option value="1" <?php echo ($task['hour']=='1') ? 'selected' : ''; ?>>09</option>
    <option value="2" <?php echo ($task['hour']=='2') ? 'selected' : ''; ?>>10</option>
    <option value="3" <?php echo ($task['hour']=='3') ? 'selected' : ''; ?>>11</option>
    <option value="4" <?php echo ($task['hour']=='4') ? 'selected' : ''; ?>>12</option>
    <option value="5" <?php echo ($task['hour']=='5') ? 'selected' : ''; ?>>13</option>
    <option value="6" <?php echo ($task['hour']=='6') ? 'selected' : ''; ?>>14</option>
    <option value="7" <?php echo ($task['hour']=='7') ? 'selected' : ''; ?>>15</option>
    <option value="8" <?php echo ($task['hour']=='8') ? 'selected' : ''; ?>>16</option>
    <option value="9" <?php echo ($task['hour']=='9') ? 'selected' : ''; ?>>17</option>
  </select>
  <select class="updatef" name="update-priorities"> 
    <option value="danger" <?php echo ($task['priority']=='danger') ? 'selected' : ''; ?>>Danger</option>
    <option value="success" <?php echo ($task['priority']=='success') ? 'selected' : ''; ?>>Success</option>
    <option value="info" <?php echo ($task['priority']=='info') ? 'selected' : ''; ?>>Info</option>
  </select>
  <input  type="text" class="form-text form-control updateftext" id="form-text" name="update-text" placeholder="<?php echo $task['context']; ?>">
  <button type="submit" class="btn bottommargin updatefbutton" name="update-value" value="<?php echo $task['id']; ?>" >Update Task</button>
</form>