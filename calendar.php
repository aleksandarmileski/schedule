<?php 

session_start();
require 'functions.php';

if (isset($_POST['get-value'])) {
  $day=$_POST['days'];
  $hour=$_POST['hours'];
  $priority=$_POST['priorities'];
  $text=$_POST['text'];  

  $schedule[$hour][$day]=array('priority'=>$priority,'text'=>$text);

  addTask($day,$hour,$priority,$text,$_SESSION['userid']);

}

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
    
    <div class="text-center">
      <?php require 'form.php'; ?>
    </div>
    <div class="row">
      
      <?php require 'table.php'; ?>
    </div>
  </div><!-- /.container -->

  <!-- jQuery Version 1.11.1 -->
  <!-- <script src="js/jquery.js"></script> -->

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script src="js/index.js"></script>
</body>
</html>