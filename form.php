<form role="form" action="" method="post" class="login-form">
  <div class="form-group">
    <label class="" for="">Day:</label>
    <select class="selectpicker" name="days">
      <option value="1">Monday</option>
      <option value="2">Tuesday</option>
      <option value="3">Wednesday</option>
      <option value="4">Thursday</option>
      <option value="5">Friday</option>
    </select>
  </div>
  <div class="form-group">
    <label class="" for="">Hour:</label>
    <select class="selectpicker" name="hours">
      <option value="1">09</option>
      <option value="2">10</option>
      <option value="3">11</option>
      <option value="4">12</option>
      <option value="5">13</option>
      <option value="6">14</option>
      <option value="7">15</option>
      <option value="8">16</option>
      <option value="9">17</option>
    </select>
  </div>
  <div class="form-group">
    <label class="" for="">Priority:</label> <select class="selectpicker" 
    name="priorities"> 
    <option value="danger">Danger</option>
    <option value="success">Success</option>
    <option value="info">Info</option>
  </select>
</div>
<div class="form-group">
  <label class="sr-only" for="form-text">Task Name:</label>
  <input type="text" class="form-text form-control" id="form-text" name="text">
</div>
<button type="submit" class="btn" name="get-value">Add Task</button>
</form>