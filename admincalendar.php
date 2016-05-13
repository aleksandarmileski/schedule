<?php 

session_start();
require 'functions.php';

if ( !isset($_SESSION['userid']) || !getUserRole($_SESSION['userid'])==1) {
  header('Location: logout.php');  
}
$_SESSION['table_userid']=$_SESSION['userid'];

$data = getUsers();
if (isset($_POST['get-user'])) {
  $username = $_POST['users'];
  $_SESSION['table_userid'] = getUserId($username);
}



$tasks=getTasks($_SESSION['table_userid']);
$schedule=array();
for ($i=1; $i < 10 ; $i++) { 
  for ($j=1; $j < 6; $j++) { 
    $schedule[$i][$j]=array('priority'=>'','text'=>'');
  }
}
foreach ($tasks as $task) {
  $schedule[$task['hour']][$task['day']]=array('priority'=>$task['priority'],'text'=>$task['context']);
}

if (isset($_POST['get-value'])) {
  $day=$_POST['days'];
  $hour=$_POST['hours'];
  $priority=$_POST['priorities'];
  $text=$_POST['text'];   

  $schedule[$hour][$day]=array('priority'=>$priority,'text'=>$text);

  addTask($day,$hour,$priority,$text,$_SESSION['table_userid']);

  $_SESSION['value']=$schedule;

}



?>

<!DOCTYPE html>
<html lang="en">

<?php require 'head.php'; ?>

<body>
  <div class="text-center customheader">
    <h1 class="leftalign"><?php echo 'Welcome '.(isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest').'!'; ?></h1>
    <p class="rightalign"><a href="index.php">Logout</a></p>             
  </div>
  <!-- Page Content -->
  <div class="container">

    <ul class="nav nav-pills nav-justified">
      <li><a data-toggle="tab" href="#addtask">TimeTable</a></li>
      <li ><a data-toggle="pill" href="#stable">Add Task</a></li>
    </ul>

    <div class="tab-content">
      <div id="stable" class="tab-pane fade  ">
        <div class="text-center">
      <?php require 'form.php'; ?>
    </div>      
      </div>
      <div id="addtask" class="tab-pane fade in active">
        <div class="row text-center">
          <?php require 'formadmin.php'; ?>
          <?php require 'table.php'; ?>
        </div>        
      </div>
    </div>
  </div><!-- /.container -->

  <!-- jQuery Version 1.11.1 -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>