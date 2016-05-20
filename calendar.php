<?php
session_start();
require 'functions.php';

//check user login
if (!isset($_SESSION['userid']) || !getUserRole($_SESSION['userid']) == 0) {
    header('Location: logout.php');
}

//Deleting task
if (isset($_POST['postid'])) {
    deletePost($_POST['postid']);
}

//Updating task
if (isset($_POST['update-value'])) {
    updateLogic($_POST['update-days'], $_POST['update-hours'], $_POST['update-priorities'], htmlspecialchars($_POST['update-text']), $_POST['update-value']);
}

//Adding task
if (isset($_POST['get-value'])) {
    addLogic($_POST['days'], $_POST['hours'], $_POST['priorities'], htmlspecialchars($_POST['text']), $_SESSION['userid']);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require 'head.php'; ?>

<body>
<div class="text-center customheader">
    <h1 class="leftalign"><?php echo 'Welcome ' . (isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest') . '!'; ?></h1>
    <p class="rightalign"><a href="logout.php">Logout</a></p>
</div>
<!-- Page Content -->
<div class="container">
    <?php include 'userTabs.php'; ?>
</div><!-- /.container -->

<<<<<<< HEAD
=======
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>
>>>>>>> 6ca5311c94d307c5f39d4ac505af35040c808531
</body>
</html>