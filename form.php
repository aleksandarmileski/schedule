<form role="form" action="" method="post" class="login-form topmargin">
<fieldset>
<legend><h1>ADD TASK</h1>
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
  <!-- <div name="denovi" class = "btn-group" data-toggle="buttons">
    <label class="btn btn-default">
      <input type="radio" name="den" id="day1"> Monday
    </label>
    <label class="btn btn-default">
      <input type="radio" name="den" id="day2"> Tuesday
    </label>
    <label class="btn btn-default">
      <input type="radio" name="den" id="day3"> Wednesday
    </label>
    <label class="btn btn-default">
      <input type="radio" name="den" id="day4"> Thursday
    </label>
    <label class="btn btn-default">
      <input type="radio" name="den" id="day5"> Friday
    </label>
    <label id="izbranDen">Nema izbrano den</label>
  </div> -->
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
  <!-- <div id="casovi" class = "btn-group" data-toggle="buttons">
     <label class="btn btn-default" >
      <input type="radio" name="hours" id="hour1" > 09
    </label>
    <label class="btn btn-default">
      <input type="radio" name="hours" id="hour2"> 10
    </label>
    <label class="btn btn-default">
      <input type="radio" name="hours" id="hour3"> 11
    </label>
    <label class="btn btn-default">
      <input type="radio" name="hours" id="hour4"> 12
    </label>
    <label class="btn btn-default">
      <input type="radio" name="hours" id="hour5"> 13
    </label>
    <label class="btn btn-default">
      <input type="radio" name="hours" id="hour6"> 14
    </label>
    <label class="btn btn-default">
      <input type="radio" name="hours" id="hour7"> 15
    </label>
    <label class="btn btn-default">
      <input type="radio" name="hours" id="hour8"> 16
    </label>
    <label class="btn btn-default">
      <input type="radio" name="hours" id="hour9"> 17
    </label>
  </div> -->
  <div class="form-group">
    <label class="" for="">Priority:</label> <select class="selectpicker" 
    name="priorities"> 
    <option value="danger">Danger</option>
    <option value="success">Success</option>
    <option value="info">Info</option>
  </select>
</div>
<!-- <div id="prioriteti" class = "btn-group" data-toggle="buttons">
   <label class="btn btn-default">
      <input type="radio" name="prioritys" id="priority1" > Danger
    </label>
    <label class="btn btn-default">
      <input type="radio" name="prioritys" id="priority2"> Success
    </label>
    <label class="btn btn-default">
      <input type="radio" name="prioritys" id="priority3"> Info
    </label>
</div> -->
<div class="form-group text-center">
  <label class="sr-only" for="form-text">Task Name:</label>
  <input type="text" class="form-text form-control" id="form-text" name="text" placeholder="Enter Task Text">
</div>
<button type="submit" class="btn bottommargin" name="get-value" >Add Task</button>
</legend>
</fieldset>
</form>