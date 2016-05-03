<?php 
//comment by dijana
session_start();
require 'functions.php';

// $schedule=array();
if (isset($_SESSION['value'])) {
  $schedule=array();
  $tasks=getTasks($_SESSION['userid']);
  foreach ($tasks as $task) {
    $schedule[$task['hour']][$task['day']]=array('priority'=>$task['priority'],'text'=>$task['context']);
  }
  
}else{
  $tasks=getTasks($_SESSION['userid']);
  $schedule=array();
  for ($i=1; $i < 10 ; $i++) { 
    for ($j=1; $j < 6; $j++) { 
      $schedule[$i][$j]=array('priority'=>'','text'=>'');
    }
  }
  foreach ($tasks as $task) {
    $schedule[$task['hour']][$task['day']]=array('priority'=>$task['priority'],'text'=>$task['context']);
  }
}

if (isset($_POST['get-value'])) {
  $day=$_POST['days'];
  $hour=$_POST['hours'];
  $priority=$_POST['priorities'];
  $text=$_POST['text'];   

  $schedule[$hour][$day]=array('priority'=>$priority,'text'=>$text);

  addTask($day,$hour,$priority,$text,$_SESSION['userid']);

  $_SESSION['value']=$schedule;

}

?>

<!DOCTYPE html>
<html lang="en">

<?php require 'head.php'; ?>

<body>
  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-12 text-center">
        <h1><?php echo 'Welcome '.(isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest').'!'; ?>
       </h1>
        <p>___</p>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="form-box">
        <div class="form-top">
          <div class="form-top-left">
            <h3>Task Form</h3>
          </div>
          <div class="form-top-right">
            <i class="fa fa-lock"></i>
          </div>
        </div>
        <div class="form-bottom">
          <?php require 'form.php'; ?>
        </div>
      </div>
    </div>
    <div class="row">
      <?php require 'table.php'; ?>
    </div>
  </div><!-- /.container -->

  <!-- jQuery Version 1.11.1 -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>