<ul class="nav nav-pills nav-justified">
    <li><a data-toggle="pill" href="#stable">Add Task</a></li>
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
            $taskovi = getTasks($_SESSION['userid']);
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
        $taskovi = getTasks($_SESSION['userid']);
        foreach ($taskovi as $task) : ?>

            <div class="alert alert-<?php echo $task['priority']; ?>">
                <a href="#" class="userclose" id="<?php echo $task['id']; ?>" data-dismiss="alert"
                   aria-label="close"><strong class="del">DELETE</strong></a>
                <strong><?php echo $task['context']; ?></strong> <?php echo get_day($task['day']); ?> <?php echo get_hour($task['hour']); ?>
            </div>

        <?php endforeach; ?>
    </div>


</div>