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

if (isset($_POST['popoversetbutton'])){
    echo 'aaaaaaaaaaa';
}

//Updating task
if (isset($_POST['update-value'])) {
    $useridFromTaskID=getUserIdByTask($_POST['update-value']);
    updateLogic($_POST['update-days'], $_POST['update-hours'], $_POST['update-priorities'], htmlspecialchars($_POST['update-text']), $useridFromTaskID, $_POST['update-value']);
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

</body>
</html>