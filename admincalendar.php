<?php
session_start();
require 'functions.php';

//Check admin
if (!isset($_SESSION['userid']) || !getUserRole($_SESSION['userid']) == 1) {
    header('Location: logout.php');
}

//Delete post
if (isset($_POST['postid'])) {
    deletePost($_POST['postid']);
}

//Tasks from who will be isplayed in the table
$_SESSION['table_userid'] = $_SESSION['userid'];

//Delete user
if (isset($_POST['deletedUser'])) {
    deletePosts($_POST['deletedUser']);
    deleteUser($_POST['deletedUser']);
}

//Update task
if (isset($_POST['update-value'])) {
    $useridFromTaskID=getUserIdByTask($_POST['update-value']);
    updateLogic($_POST['update-days'],$_POST['update-hours'],$_POST['update-priorities'],htmlspecialchars($_POST['update-text']),$useridFromTaskID,$_POST['update-value']);
}

//Make admin
if (isset($_POST['make-admin'])) {
    $pid = $_POST['users-admin'];
    makeAdmin($pid);
}

//Get users
if (isset($_POST['get-user'])) {
    $username = $_POST['users'];
    $_SESSION['table_userid'] = getUserId($username);
}

//Adding task
if (isset($_POST['get-value'])) {

    addLogic($_POST['admin-days'],$_POST['admin-hours'],$_POST['admin-priorities'],htmlspecialchars($_POST['admin-text']),$_POST['add-users']);

    $_SESSION['table_userid'] = $_POST['add-users'];

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

    <?php include 'adminTabs.php'; ?>
    
</div><!-- /.container -->

</body>
</html>