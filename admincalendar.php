<?php 
session_start();
require 'functions.php';

if ( !isset($_SESSION['userid']) || !getUserRole($_SESSION['userid'])==1) {
  header('Location: logout.php');  
}

if (isset($_POST['postid'])) {
  deletePost($_POST['postid']);  
}

$_SESSION['table_userid']=$_SESSION['userid'];

if (isset($_POST['deletedUser'])) {
  deletePosts($_POST['deletedUser']);
  deleteUser($_POST['deletedUser']);
}

if (isset($_POST['update-value'])) {
  $day=$_POST['update-days'];
  $hour=$_POST['update-hours'];
  $priority=$_POST['update-priorities'];
  $text=htmlspecialchars($_POST['update-text']);
  
  updateTask($day,$hour,$priority,$text,$_POST['update-value']);
}

if (isset($_POST['make-admin'])) {
  $pid=$_POST['users-admin'];
  makeAdmin($pid);
}

$data = getUsers();
if (isset($_POST['get-user'])) {
  $username = $_POST['users'];
  $_SESSION['table_userid'] = getUserId($username);
}

if (isset($_POST['get-value'])) {
  $day=$_POST['admin-days'];
  $hour=$_POST['admin-hours'];
  $priority=$_POST['admin-priorities'];
  $text=htmlspecialchars($_POST['admin-text']);
  $user=$_POST['add-users'];

  $schedule[$hour][$day]=array('priority'=>$priority,'text'=>$text);

  addTask($day,$hour,$priority,$text,$user);
  $_SESSION['table_userid']=$user;
  $_SESSION['value']=$schedule;

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
      <li class="active"><a data-toggle="tab" href="#stable">Schedule</a></li>
      <li ><a data-toggle="pill" href="#addtask">Add Task</a></li>
      <li><a data-toggle="tab" href="#updatetasks">Update Tasks</a></li>
      <li><a data-toggle="tab" href="#deletetasks">Delete Task</a></li>
      <li><a data-toggle="tab" href="#makeadmin">Make Admin</a></li>
      <li><a data-toggle="tab" href="#deleteuser">Delete User</a></li>
    </ul>

    <div class="tab-content">
      <div id="addtask" class="tab-pane fade  ">
        <div class="text-center">

          <?php include 'addformadmin.php'; ?>
        </div>      
      </div>
      <div id="stable" class="tab-pane fade in active">
        <div class="row text-center">
          <?php include 'formadmin.php'; ?>          
          <?php include 'table.php'; ?>
        </div>        
      </div>

      <div id="updatetasks" class="tab-pane fade">
        <div class="panel-group" id="accordion">

          <?php 
          $taskovi=getAdminTasks();
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
      $taskovi=getAdminTasks();
      foreach ($taskovi as $task) : ?>

      <div class="alert alert-<?php echo $task['priority']; ?>">
        <a href="" class="adminclose" id="<?php echo $task['id']; ?>" data-dismiss="alert" aria-label="close" ><strong class="del">DELETE</strong></a>
        <strong><?php echo $task['context']; ?></strong> <?php echo get_day($task['day']); ?> <?php echo get_hour($task['hour']); ?>
      </div>

    <?php endforeach; ?>
  </div>

  <div id="makeadmin" class="tab-pane fade">
    <div class="row text-center">
      <?php include 'makeadmin.php'; ?>          
    </div>
  </div>
  <div id="deleteuser" class="tab-pane fade">
    <div class="row">
      <?php 
      $users=getUsers();
      foreach ($users as $user) : ?>
      <a href="" class="delUser" id="<?php echo $user['id']; ?>">
      <div class="col-sm-6" >
        <div class="col-sm-12 well vertical-center" >
          <p class="text-center"><?php echo $user['username']; ?></p>
        </div>  
      </div>
      </a>
    <?php endforeach; ?>    
  </div>
</div>

</div>
</div><!-- /.container -->


<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>