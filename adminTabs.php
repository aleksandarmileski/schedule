<ul class="nav nav-pills nav-justified">
    <li class="active"><a data-toggle="tab" href="#stable">Schedule</a></li>
    <li><a data-toggle="pill" href="#addtask">Add Task</a></li>
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
            $taskovi = getAdminTasks();
            foreach ($taskovi as $task) : ?>
                <div class="panel panel-<?php echo $task['priority']; ?>">
                    <div class="panel-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                           href="#<?php echo $task['id']; ?>">
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
        $taskovi = getAdminTasks();
        foreach ($taskovi as $task) : ?>

            <div class="alert alert-<?php echo $task['priority']; ?>">
                <a href="" class="adminclose" id="<?php echo $task['id']; ?>" data-dismiss="alert"
                   aria-label="close"><strong class="del">DELETE</strong></a>
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
            $users = getUsers();
            foreach ($users as $user) : ?>
                <a href="" class="delUser" id="<?php echo $user['id']; ?>">
                    <div class="col-sm-6">
                        <div class="col-sm-12 well vertical-center">
                            <p class="text-center"><?php echo $user['username']; ?></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

</div>