<?php 
session_start();
require 'functions.php';

if ( !isset($_SESSION['userid']) || !getUserRole($_SESSION['userid'])==0) {
  header('Location: logout.php');  
}

if (isset($_POST['postid'])) {
  deletePost($_POST['postid']);  
}

if (isset($_POST['update-value'])) {
  $day=$_POST['update-days'];
  $hour=$_POST['update-hours'];
  $priority=$_POST['update-priorities'];
  $text=htmlspecialchars($_POST['update-text']);
  
  updateTask($day,$hour,$priority,$text,$_POST['update-value']);
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
  // print_r($task);
}

if (isset($_POST['get-value'])) {
  $day=$_POST['days'];
  $hour=$_POST['hours'];
  $priority=$_POST['priorities'];
  $text=htmlspecialchars($_POST['text']);  

  $schedule[$hour][$day]=array('priority'=>$priority,'text'=>$text);

  addTask($day,$hour,$priority,$text,$_SESSION['userid']);

}

?>

<!DOCTYPE html>
<html lang="en">

<?php require 'head.php'; ?>

<body>
  <div class="text-center customheader">
    <h1 class="leftalign"><?php echo 'Welcome '.(isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest').'!'; ?></h1>
    <p class="rightalign"><a href="logout.php">Logout</a></p>             
  </div>
  <!-- Page Content -->
  <div class="container">

    <ul class="nav nav-pills nav-justified">
      <li ><a data-toggle="pill" href="#stable">Add Task</a></li>
      <li class="active"><a data-toggle="tab" href="#addtask">Schedule</a></li>
      <li><a data-toggle="tab" href="#viewtasks">Update Tasks</a></li>
      <li><a data-toggle="tab" href="#deletetasks">Delete Task</a></li>
    </ul>

    <div class="tab-content">
      <div id="stable" class="tab-pane fade">
        <div class="text-center">
          <?php require 'form.php'; ?>
        </div>        
      </div>
      <div id="addtask" class="tab-pane fade in active">
        <div class="row">      
          <?php require 'table.php'; ?>
        </div>        
      </div>
      <div id="viewtasks" class="tab-pane fade">

        <div class="panel-group" id="accordion">

          <?php 
          $taskovi=getTasks($_SESSION['userid']);
          foreach ($taskovi as $task) : ?>
          <div class="panel panel-<?php echo $task['priority']; ?>">
            <div class="panel-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $task['id']; ?>">
                <h4 class="panel-title">
                  <?php echo $task['context']; ?>
                </h4>
              </a>
            </div>
            <div id="<?php echo $task['id']; ?>" class="panel-collapse collapse">
              <div class="panel-body">
                <?php include 'updateform.php'; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>


      </div>

    </div>
    <div id="deletetasks" class="tab-pane fade">
      <?php 
      $taskovi=getTasks($_SESSION['userid']);
      foreach ($taskovi as $task) : ?>

      <div class="alert alert-<?php echo $task['priority']; ?>">
        <a href="#" class="userclose" id="<?php echo $task['id']; ?>" data-dismiss="alert" aria-label="close" ><strong class="del">DELETE</strong></a>
        <strong><?php echo $task['context']; ?></strong> <?php echo get_day($task['day']); ?> <?php echo get_hour($task['hour']); ?>
      </div>

      <?php endforeach; ?>
    </div>


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